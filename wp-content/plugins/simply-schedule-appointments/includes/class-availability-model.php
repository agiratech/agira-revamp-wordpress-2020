<?php
/**
 * Simply Schedule Availabilities Availabilities Model.
 *
 * @since   0.0.3
 * @package Simply_Schedule_Availabilities
 */
use League\Period\Period;

/**
 * Simply Schedule Availabilities Availabilities Model.
 *
 * @since 0.0.3
 */
class SSA_Availability_Model extends SSA_Db_Model {
	protected $slug = 'availability';
	protected $pluralized_slug = 'availability';
	protected $version = '1.9.2';

	/**
	 * Parent plugin class.
	 *
	 * @since 0.0.2
	 *
	 * @var   Simply_Schedule_Availabilities
	 */
	protected $plugin = null;

	/**
	 * Constructor.
	 *
	 * @since  0.0.2
	 *
	 * @param  Simply_Schedule_Availabilities $plugin Main plugin object.
	 */
	public function __construct( $plugin ) {
		// $this->version = $this->version.'.'.time(); // dev mode
		parent::__construct( $plugin );

		$this->hooks();
	}

	/**
	 * Initiate our hooks.
	 *
	 * @since  0.0.2
	 */
	public function hooks() {

	}

	public function belongs_to() {
		return array(
			'AppointmentType' => array(
				'model' => $this->plugin->appointment_type_model,
				'foreign_key' => 'appointment_type_id',
			),
		);
	}

