<?php
$has_external_url = 'external-url' === $entry_link ? true : false;
?>
<div class ="ctshowcase-hexagonal-layout ctshowcase-layout 
<?php
echo $hex_enable_filter == 'yes' ? ' with-filter ' : '';
echo is_rtl() ? ' is-rtl ' : '';
echo ( $entry_link == 'left-modal' || $entry_link == 'right-modal' ) ? 'with-modal' : '';
echo $has_external_url === true ? ' with-external-url' : '';
?>
	 "
	 data-shortcode-id="<?php echo $shortcode_id; ?>">
	<div class="ctshowcase-layout-main-content" >
		<?php
		if ( $hex_enable_filter == 'yes' ) :
			wp_enqueue_script( $this->plugin_name . '_filter' );
			wp_enqueue_style( $this->plugin_name . '-filter' );
			?>
			<div class="ctshowcase-group-buttons" 
				 data-filter_inactive_link_font_color="<?php echo $hex_filter_inactive_link_font_color; ?>"
				 data-filter_inactive_link_bg_color="<?php echo $hex_filter_inactive_link_bg_color; ?>"
				 data-filter_active_link_font_color ="<?php echo $hex_filter_active_link_font_color; ?>"
				 data-filter_active_link_bg_color ="<?php echo $hex_filter_active_link_bg_color; ?>"
				 >
				<a  style="color: <?php echo $hex_filter_active_link_font_color; ?>;background:<?php echo $hex_filter_active_link_bg_color; ?>" href="#" class="all" data-group="all"><?php _e( 'All', 'ctshowcase' ); ?></a>
				<?php
				$terms = get_terms(
					array(
						'taxonomy'   => 'ctshowcase_group',
						'hide_empty' => true,
					)
				);
				if ( ! empty( $groups_to_include ) ) {
					$terms = array_filter(
						$terms,
						function( $term ) use ( $groups_to_include ) {
							return in_array( $term->term_id, $groups_to_include );
						}
					);
				}
				if ( ! empty( $terms ) ) :
					foreach ( $terms as $term ) :
						?>
						<a style="color: <?php echo $hex_filter_inactive_link_font_color; ?>;background:<?php echo $hex_filter_inactive_link_bg_color; ?>" 
						   href="#" data-group="<?php echo $term->slug; ?>"><?php echo $term->name; ?></a>
							<?php
						   endforeach;
				   endif;
				?>
			</div>
		<?php endif; ?>
		<div  class="ctshowcase-hexGrid ctshowcase-hexGrid-<?php echo $no_of_hexagons; ?>">
			<?php
			if ( $team_query->have_posts() ) :
				$counter = 1;

				while ( $team_query->have_posts() ) :
					$team_query->the_post();

					$team_member_id = get_the_ID();
					$team_image_id  = get_post_thumbnail_id();
					if ( $team_image_id ) {
						$team_member_image = wp_get_attachment_image_src( $team_image_id, 'ctshowcase_custom_image' );
						if ( ! empty( $team_member_image[0] ) ) :
							$team_member_image = $team_member_image[0];
						else :
							$team_member_image = plugin_dir_url( __FILE__ ) . 'default-avatar.png';
						endif;
					} else {
						$team_member_image = plugin_dir_url( __FILE__ ) . 'default-avatar.png';
					}
					$team_member_name         = get_the_title();
					$team_member_job_title    = get_post_meta( $team_member_id, $this->plugin_name . '_job_title', true );
					$team_member_external_url = get_post_meta( $team_member_id, $this->plugin_name . '_external_url', true );
					$groups                   = wp_get_post_terms( $team_member_id, 'ctshowcase_group' );
					$groups_slugs             = array();
					foreach ( $groups as $group ) :
						$groups_slugs[] = $group->slug;
					endforeach;
					$groups_slugs = implode( ',', $groups_slugs );
					?>
					<div data-groups="<?php echo $groups_slugs; ?>"  
						 class="ctshowcase-hex ctshowcase-hex-<?php echo $no_of_hexagons; ?> ctshowcase-team-member show"
						 >    
						<div class="ctshowcase-hexWrapper ctshowcase-team-member-wrapper">
							<div class="ctshowcase-hexIn">
								<div class="ctshowcase-hexLink ctshowcase-team-member-entry-link"
									 onclick="(function(){
											var hasExternalUrl = '<?php echo $has_external_url; ?>';
											var externalUrl = '<?php echo $team_member_external_url; ?>';
											if(hasExternalUrl == 1 && externalUrl.length > 0) {
												var a= document.createElement('a');
												a.target= '_blank';
												a.href= externalUrl;
												a.click();
											}
										})();return false;"
									data-modal="ctshowcase-modal-<?php echo $team_member_id; ?>">
									<div class="ctshowcase-hex-profile-pic ctshowcase-team-member-profile-pic">
										<img class="ctshowcase-team-member-profile-image" src="<?php echo $team_member_image; ?>" />
											<div class="ctshowcase-overlay" 
												 style="background-color: <?php echo $hex_background_overlay; ?>;">
											</div>
									</div>
									<div class="ctshowcase-hex-text-wrapper">
										<h2 
											class="ctshowcase-team-member-name ctshowcase-has-media-queries" 
											style="color: <?php echo $hex_team_member_name_color; ?>;font-size:<?php echo $hex_xl_team_member_name_font_size; ?>;"
											data-xl-font-size="<?php echo $hex_xl_team_member_name_font_size; ?>" 
											data-lg-font-size="<?php echo $hex_lg_team_member_name_font_size; ?>"
											data-md-font-size="<?php echo $hex_md_team_member_name_font_size; ?>"
											data-sm-font-size="<?php echo $hex_sm_team_member_name_font_size; ?>"
											data-xs-font-size="<?php echo $hex_xs_team_member_name_font_size; ?>"
											><?php echo $team_member_name; ?>
										</h2>
										<p class="ctshowcase-team-member-job-title ctshowcase-has-media-queries"
										   style="color: <?php echo $hex_team_member_job_title_color; ?>;font-size:<?php echo $hex_xl_team_member_job_title_font_size; ?>;"
										   data-xl-font-size="<?php echo $hex_xl_team_member_job_title_font_size; ?>" 
										   data-lg-font-size="<?php echo $hex_lg_team_member_job_title_font_size; ?>"
										   data-md-font-size="<?php echo $hex_md_team_member_job_title_font_size; ?>"
										   data-sm-font-size="<?php echo $hex_sm_team_member_job_title_font_size; ?>"
										   data-xs-font-size="<?php echo $hex_xs_team_member_job_title_font_size; ?>"
										   >
											<?php echo $team_member_job_title; ?>
										</p> 
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
				endwhile;
				wp_reset_query();
			endif;
			?>
		</div>
		<?php
		if ( $entry_link == 'left-modal' || $entry_link == 'right-modal' ) :
			require 'modal.php';
		endif;
		?>
	</div>
	<div class="ctshowcase-loader-wrapper">
		<div class="ctshowcase-loader">
			<div class="ctshowcase-loader-section section-left"></div>
			<div class="ctshowcase-loader-section section-right"></div>

		</div>
	</div>
</div>
