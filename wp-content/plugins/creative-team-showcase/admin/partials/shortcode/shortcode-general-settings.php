<h4 class="ctshowcase-table-heading"> <?php _e( 'General settings', 'ctshowcase' ); ?> </h4>

<table class="ctshowcase-table ctshowcase-general-settings-table" style="padding-left: 30px;" cellpadding="3">
	<tr>
		<td>
			<?php _e( 'Layout: ', 'ctshowcase' ); ?>
		</td>
		<td>
			<select 
				style="min-width: 300px"
				name="shortcode_layout"
				id="shortcode_layout" >
					<?php
					foreach ( $layout_types as $layout_key => $layout_name ) :
						?>
					<option  value="<?php echo $layout_key; ?>" <?php selected( $layout_key, $shortcode_layout ); ?> > <?php echo $layout_name; ?></option>
				<?php endforeach; ?>
			</select>
		</td>
		<td>
			<p class="description"><?php _e( 'Choose the layout preset that you would like to show.', 'ctshowcase' ); ?></p>
		</td>
	</tr>
	<tr class="no-of-members general-settings">
		<td> <?php _e( 'Number of team members to load', 'ctshowcase' ); ?> </td>
		<td> <input style="width: 100%"name="number_posts_to_load" type="number" value="<?php echo $number_posts_to_load; ?>"/> </td>
		<td>
			<p class="description"><?php _e( 'Leave it empty or 0 if you would like to display all team members.', 'ctshowcase' ); ?></p>
		</td>
	</tr>
	<tr class="order-by general-settings">
		<td> <?php _e( 'Order By:', 'ctshowcase' ); ?> </td>
		<td>
			<select name="order_by">
				<option <?php selected( $order_by, 'menu_order' ); ?> value="menu_order"> <?php _e( 'Menu Order', 'ctshowcase' ); ?> </option>
				<option <?php selected( $order_by, 'title' ); ?> value="title"> <?php _e( 'Team Member Name (Alphabetical)', 'ctshowcase' ); ?> </option>
				<option <?php selected( $order_by, 'publish_date' ); ?> value="publish_date"> <?php _e( 'Publish Date', 'ctshowcase' ); ?> </option>
				<option <?php selected( $order_by, 'modified' ); ?> value="modified"> <?php _e( 'Modified Date', 'ctshowcase' ); ?> </option>
				<option <?php selected( $order_by, 'ID' ); ?> value="ID"> <?php _e( 'ID', 'ctshowcase' ); ?></option>
				<option <?php selected( $order_by, 'rand' ); ?> value="rand"> <?php _e( 'Random', 'ctshowcase' ); ?> </option>
			</select>
		</td>
		<td>
			<p class="description"><?php _e( 'In case of menu order option, you can go to team ordering page for ordering drag and drop. Note: Drag and drop team ordering works only in case of choosing menu order option.', 'ctshowcase' ); ?></p>
		</td>
	</tr>
	<tr class="order general-settings">
		<td> <?php _e( 'Order:', 'ctshowcase' ); ?> </td>
		<td>
			<select name="order">
				<option <?php selected( $order, 'ASC' ); ?> value="ASC"> <?php _e( 'Ascending', 'ctshowcase' ); ?> </option>
				<option <?php selected( $order, 'DESC' ); ?> value="DESC"> <?php _e( 'Descending', 'ctshowcase' ); ?> </option>
			</select>
		</td>
	</tr>
	<tr class="select-groups general-settings">
		<td> 
			<?php _e( 'Groups to show:', 'ctshowcase' ); ?> </td>
		<td>
			<select class="select_groups" id="groups_to_include" name="groups_to_include[]" multiple="multiple">
				<?php
				$terms = get_terms(
					array(
						'taxonomy'   => 'ctshowcase_group',
						'hide_empty' => false,
					)
				);
				if ( ! empty( $terms ) ) :
					foreach ( $terms as $term ) :
						?>
						<option <?php echo ( in_array( $term->term_id, $groups_to_include ) ) ? 'selected' : ''; ?> value="<?php echo $term->term_id; ?>" > <?php echo $term->name; ?> </option>
						<?php
					endforeach;
				endif;
				?>
			</select>

		</td>
		<td>
			<p class="description"><?php _e( 'Leave empty if you would like to show all groups.', 'ctshowcase' ); ?> </p>
		</td>
	</tr>

	<tr class="include-only-specific-ids">
		<td>
			<?php _e( 'Members to include:', 'ctshowcase' ); ?>
		</td>
		<td>
			<select class="select_ids" id="ids_to_include" name="ids_to_include[]" multiple="multiple">
				<?php
				while ( $team_query->have_posts() ) :
					$team_query->the_post();
					?>
					<option <?php echo ( in_array( get_the_ID(), $ids_to_include ) ) ? 'selected' : ''; ?> value="<?php echo get_the_id(); ?>" > <?php echo get_the_title() . ' ( ' . get_the_ID() . ' )'; ?> </option>
					<?php
				endwhile;
				wp_reset_query();
				?>
			</select>
		</td>
		<td>
			<p class="description">
				<?php _e( 'Leave empty if you would like to include all members.', 'ctshowcase' ); ?>
			</p>
		</td>
	</tr>

	<tr class="exclude-specific-ids">
		<td>
			<?php _e( 'Members to exclude:', 'ctshowcase' ); ?>
		</td>

		<td>
			<select class="select_ids" id="ids_to_exclude" name="ids_to_exclude[]" multiple="multiple">
				<?php
				while ( $team_query->have_posts() ) :
					$team_query->the_post();
					?>
					<option 
						<?php echo ( in_array( get_the_ID(), $ids_to_exclude ) ) ? 'selected' : ''; ?> value="<?php echo get_the_id(); ?>" > <?php echo get_the_title() . ' ( ' . get_the_ID() . ' )'; ?> </option>
						<?php
					endwhile;
					wp_reset_query();
				?>
			</select>
		</td>
		<td>
			<p class="description">
				<?php _e( "Leave empty if you don't like to exclude any member.", 'ctshowcase' ); ?>
			</p>
		</td>


	</tr>
	<tr class="entry-link">
		<td> <?php _e( 'Entry link: ', 'ctshowcase' ); ?> </td>
		<td> 
			<select name="entry_link" id="entry-link__select">
				<option <?php selected( $entry_link, 'left-modal' ); ?> value="left-modal"> <?php _e( 'Left Modal', 'ctshowcase' ); ?> </option>
				<option <?php selected( $entry_link, 'right-modal' ); ?> value="right-modal"> <?php _e( 'Right Modal', 'ctshowcase' ); ?> </option>
				<option <?php selected( $entry_link, 'external-url' ); ?> value="external-url"> <?php _e( 'External Url (value should be entered in external url field in each team member page edit)', 'ctshowcase' ); ?> </option>
				<option <?php selected( $entry_link, 'inactive' ); ?> value="inactive"> <?php _e( 'Inactive', 'ctshowcase' ); ?> </option>
			</select>
		</td>
		<td>
			<p class="description"><?php _e( 'On click on team member image.' ); ?> </p>
		</td>
	</tr>