	protected $schema = array(
		'start_date' => array(
			'field' => 'start_date',
			'label' => 'Start Date',
			'default_value' => false,
			'format' => '%s',
			'mysql_type' => 'datetime',
			'mysql_length' => '',
			'mysql_unsigned' => false,
			'mysql_allow_null' => true,
			'mysql_extra' => '',
			'cache_key' => false,
		),
		'end_date' => array(
			'field' => 'end_date',
			'label' => 'End Date',
			'default_value' => false,
			'format' => '%s',
			'mysql_type' => 'datetime',
			'mysql_length' => '',
			'mysql_unsigned' => false,
			'mysql_allow_null' => true,
			'mysql_extra' => '',
			'cache_key' => false,
		),
		'capacity_available' => array(
			'field' => 'capacity_available',
			'label' => 'Capacity Available',
			'default_value' => 0,
			'format' => '%d',
			'mysql_type' => 'MEDIUMINT',
			'mysql_length' => 6,
			'mysql_unsigned' => true,
			'mysql_allow_null' => false,
			'mysql_extra' => '',
			'cache_key' => false,
		),
		'capacity_reserved' => array(
			'field' => 'capacity_reserved',
			'label' => 'Capacity Reserved',
			'default_value' => 0,
			'format' => '%d',
			'mysql_type' => 'MEDIUMINT',
			'mysql_length' => 6,
			'mysql_unsigned' => true,
			'mysql_allow_null' => false,
			'mysql_extra' => '',
			'cache_key' => false,
		),
		'buffer_available' => array(
			'field' => 'buffer_available',
			'label' => 'Buffer Available',
			'default_value' => 0,
			'format' => '%d',
			'mysql_type' => 'MEDIUMINT',
			'mysql_length' => 6,
			'mysql_unsigned' => true,
			'mysql_allow_null' => false,
			'mysql_extra' => '',
			'cache_key' => false,
		),
		'buffer_reserved' => array(
			'field' => 'buffer_reserved',
			'label' => 'Buffer Reserved',
			'default_value' => 0,
			'format' => '%d',
			'mysql_type' => 'MEDIUMINT',
			'mysql_length' => 6,
			'mysql_unsigned' => true,
			'mysql_allow_null' => false,
			'mysql_extra' => '',
			'cache_key' => false,
		),
		'capacity_meta' => array(
			'field' => 'capacity_meta',
			'label' => 'Capacity Meta',
			'default_value' => false,
			'format' => '%s',
			'mysql_type' => 'TEXT',
			'mysql_length' => false,
			'mysql_unsigned' => false,
			'mysql_allow_null' => true,
			'mysql_extra' => '',
			'cache_key' => false,
			'encoder' => 'json',
		),
		'appointment_type_id' => array(
			'field' => 'appointment_type_id',
			'label' => 'Appointment Type ID',
			'default_value' => 0,
			'format' => '%d',
			'mysql_type' => 'BIGINT',
			'mysql_length' => 20,
			'mysql_unsigned' => true,
			'mysql_allow_null' => false,
			'mysql_extra' => '',
			'cache_key' => false,
		),
		'staff_id' => array(
			'field' => 'staff_id',
			'label' => 'Staff Id',
			'default_value' => 0,
			'format' => '%d',
			'mysql_type' => 'BIGINT',
			'mysql_length' => 11,
			'mysql_unsigned' => false,
			'mysql_allow_null' => false,
			'mysql_extra' => '',
			'cache_key' => false,
		),
		'type' => array(
			'field' => 'type',
			'label' => 'Type',
			'default_value' => false,
			'format' => '%s',
			'mysql_type' => 'VARCHAR',
			'mysql_length' => '16',
			'mysql_unsigned' => false,
			'mysql_allow_null' => false,
			'mysql_extra' => '',
			'cache_key' => false,
		),
		'subtype' => array(
			'field' => 'subtype',
			'label' => 'Subtype',
			'default_value' => false,
			'format' => '%s',
			'mysql_type' => 'VARCHAR',
			'mysql_length' => '16',
			'mysql_unsigned' => false,
			'mysql_allow_null' => false,
			'mysql_extra' => '',
			'cache_key' => false,
		),
		'description' => array(
			'field' => 'description',
			'label' => 'Description',
			'default_value' => false,
			'format' => '%s',
			'mysql_type' => 'TEXT',
			'mysql_length' => '',
			'mysql_unsigned' => false,
			'mysql_allow_null' => false,
			'mysql_extra' => '',
			'cache_key' => false,
		),
		'status' => array(
			'field' => 'status',
			'label' => 'Status',
			'default_value' => false,
			'format' => '%s',
			'mysql_type' => 'VARCHAR',
			'mysql_length' => 250,
			'mysql_unsigned' => false,
			'mysql_allow_null' => false,
			'mysql_extra' => '',
			'cache_key' => false,
		),
		'is_all_day' => array(
			'field' => 'is_all_day',
			'label' => 'Is All Day Event?',
			'default_value' => false,
			'format' => '%s',
			'mysql_type' => 'VARCHAR',
			'mysql_length' => 250,
			'mysql_unsigned' => false,
			'mysql_allow_null' => false,
			'mysql_extra' => '',
			'cache_key' => false,
		),
		'cache_key' => array(
			'field' => 'cache_key',
			'label' => 'Cache Key',
			'default_value' => false,
			'format' => '%d',
			'mysql_type' => 'BIGINT',
			'mysql_length' => 11,
			'mysql_unsigned' => true,
			'mysql_allow_null' => false,
			'mysql_extra' => '',
			'cache_key' => false,
		),
		'cache_args_hash' => array(
			'field' => 'cache_args_hash',
			'label' => 'Args Hash',
			'default_value' => 0,
			'format' => '%d',
			'mysql_type' => 'INT',
			'mysql_length' => 10,
			'mysql_unsigned' => true,
			'mysql_allow_null' => false,
			'mysql_extra' => '',
			'cache_key' => false,
		),
		'date_created' => array(
			'field' => 'date_created',
			'label' => 'Date Created',
			'default_value' => false,
			'format' => '%s',
			'mysql_type' => 'datetime',
			'mysql_length' => '',
			'mysql_unsigned' => false,
			'mysql_allow_null' => false,
			'mysql_extra' => '',
			'cache_key' => false,
		),
		'date_modified' => array(
			'field' => 'date_modified',
			'label' => 'Date Modified',
			'default_value' => false,
			'format' => '%s',
			'mysql_type' => 'datetime',
			'mysql_length' => '',
			'mysql_unsigned' => false,
			'mysql_allow_null' => false,
			'mysql_extra' => '',
			'cache_key' => false,
		),
		'availability_type' => array(
			'field' => 'availability_type',
			'label' => 'Availability Type',
			'default_value' => false, // 'busy', 'buffer', 'free',
			'format' => '%s',
			'mysql_type' => 'VARCHAR',
			'mysql_length' => '8',
			'mysql_unsigned' => false,
			'mysql_allow_null' => false,
			'mysql_extra' => '',
			'cache_key' => false,
		),
		'is_available' => array(
			'field' => 'is_available',
			'label' => 'Is Available',
			'default_value' => 0,
			'format' => '%d',
			'mysql_type' => 'TINYINT',
			'mysql_length' => 1,
			'mysql_unsigned' => true,
			'mysql_allow_null' => false,
			'mysql_extra' => '',
			'cache_key' => false,
		),
		'availability_score' => array(
			'field' => 'availability_score',
			'label' => 'Availability Score',
			'default_value' => 0,
			'format' => '%d',
			'mysql_type' => 'INT',
			'mysql_length' => 3,
			'mysql_unsigned' => true,
			'mysql_allow_null' => false,
			'mysql_extra' => '',
			'cache_key' => false,
		),
	);

