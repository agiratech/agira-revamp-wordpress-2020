<?php
$has_external_url = 'external-url' === $entry_link ? true : false;
?>
<section id="ctshowcase-layout-<?php echo $shortcode_id; ?>" class="ctshowcase-layout  ctshowcase-wave-layout 
	<?php echo is_rtl() ? 'is-rtl ' : ' '; ?>
	<?php
	echo ( $entry_link == 'left-modal' || $entry_link == 'right-modal' ) ? 'with-modal' : '';
		echo $has_external_url === true ? ' with-external-url' : '';

	?>
	" style="overflow:hidden;min-height: <?php echo ( $team_query->post_count * 25 > 200 ) ? $team_query->post_count * 24.5 * 14 . 'px' : 200 * 14 . 'px'; ?>"
	data-shortcode-id="<?php echo $shortcode_id; ?>"
	>
	<div class="ctshowcase-layout-main-content">
		<div class="ctshowcase-section-title">
			<h4 style="margin:0;" class="ctshowcase-section-heading">
				<span class="ctshowcase-has-media-queries" style="color: <?php echo $wave_heading_color; ?>"
					  data-xl-font-size="<?php echo $wave_xl_team_member_name_font_size; ?>" 
					  data-lg-font-size="<?php echo $wave_lg_team_member_name_font_size; ?>"
					  data-md-font-size="<?php echo $wave_md_team_member_name_font_size; ?>"
					  data-sm-font-size="<?php echo $wave_sm_team_member_name_font_size; ?>"
					  data-xs-font-size="<?php echo $wave_xs_team_member_name_font_size; ?>"
				>
					<?php echo ( $wave_display_heading == 'yes' ) ? $wave_heading : ''; ?>
				</span>
			</h4>
			<p  class="ctshowcase-section-subheading  ctshowcase-has-media-queries" style="color : <?php echo $wave_subheading_color; ?>"
				data-xl-font-size="<?php echo $wave_xl_team_member_job_title_font_size; ?>" 
				data-lg-font-size="<?php echo $wave_lg_team_member_job_title_font_size; ?>"
				data-md-font-size="<?php echo $wave_md_team_member_job_title_font_size; ?>"
				data-sm-font-size="<?php echo $wave_sm_team_member_job_title_font_size; ?>"
				data-xs-font-size="<?php echo $wave_xs_team_member_job_title_font_size; ?>"               
			   ><?php echo ( $wave_display_subheading == 'yes' ) ? $wave_subheading : ''; ?></p>
		</div>
		<div class="ctshowcase-team">
		<div class="ctshowcase-connector">
			<div class="ctshowcase-connector__start">
				
			</div>
			<div class="ctshowcase-connector__line" style="">
				
			</div>
			<div class="ctshowcase-connector__end">
				
			</div>
				
		</div>
		<div class="active-ctshowcase-team-member">
			<h2 class="ctshowcase-team-member__name">
				<span></span>
			</h2>
			<p class="ctshowcase-team-member__role"></p>
			<ul class="ctshowcase-team-member__links"></ul>
		</div>
		<ul class="ctshowcase-team-members">
			<?php
			if ( $team_query->have_posts() ) :

				while ( $team_query->have_posts() ) :
					$team_query->the_post();
					$theme_color    = $wave_theme_color;
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
					$team_member_job_title    = get_post_meta( $team_member_id, 'ctshowcase_job_title', true );
					$team_member_external_url = get_post_meta( $team_member_id, $this->plugin_name . '_external_url', true );

					$groups = wp_get_post_terms( $team_member_id, 'ctshowcase_group' );
					if ( ! empty( $groups ) ) :
						foreach ( $groups as $group ) :
							$override_default_value = get_term_meta( $group->term_id, 'ctshowcase_override_default_theme_color', true );
							if ( $override_default_value == 'yes' ) :
								if ( ! empty( get_term_meta( $group->term_id, 'ctshowcase_scheme_color', true ) ) ) :
									$theme_color = get_term_meta( $group->term_id, 'ctshowcase_scheme_color', true );
								endif;
							endif;
						endforeach;
					endif;

					?>
						<li
						   data-bgcolor= "<?php echo $theme_color; ?>"
						   class="ctshowcase-team-member">

							<div data-modal="ctshowcase-modal-<?php echo $team_member_id; ?>" 
								 class="ctshowcase-team-member-entry-link"
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
								<div class="ctshowcase-team-member-profile-pic">
									<img  class="ctshowcase-team-member-profile-image" src="<?php echo $team_member_image; ?> " alt="<?php echo $team_member_name; ?>" />
							   </div>
							   <div class="ctshowcase-team-member-profile-pic-wave">
								   <div>
									   <span style="background : <?php echo $theme_color; ?>"></span>
								   </div>
								   <div>
									   <span style="background : <?php echo $theme_color; ?>"></span>
								   </div>
								   <div>
									   <span style="background : <?php echo $theme_color; ?>"></span>
								   </div>
							   </div>
							   <div class="ctshowcase-team-member__info">
								   <h4 class="ctshowcase-team-member__name">
									   <span class=" ctshowcase-has-media-queries" style="color: <?php echo $wave_team_member_name_color; ?>"
												data-xl-font-size="<?php echo $wave_xl_team_member_name_font_size; ?>" 
												data-lg-font-size="<?php echo $wave_lg_team_member_name_font_size; ?>"
												data-md-font-size="<?php echo $wave_md_team_member_name_font_size; ?>"
												data-sm-font-size="<?php echo $wave_sm_team_member_name_font_size; ?>"
												data-xs-font-size="<?php echo $wave_xs_team_member_name_font_size; ?>" 
											 ><?php echo $team_member_name; ?></span>
								   </h4>
								   <p  class="ctshowcase-team-member__role ctshowcase-has-media-queries" style="color: <?php echo $theme_color; ?>;" 
										data-xl-font-size="<?php echo $wave_xl_team_member_job_title_font_size; ?>" 
										data-lg-font-size="<?php echo $wave_lg_team_member_job_title_font_size; ?>"
										data-md-font-size="<?php echo $wave_md_team_member_job_title_font_size; ?>"
										data-sm-font-size="<?php echo $wave_sm_team_member_job_title_font_size; ?>"
										data-xs-font-size="<?php echo $wave_xs_team_member_job_title_font_size; ?>"
										class="ctshowcase-team-member__role">
									   <?php echo $team_member_job_title; ?>
								   </p>
							   </div>
						   </div>


					   </li>
					<?php
				endwhile;
				wp_reset_query();
			endif;
			?>
			 

		</ul>
		
		

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
</section>
<?php
