<?php
$has_external_url = 'external-url' === $entry_link ? true : false;
wp_enqueue_style( $this->plugin_name . '-slider' );
wp_enqueue_style( $this->plugin_name . '-owlCarousel' );
wp_enqueue_style( $this->plugin_name . '-owlCarousel-defaultTheme' );
wp_enqueue_script( $this->plugin_name . '_owlCarousel' );
wp_enqueue_script( $this->plugin_name . '_slider' );
?>
<div class="ctshowcase-slider-layout ctshowcase-layout 
  <?php
	echo is_rtl() ? ' is-rtl ' : ' ';
	echo ( $entry_link == 'left-modal' || $entry_link == 'right-modal' ) ? 'with-modal' : '';
	echo $has_external_url === true ? ' with-external-url' : '';
	?>
		" data-shortcode-id="<?php echo $shortcode_id; ?>">
	<div class="ctshowcase-layout-main-content ">
		<div  class="ctshowcase-row owl-carousel owl-theme ctshowcase-owl-carousel" data-is-rtl ="<?php echo is_rtl(); ?>" data-no-of-slides="<?php echo $slider_no_of_slides; ?>" data-offset-enabled="<?php echo  $slider_offset; ?>" data-arrows-color="<?php echo $slider_arrows_color; ?>" data-arrows-bg="<?php echo $slider_arrows_bg_color; ?>">
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
				?>
				<div
					data-modal="ctshowcase-modal-<?php echo $team_member_id; ?>"
					class="ctshowcase-team-member ctshowcase-team-member-entry-link <?php echo $slider_onHover; ?> <?php echo ( $slider_type == 'circle' ) ? 'circle' : ''; ?>"
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
					<div class="ctshowcase-team-member-wrapper <?php echo ( $slider_type == 'circle' ) ? 'circle' : ''; ?>">
						<div class="ctshowcase-team-member__preview <?php echo ( $slider_type == 'circle' ) ? 'circle' : ''; ?>" >
							<span class="ctshowcase-image-overlay <?php echo ( $slider_type == 'circle' ) ? 'circle' : ''; ?>" style="background:<?php echo $slider_bg_overlay; ?>"></span>
							<img src="<?php echo $team_member_image; ?>" class="ctshowcase-team-member-profile-image square-object-fit <?php echo ( $slider_type == 'circle' ) ? 'circle' : ''; ?>" alt="<?php echo $team_member_name; ?>">
						</div>
						<div class="ctshowcase-team-member__info">
							<div class="ctshowcase-team-member__info-inner">
								<div style="text-align:center;" class="ctshowcase-team-member__info-content">
									<h4 class="ctshowcase-team-member-name ctshowcase-has-media-queries"
										data-xl-font-size="<?php echo $slider_xl_team_member_name_font_size; ?>" 
										data-lg-font-size="<?php echo $slider_lg_team_member_name_font_size; ?>"
										data-md-font-size="<?php echo $slider_md_team_member_name_font_size; ?>"
										data-sm-font-size="<?php echo $slider_sm_team_member_name_font_size; ?>"
										data-xs-font-size="<?php echo $slider_xs_team_member_name_font_size; ?>"
										style="color: <?php echo $slider_team_member_name_color; ?>"
										>
											<?php echo $team_member_name; ?>
									</h4>
									<span class="ctshowcase-team-member-job-title ctshowcase-has-media-queries" 
										  data-xl-font-size="<?php echo $slider_xl_team_member_job_title_font_size; ?>" 
										  data-lg-font-size="<?php echo $slider_lg_team_member_job_title_font_size; ?>"
										  data-md-font-size="<?php echo $slider_md_team_member_job_title_font_size; ?>"
										  data-sm-font-size="<?php echo $slider_sm_team_member_job_title_font_size; ?>"
										  data-xs-font-size="<?php echo $slider_xs_team_member_job_title_font_size; ?>"
										  style="color: <?php echo $slider_team_member_job_title_color; ?>"
										  >
											  <?php echo $team_member_job_title; ?>
									</span>
									<?php if ( $slider_display_social_icons == 'yes' ) : ?>
										<div class="ctshowcase-socials">
											<?php
											if ( ! empty( $social_links ) ) :
												foreach ( $social_links as $social_icon => $social_link ) :
													$link = get_post_meta( $team_member_id, 'ctshowcase_social_' . $social_link . '_link', true );
													if ( ! empty( $link ) ) :
														?>
														<a  
															data-xl-font-size="<?php echo $slider_xl_social_icons_font_size; ?>" 
															data-lg-font-size="<?php echo $slider_lg_social_icons_font_size; ?>"
															data-md-font-size="<?php echo $slider_md_social_icons_font_size; ?>"
															data-sm-font-size="<?php echo $slider_sm_social_icons_font_size; ?>"
															data-xs-font-size="<?php echo $slider_xs_social_icons_font_size; ?>"
															style="color: <?php echo $slider_team_social_icons_color; ?>" class="ctshowcase-has-media-queries ctshowcase-<?php echo $social_link; ?>-profile-link"  href="<?php echo substr( trim( $link ), 0, 4 ) != 'http' ? '//' : ''; ?><?php echo $link; ?>" target="_blank"> 
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
