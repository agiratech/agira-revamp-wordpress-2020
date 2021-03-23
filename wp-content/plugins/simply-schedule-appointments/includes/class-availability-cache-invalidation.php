<?php
/**
 * Simply Schedule Appointments Availability Cache Invalidation.
 *
 * @since   4.0.1
 * @package Simply_Schedule_Appointments
 */

/**
 * Simply Schedule Appointments Availability Cache Invalidation.
 *
 * @since 4.0.1
 */
class SSA_Availability_Cache_Invalidation {
	/**
	 * Parent plugin class.
	 *
	 * @since 4.0.1
	 *
	 * @var   Simply_Schedule_Appointments
	 */
	protected $plugin = null;

	/**
	 * Constructor.
	 *
	 * @since  4.0.1
	 *
	 * @param  Simply_Schedule_Appointments $plugin Main plugin object.
	 */
	public function __construct( $plugin ) {
		$this->plugin = $plugin;
		$this->hooks();
	}

	/**
	 * Initiate our hooks.
	 *
	 * @since  4.0.1
	 */
	public function hooks() {
		add_action( 'ssa/settings/blackout_dates/updated', array( $this, 'invalidate_global_setting' ), 1000, 2 );
		add_action( 'ssa/settings/advanced_scheduling/updated', array( $this, 'invalidate_global_setting' ), 1000, 2 );
		add_action( 'ssa/settings/google_calendar/updated', array( $this, 'invalidate_global_setting' ), 1000, 2 );

		add_action( 'ssa/appointment/after_insert', array( $this, 'invalidate_appointment' ), 1000, 2 );
		add_action( 'ssa/appointment/after_update', array( $this, 'invalidate_appointment' ), 1000, 2 );
		// add_action( 'ssa/appointment/after_delete', array( $this, 'delete_appointment', 1000, 2 );

		add_action( 'ssa/appointment_type/after_update', array( $this, 'invalidate_appointment_type'), 1000, 2 );
		add_action( 'ssa/appointment_type/after_delete', array( $this, 'invalidate_appointment_type'), 1000, 1 );

		add_action( 'shutdown', array( $this, 'shutdown' ) );
	}

	public function invalidate_everything() {
		$this->plugin->availability_model->truncate();
		$this->increment_cache_version();
	}

	public static function get_cache_version() {
		$cache_version = get_transient( 'ssa/cache_version' );

		if ( false === $cache_version ) {
			$cache_version = 0;
		}

		return $cache_version;
	}

	public static function get_cache_group() {
		return 'v'.Simply_Schedule_Appointments::VERSION.'/'.self::get_cache_version();
	}

	public function increment_cache_version() {
		$cache_version = $this->get_cache_version();
		if ( false === $cache_version ) {
			$cache_version = 0;
		}

		$cache_version++;
		$is_cache_already_locked = get_transient( 'ssa/cache/lock_global' );
		if ( ! $is_cache_already_locked ) {
			set_transient( 'ssa/cache/lock_global', time(), 30 );
			if ( ssa_doing_async() ) {
				add_filter( 'ssa/shutdown/populate_cache', '__return_true' );
			} else {
				ssa_queue_action(
					'populate_cache',
					'ssa_populate_cache',
					10000,
					array(),
					'',
					0,
					'',
					array(
						'date_queued' => gmdate( 'Y-m-d H:i:s' )
					)
				);
			}
		}
		set_transient( 'ssa/cache_version', $cache_version, MONTH_IN_SECONDS );
		return $cache_version;
	}

	public function shutdown() {
		if ( apply_filters( 'ssa/shutdown/populate_cache', false ) ) {
			$this->plugin->availability_cache->populate_cache();
		}
	}

	public function invalidate_global_setting( $new_settings = array(), $old_settings = array() ) {
		$this->invalidate_type( 'appointment_type' );
		$this->increment_cache_version();

		$this->plugin->availability_cache->delete_expired_transients();
		// $this->invalidate_type( 'staff' );
		// $this->invalidate_type( 'resource' );
		// $this->invalidate_type( 'location' );
		// $this->invalidate_type( 'global' );
	}

	public function invalidate_type( $type ) {
		$this->plugin->availability_model->bulk_delete( array(
			'type' => $type,
		) );
		$this->increment_cache_version();
	}

	public function invalidate_subtype( $type, $subtype ) {
		$this->plugin->availability_model->bulk_delete( array(
			'type' => $type,
			'subtype' => $subtype,
		) );
		$this->increment_cache_version();
	}

	public function invalidate_appointment( $appointment_id, $data ) {
		if ( ! empty( $data['appointment_type_id'] ) ) {
			$appointment_type_id = $data['appointment_type_id'];
		}

		if ( empty( $appointment_type_id ) ) {
			$appointment = SSA_Appointment_Object::instance( $appointment_id );
			if ( ! $appointment instanceof SSA_Appointment_Object ) {
				return;
			}

			$appointment_type_id = $appointment->appointment_type_id;
		}
		if ( empty( $appointment_type_id ) ) {
			return;
		}

		$this->invalidate_appointment_type( $appointment_type_id );

		if (! empty( $data['staff_ids'] ) ) {
			$staff_ids = $data['staff_ids'];
		} else {
			$staff_ids = $this->plugin->staff_appointment_model->get_staff_ids( $appointment_id );
		}
		if ( ! empty( $staff_ids ) ) {
			foreach ($staff_ids as $staff_id) {
				$this->invalidate_staff_id( $staff_id );
			}
		}

		$this->increment_cache_version();
	}

	public function invalidate_appointment_type( $appointment_type_id, $data = array() ) {
		$developer_settings = $this->plugin->developer_settings->get();

		if ( empty( $developer_settings['separate_appointment_type_availability'] ) ) {
			$this->invalidate_everything();
			$this->plugin->google_calendar->maybe_queue_refresh_check( $appointment_type_id );
			return;
		}

		$this->plugin->availability_model->bulk_delete( array(
			'appointment_type_id' => $appointment_type_id,
		) );
		$this->plugin->google_calendar->maybe_queue_refresh_check( $appointment_type_id );
		$this->increment_cache_version();
	}

	public function invalidate_staff_id( $staff_id, $data = array() ) {
// TODO: make caching appointment type ID aware
		$this->plugin->availability_model->bulk_delete( array(
			'type' => 'staff',
			'staff_id' => $staff_id,
			// 'appointment_type_id' => $appointment_type_id,
		) );
		$this->plugin->availability_model->bulk_delete( array(
			'type' => 'staff',
			'subtype' => 'any',
			// 'appointment_type_id' => $appointment_type_id,
		) );
		$this->plugin->availability_model->bulk_delete( array(
			'type' => 'staff',
			'subtype' => 'all',
			// 'appointment_type_id' => $appointment_type_id,
		) );

		$this->increment_cache_version();
		// find all appointment types using staff and this specific ID
		$appointment_type_ids = $this->plugin->staff_appointment_type_model->get_appointment_type_ids( $staff_id );
		foreach ($appointment_type_ids as $appointment_type_id) {
			$this->invalidate_appointment_type( $appointment_type_id );
		}
	}

	public function invalidate_google_calendar_id( $calendar_id ) {
		// TODO
		// query and find staff that match this calendar id
		// foreach ($variable as $key => $value) {
		// $this->invalidate_staff_id( $staff_id );
		// }

		// query and find appointment types that match this calendar id
		// foreach ($variable as $key => $value) {
		// $this->invalidate_appointment_type( $appointment_type_id );
		// }
		$this->increment_cache_version();
	}
}