</table>
<div class="advanced-modal-settings">
	<div class="advanced-modal-settings-wrapper">
		<button class="advanced-customization-for-modal"><?php _e( 'Advanced Customization for modal', 'ctshowcase' ); ?> <span style="margin-left: 20px;height: 100%;vertical-align: middle;"class=" dashicons dashicons-arrow-down-alt2"> </span></button>
		<div class="advanced-customization-settings modal-settings" style="padding-left: 30px">
			<h4 style="display: inline-block;
				border-bottom: 1px solid #000;
				margin-left:20px">
				<?php _e( 'Colors:', 'ctshowcase' ); ?> 
			</h4>
			<table cellpadding="3" class="ctshowcase-table">
				<tr>
					<td>
						<?php _e( 'Modal background: ', 'ctshowcase' ); ?>
					</td>
					<td>
						<input 
							type='text'
							name ="modal_bg" 
							class='ctshowcase-color-picker' 
							value="<?php echo $modal_bg; ?>" 
							/>
					</td>
				</tr>
				<tr>
					<td>
						<?php _e( 'Modal header background: ', 'ctshowcase' ); ?>
					</td>
					<td>
						<input 
							type='text'
							name ="modal_header_bg" 
							class='ctshowcase-color-picker' 
							value="<?php echo $modal_header_bg; ?>" 
							/>
					</td>
				</tr>
				<tr>
					<td>
						<?php _e( 'Main text color: ', 'ctshowcase' ); ?>
					</td>
					<td>
						<input 
							type="text"
							name="modal_main_text_color" 
							value ="<?php echo $modal_main_text_color; ?>" 
							class="ctshowcase-color-picker" />
					</td>
				</tr>
				<tr>
					<td>
						<?php _e( 'Team member name color: ', 'ctshowcase' ); ?>
					</td>
					<td>
						<input type='text' name="modal_team_member_name_color" 
							   class='ctshowcase-color-picker'
							   value="<?php echo $modal_team_member_name_color; ?>"
							   />
					</td>
				</tr>
				<tr>
					<td>
						<?php _e( 'Team member job title font color: ', 'ctshowcase' ); ?>
					</td>
					<td>
						<input type='text' 
							   name="modal_team_member_job_title_font_color" class='ctshowcase-color-picker' 
							   value="<?php echo $modal_team_member_job_title_font_color; ?>"
							   />
					</td>
				</tr>
				<tr>
					<td>
						<?php _e( 'Other headings font color:', 'ctshowcase' ); ?>
					</td>
					<td>
						<input type="text" 
							   class="ctshowcase-color-picker"
							   name="modal_other_headings_font_color" 
							   value ="<?php echo $modal_other_headings_font_color; ?>" />
					</td>
					<td>
						<p class="description">
							<?php _e( 'Other headings are skills, phone, email, location and personal site headings', 'ctshowcase' ); ?>
						</p>
					</td>
				</tr>

				<tr>
					<td>
						<?php _e( 'Skill bar background color: ', 'ctshowcase' ); ?>
					</td>
					<td>
						<input 
							name="modal_skill_bar_bg" 
							value="<?php echo $modal_skill_bar_bg; ?>"
							type="text"
							class="ctshowcase-color-picker"
							/>
					</td>
				</tr>
				<tr>
					<td>
						<?php _e( 'Separator color:', 'ctshowcase' ); ?>
					</td>
					<td>
						<input class="ctshowcase-color-picker"
							   type="text"
							   name="modal_separator_color"
							   value="<?php echo $modal_separator_color; ?>"
							   />
					</td>
				</tr>
				<tr>
					<td>
						<?php _e( 'Social Media bar background color: ', 'ctshowcase' ); ?>
					</td>
					<td>
						<input type="text"
							   name="modal_social_media_bar_bg_color" 
							   value="<?php echo $modal_social_media_bar_bg_color; ?>"
							   class="ctshowcase-color-picker"
							   />
					</td>
				</tr>
				<tr>
					<td>
						<?php _e( 'Social media font color: ', 'ctshowcase' ); ?>
					</td>
					<td>
						<input name="modal_social_media_font_color"
							   class="ctshowcase-color-picker"
							   value="<?php echo $modal_social_media_font_color; ?>" 
							   />

					</td>
				</tr>
				<tr>
					<td>
						<?php _e( 'Navigation arrows and close button color: ', 'ctshowcase' ); ?>
					</td>
					<td>
						<input name="modal_header_icons_color" type="text" class="ctshowcase-color-picker" value="<?php echo $modal_header_icons_color; ?>" />
					</td>
				</tr>



			</table>
			<h4 style="display: inline-block;
				border-bottom: 1px solid #000;
				margin-left:20px">
				<?php _e( 'Font sizes:', 'ctshowcase' ); ?> 
			</h4>
			<table  cellpadding="3" class="ctshowcase-table">
				<tr>
					<td>
						<?php _e( 'Team member name font size(px): ', 'ctshowcase' ); ?>
					</td>
					<td>
						<input type='number' name="modal_team_member_name_font_size"
							   value ="<?php echo $modal_team_member_name_font_size; ?>" 
							   />
					</td>
				</tr>
				<tr>
					<td>
						<?php _e( 'Team member job title font size(px): ', 'ctshowcase' ); ?>
					</td>
					<td>
						<input type='number'  
							   name="modal_team_member_job_title_font_size"
							   value="<?php echo $modal_team_member_job_title_font_size; ?>"
							   />

					</td>
				</tr>
				<tr>
					<td>
						<?php _e( 'Main text font size(px)', 'ctshowcase' ); ?>
					</td>
					<td>
						<input name="modal_main_font_size"
							   value ="<?php echo $modal_main_font_size; ?>" 
							   />
					</td>
				</tr>
				<tr>
					<td>
						<?php _e( 'Other headings font size(px):', 'ctshowcase' ); ?>
					</td>
					<td>
						<input type="number" 
							   name="modal_other_headings_font_size" 
							   value ="<?php echo $modal_other_headings_font_size; ?>" />
					</td>
					<td>
						<p class="description">
							<?php _e( 'Other headings are skills, phone, email, location and personal site headings', 'ctshowcase' ); ?>
						</p>
					</td>
				</tr>
			</table>
			<h4 style="display: inline-block;
				border-bottom: 1px solid #000;
				margin-left:20px">
				<?php _e( 'Other headings title:', 'ctshowcase' ); ?> 
			</h4>
			<table>
				<tr>
					<td>
						<?php _e( 'Skills Title: ', 'ctshowcase' ); ?> 
					</td>
					<td>
						<input type="text" name="modal_skills_title" id ="modal_skills_title" value="<?php echo $modal_skills_title; ?>" />
					</td>
				</tr>
				<tr>
					<td>
						<?php _e( 'Location Title: ', 'ctshowcase' ); ?> 
					</td>
					<td>    
						<input type="text" name="modal_location_title" id ="modal_location_title" value="<?php echo $modal_location_title; ?>" />
					</td>
				</tr>
				<tr>
					<td>
						<?php _e( 'Email Title: ', 'ctshowcase' ); ?> 
					</td>
					<td>
						<input type="text" name="modal_email_title" id ="modal_email_title" value="<?php echo $modal_email_title; ?>" />
					</td>
				</tr>
				<tr>
					<td>
						<?php _e( 'Phone Title: ', 'ctshowcase' ); ?> 
					</td>
					<td>
						<input type="text" name="modal_phone_title" id ="modal_phone_title" value="<?php echo $modal_phone_title; ?>" />
					</td>
				</tr>
				<tr>
					<td>
						<?php _e( 'Personal Site Title: ', 'ctshowcase' ); ?> 
					</td>
					<td>
						<input type="text" name="modal_personal_site_title" id ="modal_personal_site_title" value="<?php echo $modal_personal_site_title; ?>" />
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>
