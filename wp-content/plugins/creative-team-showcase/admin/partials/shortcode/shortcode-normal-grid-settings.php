<div class="normal-grid-settings layout-settings" style="padding-left: 30px">   
	<h4 class="ctshowcase-table-heading"> <?php _e( 'Normal grid settings', 'ctshowcase' ); ?> </h4> 
	<table class="ctshowcase-table"  cellpadding="3" style="max-width: 600px">
		<tr class="normal-grid-style">
			<td> <?php _e( 'Select style:', 'ctshowcase' ); ?></td>
			<td>
				<select name="normalGrid_style" class="normalGrid_style">
					<option <?php selected( $normalGrid_style, 'style-1' ); ?> value="style-1"> Style 1 </option>
					<option <?php selected( $normalGrid_style, 'style-2' ); ?> value="style-2"> Style 2 </option>
					<option <?php selected( $normalGrid_style, 'style-3' ); ?> value="style-3"> Style 3 </option>
				</select>
			</td>
		</tr>
		<tr class="normal-grid-type">
			<td> <?php _e( 'Select type:', 'ctshowcase' ); ?></td>
			<td>
				<select name="normalGrid_type" class="normalGrid_type">
					<option <?php selected( $normalGrid_type, 'square' ); ?> value="square"> Square </option>
					<option <?php selected( $normalGrid_type, 'circle' ); ?> value="circle"> Circle </option>
				</select>
			</td>
		</tr>
		<tr>
			<td> <?php _e( 'Hover transition:', 'ctshowcase' ); ?> </td>
			<td>
				<select name="normalGrid_onHover" class="normalGrid_onHover">
					<option <?php selected( $normalGrid_onHover, 'zoom-rotate' ); ?> value="zoom-rotate"> Zoom and rotate </option>
					<option <?php selected( $normalGrid_onHover, 'zoom' ); ?> value="zoom"> Zoom only </option>
				</select>
			</td>
		</tr>
		<tr class="normal-grid-no-of-cols">
			<td>
				<?php _e( 'Number of columns: ' ); ?>
			</td>
			<td>
				<select name="normalGrid_no_of_cols" class="normalGrid_no_of_cols">
					<option <?php selected( $normalGrid_no_of_cols, 1 ); ?> value="1"> 1 </option>
					<option <?php selected( $normalGrid_no_of_cols, 2 ); ?> value="2"> 2 </option>
					<option <?php selected( $normalGrid_no_of_cols, 3 ); ?> value="3"> 3 </option>
					<option <?php selected( $normalGrid_no_of_cols, 4 ); ?> value="4"> 4 </option>
					<option <?php selected( $normalGrid_no_of_cols, 6 ); ?> value="6"> 6 </option>
				</select>
			</td>
		</tr>
		<tr class="normal-grid-offset">
			<td> <?php _e( 'Enable offset between columns: ', 'ctshowcase' ); ?></td>
			<td>
				<input type="hidden" name='normalGrid_offset' value="no" />
				<input name="normalGrid_offset" 
					   id ="normalGrid_offset"
					   class="ctshowcase-tgl ctshowcase-tgl-light" 
					   type="checkbox"
					   value='yes'
					   <?php checked( $normalGrid_offset, 'yes' ); ?>>
				<label class="ctshowcase-tgl-btn" for="normalGrid_offset"></label>
			</td>
		</tr>
		<tr class="normal-grid-enable-groups-filter">
			<td> <?php _e( 'Enable groups filter: ', 'ctshowcase' ); ?></td>
			<td>
				<input type="hidden" name='normalGrid_enable_filter' value="no" />
				<input name="normalGrid_enable_filter" 
					   id ="normalGrid_enable_filter"
					   class="ctshowcase-tgl ctshowcase-tgl-light" 
					   type="checkbox"
					   value='yes'
					   <?php checked( $normalGrid_enable_filter, 'yes' ); ?>>
				<label class="ctshowcase-tgl-btn" for="normalGrid_enable_filter"></label>

			</td>
		</tr>
		
		<tr class="normal-grid-display-social-icons">
			<td> <?php _e( 'Display social icons:', 'ctshowcase' ); ?></td>
			<td>
				<input type="hidden" name='normalGrid_display_social_icons' value="no" />
				<input name="normalGrid_display_social_icons" 
					   id ="normalGrid_display_social_icons"
					   class="ctshowcase-tgl ctshowcase-tgl-light" 
					   type="checkbox"
					   value='yes'
					   <?php checked( $normalGrid_display_social_icons, 'yes' ); ?>>
				<label class="ctshowcase-tgl-btn" for="normalGrid_display_social_icons"></label>
			</td>
		</tr>

		<tr class="normal-grid-display-circle-bar">
			<td> <?php _e( 'Display circle bar:', 'ctshowcase' ); ?></td>
			<td>
				<input type="hidden" name='normalGrid_display_circle_bar' value="no" />
				<input name="normalGrid_display_circle_bar" 
					   id ="normalGrid_display_circle_bar"
					   class="ctshowcase-tgl ctshowcase-tgl-light" 
					   type="checkbox"
					   value='yes'
					   <?php checked( $normalGrid_display_circle_bar, 'yes' ); ?>>
				<label class="ctshowcase-tgl-btn" for="normalGrid_display_circle_bar"></label>
				<p class="info"> Valid for only circle type </p>
			</td>
		</tr>

	</table>
	<h4 style="display: inline-block;
	   margin-left:20px;
		border-bottom: 1px solid #000">
		<?php _e( 'Colors:', 'ctshowcase' ); ?> 
	</h4>
	<table class="ctshowcase-table" cellpadding="3" style="max-width: 600px">
		 <tr class="normal-grid-bg-overlay">
			<td>
				<?php _e( 'Background overlay on hover: ', 'ctshowcase' ); ?>
			</td>
			
			<td>
				<input type="text" class="ctshowcase-color-picker" data-alpha="true" name="normalGrid_bg_overlay" value="<?php echo $normalGrid_bg_overlay; ?>" />
			</td>
		</tr>
		<tr class="normal-grid-team-member-name-color">
			<td> <?php _e( 'Team member name color: ', 'ctshowcase' ); ?> </td>
			<td> <input type="text" class="ctshowcase-color-picker" 
						name="normalGrid_team_member_name_color" value="<?php echo $normalGrid_team_member_name_color; ?>" /> </td>
		</tr>
		<tr class="normal-grid-team-member-name-bg-color">
			<td> <?php _e( 'Team member name background color: ', 'ctshowcase' ); ?> </td>
			<td> <input type="text" class="ctshowcase-color-picker" 
						name="normalGrid_team_member_name_bgColor" value="<?php echo $normalGrid_team_member_name_bgColor; ?>" /> </td>
		</tr>
		<tr class="normal-grid-team-member-job-title-color">
			<td> <?php _e( 'Team member job title color:', 'ctshowcase' ); ?> </td>
			<td> <input type="text" class="ctshowcase-color-picker" 
						name="normalGrid_team_member_job_title_color" value="<?php echo $normalGrid_team_member_job_title_color; ?>" /> </td>
		</tr>
		<tr class="normal-grid-team-member-job-title-bg-color">
			<td> <?php _e( 'Team member job title background color:', 'ctshowcase' ); ?> </td>
			<td> <input type="text" class="ctshowcase-color-picker" 
						name="normalGrid_team_member_job_title_bgColor" value="<?php echo $normalGrid_team_member_job_title_bgColor; ?>" /> </td>
		</tr>
		<tr class="normal-grid-social-icons-color">
			<td> <?php _e( 'Team member social icons color:', 'ctshowcase' ); ?> </td>
			<td> <input type="text" class="ctshowcase-color-picker" 
						name="normalGrid_team_social_icons_color" value="<?php echo $normalGrid_team_social_icons_color; ?>" /> </td>
		</tr>
		
		<tr class="normal-grid-filter-inactive-font-color">
			<td> <?php _e( 'Filter inactive link font color: ' ); ?></td>
			<td>  
				<input name="normalGrid_filter_inactive_link_font_color" 
					   class="ctshowcase-color-picker" 
					   type="text" 
					   value="<?php echo $normalGrid_filter_inactive_link_font_color; ?>"/>
			</td>
		</tr>
		<tr class="normal-grid-filter-inactive-link-bg-color">
			<td> <?php _e( 'Filter inactive link background color: ' ); ?> </td>
			<td> <input name="normalGrid_filter_inactive_link_bg_color"
						class="ctshowcase-color-picker" 
						type="text" 
						value="<?php echo $normalGrid_filter_inactive_link_bg_color; ?>"/>
			</td>
		</tr>
		<tr class="normal-grid-filter-active-link-font-color">
			<td>
				<?php _e( 'Filter active link font color: ', 'ctshowcase' ); ?>
			</td>
			<td> <input name="normalGrid_filter_active_link_font_color"
						class="ctshowcase-color-picker" 
						type="text" 
						value="<?php echo $normalGrid_filter_active_link_font_color; ?>"/>
			</td>
		</tr>
		<tr class="normal-grid-filter-active-link-bg-color">
			<td>
				<?php _e( 'Filter active link background color: ', 'ctshowcase' ); ?>
			</td>
			<td> <input name="normalGrid_filter_active_link_bg_color"
						class="ctshowcase-color-picker" 
						type="text" 
						value="<?php echo $normalGrid_filter_active_link_bg_color; ?>"/>
			</td>
		</tr>
		<tr class="normal-grid-info-icon-color">
			<td>
				<?php _e( 'Info icon color: ', 'ctshowcase' ); ?>
			</td>
			<td>
				<input name="normalGrid_info_icon_color"
						class="ctshowcase-color-picker" 
						type="text" 
						value="<?php echo $normalGrid_info_icon_color; ?>"/>
			</td>
		</tr>
		<tr class="normal-grid-info-icon-bg-color">
			<td>
				<?php _e( 'Info icon background color: ', 'ctshowcase' ); ?>
			</td>
			<td>
				<input name="normalGrid_info_icon_bgColor"
						class="ctshowcase-color-picker" 
						type="text" 
						value="<?php echo $normalGrid_info_icon_bgColor; ?>"/>
			</td>
		</tr>
		<tr class="normal-grid-circle-bar-filling-color">
			<td>
				<?php _e( 'Circle bar filling color: ', 'ctshowcase' ); ?>
			</td>
			<td>
				<input name="normalGrid_circle_bar_filling_color"
						class="ctshowcase-color-picker" 
						type="text" 
						value="<?php echo $normalGrid_circle_bar_filling_color; ?>"/>
			</td>
		</tr>
		<tr class="normal-grid-circle-bar-background-color">
			<td>
				<?php _e( 'Circle bar background color: ', 'ctshowcase' ); ?>
			</td>
			<td>
				<input name="normalGrid_circle_bar_bgColor"
						class="ctshowcase-color-picker" 
						type="text" 
						value="<?php echo $normalGrid_circle_bar_bgColor; ?>"/>
			</td>
		</tr>
	</table>
	<div class="normal-grid-media-queries" style="display:table; padding-left: 20px;">
		<h4 style="display: inline-block;
			border-bottom: 1px solid #000">
			<?php _e( 'Media queries:', 'ctshowcase' ); ?> 
		</h4>
		<div class="ctshowcase-ui-tabgroup">
			<input class="ui-tab1" type="radio" id="tgroup_normalGrid_tab1" name="tgroup_normalGrid" checked />
			<input class="ui-tab2" type="radio" id="tgroup_normalGrid_tab2" name="tgroup_normalGrid" />
			<input class="ui-tab3" type="radio" id="tgroup_normalGrid_tab3" name="tgroup_normalGrid" />
			<input class="ui-tab4" type="radio" id="tgroup_normalGrid_tab4" name="tgroup_normalGrid" />
			<input class="ui-tab5" type="radio" id="tgroup_normalGrid_tab5" name="tgroup_normalGrid" />
			<div class="ui-tabs">
				<label class="ui-tab1" for="tgroup_normalGrid_tab1">
					<div>
						<svg id="preview-sizer-xl" viewBox="0 0 24 24" width="20px" height="100%">
						<g>
						<circle data-color="color-2" cx="12" cy="5" r="1"></circle>
						<path d="M21,0H3C1.346,0,0,1.346,0,3v14c0,1.654,1.346,3,3,3h7v2H6c-0.552,0-1,0.448-1,1s0.448,1,1,1h12 c0.552,0,1-0.448,1-1s-0.448-1-1-1h-4v-2h7c1.654,0,3-1.346,3-3V3C24,1.346,22.654,0,21,0z M22,15H2V3c0-0.552,0.448-1,1-1h18 c0.552,0,1,0.448,1,1V15z"></path>
						</g>
						</svg>
					</div>
					<span class="cs-preview-sizer-desc">1200px &amp; Up</span>
				</label>
				<label class="ui-tab2" for="tgroup_normalGrid_tab2">
					<div>
						<svg id="preview-sizer-lg" viewBox="0 0 24 24" width="20px" height="100%">
						<g>
						<path d="M21,13.795V4c0-1.103-0.897-2-2-2H5C3.897,2,3,2.897,3,4v9.795l-2.322,5.417 c-0.265,0.62-0.202,1.326,0.169,1.889C1.218,21.664,1.842,22,2.517,22h18.967c0.674,0,1.298-0.336,1.67-0.899 c0.371-0.563,0.434-1.269,0.168-1.889L21,13.795z M19,13H5V4h14V13z"></path>
						</g>
						</svg>
					</div>                   
					<span class="ctshowcase-preview-sizer-desc">980px-1199px</span>
				</label>
				<label class="ui-tab3" for="tgroup_normalGrid_tab3">
					<div>
						<svg id="preview-sizer-md" viewBox="0 0 24 24" width="20px" height="100%">
						<g>
						<path d="M20,0H4C2.346,0,1,1.346,1,3v18c0,1.654,1.346,3,3,3h16c1.654,0,3-1.346,3-3V3C23,1.346,21.654,0,20,0z  M12,22c-0.552,0-1-0.448-1-1s0.448-1,1-1s1,0.448,1,1S12.552,22,12,22z M21,17c0,0.552-0.448,1-1,1H4c-0.552,0-1-0.448-1-1V4 c0-0.552,0.448-1,1-1h16c0.552,0,1,0.448,1,1V17z"></path>
						</g>
						</svg>
					</div>
					<span class="cs-preview-sizer-desc">768px-979px</span>
				</label>
				<label class="ui-tab4" for="tgroup_normalGrid_tab4">
					<div>
						<svg id="preview-sizer-sm" viewBox="0 0 24 24" width="20px" height="100%">
						<g>
						<path d="M18,0H6C4.346,0,3,1.346,3,3v18c0,1.654,1.346,3,3,3h12c1.654,0,3-1.346,3-3V3C21,1.346,19.654,0,18,0z  M12,22c-0.552,0-1-0.448-1-1s0.448-1,1-1s1,0.448,1,1S12.552,22,12,22z M19,17c0,0.552-0.448,1-1,1H6c-0.552,0-1-0.448-1-1V4 c0-0.552,0.448-1,1-1h12c0.552,0,1,0.448,1,1V17z"></path>
						</g>
						</svg>
					</div>
					<span class="cs-preview-sizer-desc">481px-767px</span>
				</label>
				<label class="ui-tab5" for="tgroup_normalGrid_tab5">
					<div>
						<svg id="preview-sizer-xs" viewBox="0 0 24 24" width="20px" height="100%">
						<g>
						<path d="M17,0H7C5.3,0,4,1.3,4,3v18c0,1.7,1.3,3,3,3h10c1.7,0,3-1.3,3-3V3C20,1.3,18.7,0,17,0z M12,21 c-1.1,0-2-0.9-2-2s0.9-2,2-2s2,0.9,2,2S13.1,21,12,21z M17,14c0,0.6-0.4,1-1,1H8c-0.6,0-1-0.4-1-1V4c0-0.6,0.4-1,1-1h8 c0.6,0,1,0.4,1,1V14z"></path>
						</g>
						</svg>
					</div>
					<span class="cs-preview-sizer-desc">480px &amp; Smaller</span>
				</label>

			</div>
			<div class="ui-panels">
				<div class="ui-tab1">
					<table class="normalGrid-xl-table"  cellpadding="3">
						<tr class="normalGrid-xl-team-member-name-font-size">
							<td> <?php _e( 'Team Member name font size(px) : ', 'ctshowcase' ); ?></td>
							<td> <input name="normalGrid_xl_team_member_name_font_size" type="number" value="<?php echo $normalGrid_xl_team_member_name_font_size; ?>"/> </td>
						</tr> 
						<tr class="normalGrid-xl-team-member-job-title-font-size">
							<td> <?php _e( 'Team Member job title font size(px) : ', 'ctshowcase' ); ?></td>
							<td> <input name="normalGrid_xl_team_member_job_title_font_size" type="number" value="<?php echo $normalGrid_xl_team_member_job_title_font_size; ?>"/> </td>
						</tr> 
						<tr class="normalGrid-xl-social-icons-font-size normalGrid-social-icons-font-size">
							<td> 
								<?php _e( 'Social Icons font size(px) : ', 'ctshowcase' ); ?>
							</td>
							<td> 
								<input name="normalGrid_xl_social_icons_font_size" 
									   type="number" 
									   value="<?php echo $normalGrid_xl_social_icons_font_size; ?>"/> 
							</td>
						</tr> 
					</table>
				</div>
				<div class="ui-tab2">
					<table class="normalGrid-lg-table"  cellpadding="3">
						<tr class="normalGrid-lg-team-member-name-font-size">
							<td> <?php _e( 'Team Member name font size(px) : ', 'ctshowcase' ); ?></td>
							<td> 
								<input name="normalGrid_lg_team_member_name_font_size" 
									   type="number" 
									   value="<?php echo $normalGrid_lg_team_member_name_font_size; ?>"/> 
							</td>
						</tr> 
						<tr class="normalGrid-lg-team-member-job-title-font-size">
							<td> <?php _e( 'Team Member job title font size(px) : ', 'ctshowcase' ); ?></td>
							<td> 
								<input name="normalGrid_lg_team_member_job_title_font_size" 
									   type="number" 
									   value="<?php echo $normalGrid_lg_team_member_job_title_font_size; ?>"/>
							</td>
						</tr>
						<tr class="normalGrid-lg-social-icons-font-size normalGrid-social-icons-font-size">
							<td> 
								<?php _e( 'Social Icons font size(px) : ', 'ctshowcase' ); ?>
							</td>
							<td> 
								<input name="normalGrid_lg_social_icons_font_size" 
									   type="number" 
									   value="<?php echo $normalGrid_lg_social_icons_font_size; ?>"/> 
							</td>
						</tr> 
					</table>
				</div>
				<div class="ui-tab3">
					<table class="normalGrid-md-table"  cellpadding="3">
						<tr class="normalGrid-md-team-member-name-font-size">
							<td> <?php _e( 'Team Member name font size(px) : ', 'ctshowcase' ); ?></td>
							<td> <input name="normalGrid_md_team_member_name_font_size" type="number" value="<?php echo $normalGrid_md_team_member_name_font_size; ?>"/> </td>
						</tr> 
						<tr class="normalGrid-xl-team-member-job-title-font-size">
							<td> <?php _e( 'Team Member job title font size(px) : ', 'ctshowcase' ); ?></td>
							<td> <input name="normalGrid_md_team_member_job_title_font_size" type="number" value="<?php echo $normalGrid_md_team_member_job_title_font_size; ?>"/> </td>
						</tr>
						<tr class="normalGrid-md-social-icons-font-size normalGrid-social-icons-font-size">
							<td> 
								<?php _e( 'Social Icons font size(px) : ', 'ctshowcase' ); ?>
							</td>
							<td> 
								<input name="normalGrid_md_social_icons_font_size" 
									   type="number" 
									   value="<?php echo $normalGrid_md_social_icons_font_size; ?>"/> 
							</td>
						</tr> 
					</table>
				</div>
				<div class="ui-tab4">
					<table class="normalGrid-sm-table"  cellpadding="3">
						<tr class="normalGrid-sm-team-member-name-font-size">
							<td> <?php _e( 'Team Member name font size(px) : ', 'ctshowcase' ); ?></td>
							<td> <input name="normalGrid_sm_team_member_name_font_size" type="number" value="<?php echo $normalGrid_sm_team_member_name_font_size; ?>"/> </td>
						</tr> 
						<tr class="normalGrid-sm-team-member-job-title-font-size">
							<td> <?php _e( 'Team Member job title font size(px) : ', 'ctshowcase' ); ?></td>
							<td> <input name="normalGrid_sm_team_member_job_title_font_size" type="number" value="<?php echo $normalGrid_sm_team_member_job_title_font_size; ?>"/> </td>
						</tr> 
						<tr class="normalGrid-sm-social-icons-font-size normalGrid-social-icons-font-size">
							<td> 
								<?php _e( 'Social Icons font size(px) : ', 'ctshowcase' ); ?>
							</td>
							<td> 
								<input name="normalGrid_sm_social_icons_font_size" 
									   type="number" 
									   value="<?php echo $normalGrid_sm_social_icons_font_size; ?>"/> 
							</td>
						</tr> 
					</table>
				</div>
				<div class="ui-tab5">
					<table class="normalGrid-xs-table"  cellpadding="3">
						<tr class="normalGrid-xs-team-member-name-font-size">
							<td> <?php _e( 'Team Member name font size(px) : ', 'ctshowcase' ); ?></td>
							<td> <input name="normalGrid_xs_team_member_name_font_size" type="number" value="<?php echo $normalGrid_xs_team_member_name_font_size; ?>"/> </td>
						</tr> 
						<tr class="normalGrid-xs-team-member-job-title-font-size">
							<td> <?php _e( 'Team Member job title font size(px) : ', 'ctshowcase' ); ?></td>
							<td> <input name="normalGrid_xs_team_member_job_title_font_size" type="number" value="<?php echo $normalGrid_xs_team_member_job_title_font_size; ?>"/> </td>
						</tr>
						<tr class="normalGrid-xs-social-icons-font-size normalGrid-social-icons-font-size">
							<td> 
								<?php _e( 'Social Icons font size(px) : ', 'ctshowcase' ); ?>
							</td>
							<td> 
								<input name="normalGrid_xs_social_icons_font_size" 
									   type="number" 
									   value="<?php echo $normalGrid_xs_social_icons_font_size; ?>"/> 
							</td>
						</tr> 
					</table>
				</div>

			</div>
		</div>
	</div>
</div>
