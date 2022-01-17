<?php
$has_external_url = 'external-url' === $entry_link ? true : false;
?>
<div class="ctshowcase-normal-grid-layout <?php echo ( $normalGrid_display_circle_bar == 'yes' && $normalGrid_type == 'circle' ) ? 'has-circle-bar' : ''; ?> <?php echo $normalGrid_style; ?> <?php echo $normalGrid_type; ?> ctshowcase-layout 
<?php
	echo $normalGrid_enable_filter == 'yes' ? ' with-filter ' : '';
	echo is_rtl() ? ' is-rtl ' : '';
	echo ( $entry_link == 'left-modal' || $entry_link == 'right-modal' ) ? 'with-modal' : '';
	echo $has_external_url === true ? ' with-external-url' : '';

?>
"
data-shortcode-id="<?php echo $shortcode_id; ?>"
 >
	<div class="ctshowcase-layout-main-content ">
		<?php
		if ( $normalGrid_enable_filter == 'yes' ) :
			wp_enqueue_script( $this->plugin_name . '_filter' );
			wp_enqueue_style( $this->plugin_name . '-filter' );
			?>
			<div class="ctshowcase-group-buttons" 
				 data-filter_inactive_link_font_color="<?php echo $normalGrid_filter_inactive_link_font_color; ?>"
				 data-filter_inactive_link_bg_color="<?php echo $normalGrid_filter_inactive_link_bg_color; ?>"
				 data-filter_active_link_font_color ="<?php echo $normalGrid_filter_active_link_font_color; ?>"
				 data-filter_active_link_bg_color ="<?php echo $normalGrid_filter_active_link_bg_color; ?>"
				 >
				<a  style="color: <?php echo $normalGrid_filter_active_link_font_color; ?>;background:<?php echo $normalGrid_filter_active_link_bg_color; ?>" href="#" class="all" data-group="all"><?php _e( 'All', 'ctshowcase' ); ?></a>
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

						<a style="color: <?php echo $normalGrid_filter_inactive_link_font_color; ?>;background:<?php echo $normalGrid_filter_inactive_link_bg_color; ?>" 
						   href="#" data-group="<?php echo $term->slug; ?>"><?php echo $term->name; ?></a>
						   <?php
					   endforeach;
				   endif;
				?>
			</div>
		<?php endif; ?>

		<div class="ctshowcase-row">
			<?php
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
				$team_member_external_url = get_post_meta( $team_member_id, $this->plugin_name . '_external_url', true );
				$team_member_job_title    = get_post_meta( $team_member_id, 'ctshowcase_job_title', true );
				$social_links             = ( new Creative_Team_ShowCase_Admin( $this->plugin_name, $this->version ) )->social_links;
				$groups                   = wp_get_post_terms( $team_member_id, 'ctshowcase_group' );
				$groups_slugs             = array();
				foreach ( $groups as $group ) :
					$groups_slugs[] = $group->slug;
				endforeach;
				$groups_slugs = implode( ',', $groups_slugs );
				?>
				<div
				  data-modal="ctshowcase-modal-<?php echo $team_member_id; ?>"
				   data-groups="<?php echo $groups_slugs; ?>" 
				   class="ctshowcase-team-member ctshowcase-team-member-entry-link show <?php echo ( $normalGrid_type == 'circle' ) ? 'circle' : ''; ?> ctshowcase-col-<?php echo 12 / $normalGrid_no_of_cols; ?>" style="<?php echo $normalGrid_offset == 'yes' ? 'padding: 10px;' : ''; ?>"
				   onclick="(function(){
						var hasExternalUrl = '<?php echo $has_external_url; ?>';
						var externalUrl = '<?php echo $team_member_external_url; ?>';
						if(hasExternalUrl == 1 && externalUrl.length > 0) {
							var a= document.createElement('a');
							a.target= '_blank';
							a.href= externalUrl;
							a.click();
						}
					})();return false;">
					<div class="ctshowcase-team-member-wrapper <?php echo $normalGrid_onHover; ?> <?php echo ( $normalGrid_type == 'circle' ) ? 'circle' : ''; ?>">
						<?php if ( $normalGrid_display_circle_bar == 'yes' && ( $normalGrid_style == 'style-2' || $normalGrid_style == 'style-3' ) && $normalGrid_type == 'circle' ) : ?>
							<div class="circle-bar" style="border-color: <?php echo $normalGrid_circle_bar_bgColor; ?>; border-left-color: <?php echo $normalGrid_circle_bar_filling_color; ?>; border-top-color: <?php echo $normalGrid_circle_bar_filling_color; ?>;"></div>
						<?php endif; ?>
						<div class="ctshowcase-team-member-data <?php echo ( $normalGrid_type == 'circle' ) ? 'circle' : ''; ?>">
							<div class="ctshowcase-team-member__preview <?php echo ( $normalGrid_type == 'circle' ) ? 'circle' : ''; ?>" >
								<span class="ctshowcase-image-overlay <?php echo ( $normalGrid_type == 'circle' ) ? 'circle' : ''; ?>" style="background:<?php echo $normalGrid_bg_overlay; ?>"></span>
								<img src="<?php echo $team_member_image; ?>" class="ctshowcase-team-member-profile-image square-object-fit <?php echo ( $normalGrid_type == 'circle' ) ? 'circle' : ''; ?>" alt="<?php echo $team_member_name; ?>">
								<?php
								if ( ( $normalGrid_style == 'style-2' || $normalGrid_style == 'style-3' ) && ( $entry_link == 'left-modal' || $entry_link == 'right-modal' ) ) :
									?>
									<div class="ctshowcase-info-icon-wrapper">
										<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
												viewBox="0 0 496.158 496.158" style="enable-background:new 0 0 496.158 496.158;" xml:space="preserve">
											<path style="fill: <?php echo $normalGrid_info_icon_bgColor; ?>;" d="M496.158,248.085c0-137.022-111.069-248.082-248.075-248.082C111.07,0.003,0,111.063,0,248.085
												c0,137.001,111.07,248.07,248.083,248.07C385.089,496.155,496.158,385.086,496.158,248.085z"/>
											<g>
												<path style="fill: <?php echo $normalGrid_info_icon_color; ?>;" d="M315.249,359.555c-1.387-2.032-4.048-2.755-6.27-1.702c-24.582,11.637-52.482,23.94-57.958,25.015
													c-0.138-0.123-0.357-0.348-0.644-0.737c-0.742-1.005-1.103-2.318-1.103-4.015c0-13.905,10.495-56.205,31.192-125.719
													c17.451-58.406,19.469-70.499,19.469-74.514c0-6.198-2.373-11.435-6.865-15.146c-4.267-3.519-10.229-5.302-17.719-5.302
													c-12.459,0-26.899,4.73-44.146,14.461c-16.713,9.433-35.352,25.41-55.396,47.487c-1.569,1.729-1.733,4.314-0.395,6.228
													c1.34,1.915,3.825,2.644,5.986,1.764c7.037-2.872,42.402-17.359,47.557-20.597c4.221-2.646,7.875-3.989,10.861-3.989
													c0.107,0,0.199,0.004,0.276,0.01c0.036,0.198,0.07,0.5,0.07,0.933c0,3.047-0.627,6.654-1.856,10.703
													c-30.136,97.641-44.785,157.498-44.785,182.994c0,8.998,2.501,16.242,7.432,21.528c5.025,5.393,11.803,8.127,20.146,8.127
													c8.891,0,19.712-3.714,33.08-11.354c12.936-7.392,32.68-23.653,60.363-49.717C316.337,364.326,316.636,361.587,315.249,359.555z"/>
												<path style="fill: <?php echo $normalGrid_info_icon_color; ?>;" d="M314.282,76.672c-4.925-5.041-11.227-7.597-18.729-7.597c-9.34,0-17.475,3.691-24.176,10.971
													c-6.594,7.16-9.938,15.946-9.938,26.113c0,8.033,2.463,14.69,7.32,19.785c4.922,5.172,11.139,7.794,18.476,7.794
													c8.958,0,17.049-3.898,24.047-11.586c6.876-7.553,10.363-16.433,10.363-26.393C321.646,88.105,319.169,81.684,314.282,76.672z"/>
											</g>
											<g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
										</svg>
									</div>
								<?php endif; ?>
							</div>
							<div class="ctshowcase-team-member__info">
								<div class="ctshowcase-team-member__info-inner">
									<div class="ctshowcase-team-member__info-content">
										<div class="ctshowcase-team-member-name-wrapper">
											<h4 class="ctshowcase-team-member-name ctshowcase-has-media-queries"
												data-xl-font-size="<?php echo $normalGrid_xl_team_member_name_font_size; ?>" 
												data-lg-font-size="<?php echo $normalGrid_lg_team_member_name_font_size; ?>"
												data-md-font-size="<?php echo $normalGrid_md_team_member_name_font_size; ?>"
												data-sm-font-size="<?php echo $normalGrid_sm_team_member_name_font_size; ?>"
												data-xs-font-size="<?php echo $normalGrid_xs_team_member_name_font_size; ?>"
												style="color: <?php echo $normalGrid_team_member_name_color; ?>;<?php echo ( $normalGrid_style == 'style-2' || $normalGrid_style == 'style-3' ) ? 'background:' . $normalGrid_team_member_name_bgColor . '' : ''; ?>;"
											>
											<?php
											echo $team_member_name;
											?>
											</h4>
										</div>
										<?php if ( ! empty( $team_member_job_title ) ) : ?>
											<div class="ctshowcase-team-member-job-title-wrapper">
												<span class="ctshowcase-team-member-job-title ctshowcase-has-media-queries" 
													data-xl-font-size="<?php echo $normalGrid_xl_team_member_job_title_font_size; ?>" 
													data-lg-font-size="<?php echo $normalGrid_lg_team_member_job_title_font_size; ?>"
													data-md-font-size="<?php echo $normalGrid_md_team_member_job_title_font_size; ?>"
													data-sm-font-size="<?php echo $normalGrid_sm_team_member_job_title_font_size; ?>"
													data-xs-font-size="<?php echo $normalGrid_xs_team_member_job_title_font_size; ?>"
													style="color: <?php echo $normalGrid_team_member_job_title_color; ?>;<?php echo ( $normalGrid_style == 'style-2' || $normalGrid_style == 'style-3' ) ? 'background:' . $normalGrid_team_member_job_title_bgColor . '' : ''; ?>"
													><?php echo $team_member_job_title; ?></span>
											</div>
										<?php endif; ?>
										<?php if ( $normalGrid_display_social_icons == 'yes' && $normalGrid_style == 'style-1' ) : ?>
											<div class="ctshowcase-socials">
												<?php
												if ( ! empty( $social_links ) ) :
													foreach ( $social_links as $social_icon => $social_link ) :
														$link = get_post_meta( $team_member_id, 'ctshowcase_social_' . $social_link . '_link', true );
														if ( ! empty( $link ) ) :
															?>
															<a  
																data-xl-font-size="<?php echo $normalGrid_xl_social_icons_font_size; ?>" 
																data-lg-font-size="<?php echo $normalGrid_lg_social_icons_font_size; ?>"
																data-md-font-size="<?php echo $normalGrid_md_social_icons_font_size; ?>"
																data-sm-font-size="<?php echo $normalGrid_sm_social_icons_font_size; ?>"
																data-xs-font-size="<?php echo $normalGrid_xs_social_icons_font_size; ?>"
																style="color: <?php echo $normalGrid_team_social_icons_color; ?>" class="ctshowcase-has-media-queries ctshowcase-<?php echo $social_link; ?>-profile-link"  href="<?php echo substr( trim( $link ), 0, 4 ) != 'http' ? '//' : ''; ?><?php echo $link; ?>" target="_blank"> 
																<i class="fa <?php echo $social_icon; ?>-square" aria-hidden="true"></i>
															</a>  
															<?php
														endif;
													endforeach;
												endif;
												?>
											</div>
										<?php endif; ?>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
			endwhile;
			wp_reset_query();
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
