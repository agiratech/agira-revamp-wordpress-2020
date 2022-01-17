<?php
$has_external_url = 'external-url' === $entry_link ? true : false;
 wp_enqueue_style( $this->plugin_name . '-mosaic' );
?>
<div class="ctshowcase-mosaic-layout ctshowcase-layout 
	<?php
	echo ( $entry_link == 'left-modal' || $entry_link == 'right-modal' ) ? 'with-modal ' : '';
	echo is_rtl() ? 'is-rtl' : '';
	echo $has_external_url === true ? ' with-external-url' : '';

	?>
	"
	 data-shortcode-id="<?php echo $shortcode_id; ?>"
	 >
	<div class="ctshowcase-layout-main-content">
	<?php
	if ( $team_query->have_posts() ) :
		   $counter                      = 0;
		   $rows_counter                 = 0;
		   $mosaic_no_of_members_per_row = $mosaic_row_members_no;

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
			   $team_member_name          = get_the_title();
			   $team_member_external_url  = get_post_meta( $team_member_id, $this->plugin_name . '_external_url', true );
			   $team_member_job_title     = get_post_meta( $team_member_id, $this->plugin_name . '_job_title', true );
			   $team_member_facebook_link = get_post_meta( $team_image_id, $this->plugin_name . '_facebook_link', true );
			   $team_member_linkedin_link = get_post_meta( $team_image_id, $this->plugin_name . '_linkedin_link', true );
			   $team_member_twitter_link  = get_post_meta( $team_image_id, $this->plugin_name . '_twitter_link', true );
			   $social_links              = ( new Creative_Team_ShowCase_Admin( $this->plugin_name, $this->version ) )->social_links;


			if ( $counter % $mosaic_no_of_members_per_row == 0 ) :
				$rows_counter++;
				?>
					<div class="ctshowcase-main-row ctshowcase-row ctshowcase-row-<?php echo $rows_counter; ?>">
				   <?php
				endif;
			?>
					  
						<div class="ctshowcase-col-<?php echo 12 / $mosaic_no_of_members_per_row; ?> ctshowcase-team-member">
							<div class="ctshowcase-row">
									<div class="ctshowcase-col-6 ctshowcase-team-member-image-col ctshowcase-team-member-entry-link" 
									data-modal="ctshowcase-modal-<?php echo $team_member_id; ?>"
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
											<img class="ctshowcase-team-member-profile-image square-object-fit" 
												  src="<?php echo $team_member_image; ?>" 
											/>
									</div>
									<div class="ctshowcase-col-6 ctshowcase-team-member-info "  style="background:  <?php echo $rows_counter % 2 == 0 ? $mosaic_even_theme_color : $mosaic_odd_theme_color; ?>">
										<div class="ctshowcase-team-member-info-wrapper" >
											<h2 
												class="ctshowcase-team-member-name  ctshowcase-has-media-queries"
												style="color: <?php echo $rows_counter % 2 == 0 ? $mosaic_even_team_member_name_color : $mosaic_odd_team_member_name_color; ?>;"
												data-xl-font-size="<?php echo $mosaic_xl_team_member_name_font_size; ?>" 
												data-lg-font-size="<?php echo $mosaic_lg_team_member_name_font_size; ?>"
												data-md-font-size="<?php echo $mosaic_md_team_member_name_font_size; ?>"
												data-sm-font-size="<?php echo $mosaic_sm_team_member_name_font_size; ?>"
												data-xs-font-size="<?php echo $mosaic_xs_team_member_name_font_size; ?>">

										   <?php echo $team_member_name; ?> 
											</h2>
											<p 
												class="ctshowcase-team-member-job-title  ctshowcase-has-media-queries" 
												style="color: <?php echo $rows_counter % 2 == 0 ? $mosaic_even_team_member_job_title_color : $mosaic_odd_team_member_job_title_color; ?>;"
												data-xl-font-size="<?php echo $mosaic_xl_team_member_job_title_font_size; ?>" 
												data-lg-font-size="<?php echo $mosaic_lg_team_member_job_title_font_size; ?>"
												data-md-font-size="<?php echo $mosaic_md_team_member_job_title_font_size; ?>"
												data-sm-font-size="<?php echo $mosaic_sm_team_member_job_title_font_size; ?>"
												data-xs-font-size="<?php echo $mosaic_xs_team_member_job_title_font_size; ?>">

										  <?php echo $team_member_job_title; ?>
											</p>
									  <?php if ( $mosaic_display_social_icons == 'yes' ) : ?>
												<div class="ctshowcase-team-member-socials">
													<?php
													if ( ! empty( $social_links ) ) :
														foreach ( $social_links as $social_icon => $social_link ) :
															$link = get_post_meta( $team_member_id, 'ctshowcase_social_' . $social_link . '_link', true );
															if ( ! empty( $link ) ) :
																?>
																<a class="ctshowcase-has-media-queries" style="color: <?php echo $rows_counter % 2 == 0 ? $mosaic_even_social_icons_color : $mosaic_odd_social_icons_color; ?>; padding: 2px;" 
																	data-xl-font-size="<?php echo $mosaic_xl_social_icons_font_size; ?>" 
																	data-lg-font-size="<?php echo $mosaic_lg_social_icons_font_size; ?>"
																	data-md-font-size="<?php echo $mosaic_md_social_icons_font_size; ?>"
																	data-sm-font-size="<?php echo $mosaic_sm_social_icons_font_size; ?>"
																	data-xs-font-size="<?php echo $mosaic_xs_social_icons_font_size; ?>"
																	class="social ctshowcase-<?php echo $social_link; ?>-profile-link"  href="<?php echo substr( trim( $link ), 0, 4 ) != 'http' ? '//' : ''; ?><?php echo $link; ?>" target="_blank"> 
																	<i class="fa <?php echo $social_icon; ?>-square" aria-hidden="true"></i>
																</a>  
																<?php
															endif;
														endforeach;
													endif;
													?>
												</div>
											<?php
											endif;
									  if ( ( $entry_link == 'left-modal' || $entry_link == 'right-modal' ) && $mosaic_display_read_more_link == 'yes' ) :
											?>
						<div class="ctshowcase-read-more-link ctshowcase-team-member-entry-link" data-modal="ctshowcase-modal-<?php echo $team_member_id; ?>">
							<span class="ctshowcase-read-more-text" style="color: <?php echo $rows_counter % 2 == 0 ? $mosaic_even_read_more_color : $mosaic_odd_read_more_color; ?>">
										  <?php if ( ! is_rtl() ) : ?>
								<i class="fa fa-caret-right"></i> <?php echo $mosaic_read_more_text; ?>
							<?php else : ?>
								<i class="fa fa-caret-left"></i> <?php echo $mosaic_read_more_text; ?>
								<?php
										  endif;
							?>
							</span>
							<div class="ctshowcase-after-read-more-link" style="background:  <?php echo $rows_counter % 2 == 0 ? $mosaic_even_read_more_color : $mosaic_odd_read_more_color; ?>">
							</div>
						</div>
									  <?php endif; ?>
										</div>
										<span class="ctshowcase-arrow" style="border-color: <?php echo $rows_counter % 2 == 0 ? $mosaic_even_theme_color : $mosaic_odd_theme_color; ?>"></span>
									</div>
							</div>
						</div>
				<?php
				if ( $counter % $mosaic_no_of_members_per_row == $mosaic_no_of_members_per_row - 1 || $counter == $team_query->post_count - 1 ) :
					?>
					</div><?php endif; ?>
			<?php
				$counter ++;
			endwhile;
		   wp_reset_query();
		endif;
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