	public $indexes = array(
		'appointment_type_id' => [ 'appointment_type_id' ],
		'is_available' => [ 'is_available' ],
		'start_date' => [ 'start_date' ],
		'end_date' => [ 'end_date' ],
		'type' => [ 'type' ],
		'subtype' => [ 'subtype' ],
		'cache_key' => [ 'cache_key' ],
		'cache_args_hash' => [ 'cache_args_hash' ],
		'date_created' => [ 'date_created' ],
	);

	public function filter_where_conditions( $where, $args ) {
		if ( !empty( $args['appointment_type_id'] ) ) {
			$where .= ' AND appointment_type_id="'.sanitize_text_field( $args['appointment_type_id'] ).'"';
		}

		if ( !empty( $args['staff_id'] ) ) {
			$where .= ' AND staff_id="'.sanitize_text_field( $args['staff_id'] ).'"';
		}
		
		if ( isset( $args['is_available'] ) ) {
			$where .= ' AND is_available="'.sanitize_text_field( $args['is_available'] ).'"';
		}

		if ( isset( $args['type'] ) ) {
			$where .= ' AND type="'.sanitize_text_field( $args['type'] ).'"';
		}

		if ( isset( $args['subtype'] ) ) {
			$where .= ' AND subtype="'.sanitize_text_field( $args['subtype'] ).'"';
		}

		if ( isset( $args['cache_args_hash'] ) ) {
			$where .= ' AND cache_args_hash='.sanitize_text_field( $args['cache_args_hash'] );
		}

		if ( isset( $args['cache_key'] ) ) {
			$where .= ' AND cache_key="'.sanitize_text_field( $args['cache_key'] ).'"';
		}

		if ( isset( $args['intersects_period'] ) ) {
			if ( $args['intersects_period'] instanceof Period ) {
				$start_date_string = $args['intersects_period']->getStartDate()->format( 'Y-m-d H:i:s' );
				$end_date_string = $args['intersects_period']->getEndDate()->format( 'Y-m-d H:i:s' );
				
				// it should END in the queried period
				// OR 
				// it should START in the queried period
				// OR
				// it should CONTAIN the queried period
				$where .= " AND (
					(end_date >= '{$start_date_string}' AND end_date <= '{$end_date_string}' )
					OR
					(start_date <= '{$end_date_string}' AND start_date >= '{$start_date_string}' )
					OR
					(start_date <= '{$start_date_string}' AND end_date >= '{$end_date_string}' )
				)";
			}
		}

		return $where;
	}

	public function update_rows( $availability_period_rows, $args = array() ) {
		$args = array_merge( array(
			'cache_key' => time(),
			'type' => '',
			'subtype' => '',
		), $args );

		$execution_datetime = gmdate( 'Y-m-d H:i:s' );
		global $wpdb;

		foreach ($availability_period_rows as $key => $availability_period_row) {
			$availability_period_row['cache_key'] = $args['cache_key'];
			$response = $this->insert( $availability_period_row );
		}

		$query = "DELETE FROM {$this->get_table_name()} WHERE 1=1";
		$query = $wpdb->prepare( $query .= " AND cache_key < %d", $args['cache_key'] );
		$query = $wpdb->prepare( $query .= " AND start_date >= %s", $args['start_date_min'] );
		$query = $wpdb->prepare( $query .= " AND start_date <= %s", $args['start_date_max'] );
		$query = $wpdb->prepare( $query .= " AND type = %s", $args['type'] );
		$query = $wpdb->prepare( $query .= " AND subtype = %s", $args['subtype'] );
		$result = $wpdb->query( $query );

	}

	public function bulk_delete( $args=array() ) {
		return $this->db_bulk_delete( $args );
	}
}
