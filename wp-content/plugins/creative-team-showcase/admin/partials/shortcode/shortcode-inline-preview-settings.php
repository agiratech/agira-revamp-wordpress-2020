<?php ?>
<div class="inline-preview-settings layout-settings">
    <h4 class="ctshowcase-table-heading"><?php _e('Inline preview settings', 'ctshowcase'); ?> </h4>
    <table  class="ctshowcase-table" style="padding-left: 30px;" cellpadding="3">
        <tr>
            <td>

                <?php _e('List style:', 'ctshowcase'); ?>

            </td>
            <td>
                <select name="inlinePreview_type">
                    <option <?php selected($inlinePreview_type, 'square'); ?> value="square" > <?php _e('Square', 'ctshowcase'); ?> </option>
                    <option <?php selected($inlinePreview_type, 'circle'); ?> value="circle" > <?php _e('Circle', 'ctshowcase'); ?> </option>
                    <option <?php selected($inlinePreview_type, 'hex'); ?> value="hex" > <?php _e('Hexagonal', 'ctshowcase'); ?> </option>
                </select>
            </td>
        </tr>
        <tr>
            <td>

                <?php _e('Number of columns in the list:', 'ctshowcase'); ?>

            </td>
            <td>
                <select name="inlinePreview_no_of_cols">
                    <option <?php selected($inlinePreview_no_of_cols, 2); ?> value="2" > <?php _e(2, 'ctshowcase'); ?> </option>
                    <option <?php selected($inlinePreview_no_of_cols, 3); ?> value="3" > <?php _e(3, 'ctshowcase'); ?> </option>
                    <option <?php selected($inlinePreview_no_of_cols, 4); ?> value="4" > <?php _e(4, 'ctshowcase'); ?> </option>
                </select>
            </td>
            <td>
                <p class='description'> <?php _e('Incase of hexagonal style, number of columns will be for odd rows (first row, third row, fifth row and so on).', 'ctshowcase'); ?> </p>
            </td>
        </tr>
        <tr>
            <td>
                <?php _e('List column background:', 'ctshowcase'); ?>
            </td>
            <td>
                <input type="text" name="inlinePreview_list_col_bg" class="ctshowcase-color-picker" value="<?php echo $inlinePreview_list_col_bg; ?>" />
            </td>
        </tr>
        <tr class="inline-preview-display-heading">
            <td> <?php _e('Display heading: ', 'ctshowcase'); ?></td>
            <td>
                <input type="hidden" name='inlinePreview_display_heading' value="no" />
                <input name="inlinePreview_display_heading" 
                       id ="inlinePreview_display_heading"
                       class="ctshowcase-tgl ctshowcase-tgl-light" 
                       type="checkbox"
                       value='yes'
                       <?php checked($inlinePreview_display_heading, 'yes'); ?>>
                <label class="ctshowcase-tgl-btn" for="inlinePreview_display_heading"></label>

            </td>
        </tr>
        <tr class="inline-preview-heading">
            <td> <?php _e('Heading: ', 'ctshowcase'); ?> </td>
            <td> <input name="inlinePreview_heading" 
                        value ="<?php echo $inlinePreview_heading; ?>"
                        type="text"
                        />
            </td>
        </tr>
        <tr class="inline-preview-heading-color">
            <td> <?php _e('Heading color: ', 'ctshowcase'); ?> </td>
            <td> <input type="text" name="inlinePreview_heading_color" class="ctshowcase-color-picker" value ="<?php echo $inlinePreview_heading_color; ?>" />
            </td>
        </tr>
        <tr class="inline-preview-heading-font-size">
            <td> <?php _e('Heading font size:', 'ctshowcase'); ?> </td>
            <td> <input name="inlinePreview_heading_font_size" 
                        value ="<?php echo $inlinePreview_heading_font_size; ?>"
                        type="number"
                        />
            </td>
        </tr>
    </table>
    <button class="advanced-customization-for-member-details-col"><?php _e('Advanced Customization for Member details column', 'ctshowcase'); ?> <span style="margin-left: 20px;height: 100%;vertical-align: middle;"class=" dashicons dashicons-arrow-down-alt2"> </span></button>
    <div class="advanced-customization-settings inlinePreview-member-details-settings" style="padding-left: 30px;">
        <h4 style="display: inline-block;
            border-bottom: 1px solid #000;
            margin-left:20px">
            <?php _e('Font sizes:', 'ctshowcase'); ?> 
        </h4>
        <table class="ctshowcase-table"  cellpadding="3">  
            <tr>
                <td>
                    <?php _e('Main text font size(px)', 'ctshowcase'); ?>
                </td>
                <td>
                    <input name="inlinePreview_main_font_size"
                           value ="<?php echo $inlinePreview_main_font_size; ?>" 
                           />
                </td>
            </tr>
            <tr>
                <td>
                    <?php _e('Team member name font size(px): ', 'ctshowcase'); ?>
                </td>
                <td>
                    <input type='number' name="inlinePreview_team_member_name_font_size"
                           value ="<?php echo $inlinePreview_team_member_name_font_size; ?>" 
                           />
                </td>
            </tr>
            <tr>
                <td>
                    <?php _e('Team member job title font size(px): ', 'ctshowcase'); ?>
                </td>
                <td>
                    <input type='number'  
                           name="inlinePreview_team_member_job_title_font_size"
                           value="<?php echo $inlinePreview_team_member_job_title_font_size; ?>"
                           />

                </td>
            </tr>
            <tr>
                <td>
                    <?php _e('Other headings font size(px):', 'ctshowcase'); ?>
                </td>
                <td>
                    <input type="number" 
                           name="inlinePreview_other_headings_font_size" 
                           value ="<?php echo $inlinePreview_other_headings_font_size; ?>" />
                </td>
                <td>
                    <p class="description">
                        <?php _e('Other headings are skills, phone, email, location and personal site headings', 'ctshowcase'); ?>
                    </p>
                </td>
            </tr>
        </table>

        <h4 style="display: inline-block;
            border-bottom: 1px solid #000;
            margin-left:20px">
            <?php _e('Colors:', 'ctshowcase'); ?> 
        </h4>
        <table class="ctshowcase-table"  cellpadding="3">  
            <tr>
                <td>
                    <?php _e('Column Background: ', 'ctshowcase'); ?>
                </td>
                <td>
                    <input 
                        type='text'
                        name ="inlinePreview_member_details_col_bg" 
                        class='ctshowcase-color-picker' 
                        value="<?php echo $inlinePreview_member_details_col_bg; ?>" 
                        />

                </td>
            </tr>
            <tr>
                <td>
                    <?php _e('Main text color: ', 'ctshowcase'); ?>
                </td>
                <td>
                    <input 
                        type="text"
                        name="inlinePreview_main_text_color" 
                        value ="<?php echo $inlinePreview_main_text_color; ?>" 
                        class="ctshowcase-color-picker" />
                </td>
            </tr>
            <tr>
                <td>
                    <?php _e('Team member name color: ', 'ctshowcase'); ?>
                </td>
                <td>
                    <input type='text' name="inlinePreview_team_member_name_color" 
                           class='ctshowcase-color-picker'
                           value="<?php echo $inlinePreview_team_member_name_color; ?>"
                           />
                </td>
            </tr>


            <tr>
                <td>
                    <?php _e('Team member job title font color: ', 'ctshowcase'); ?>
                </td>
                <td>
                    <input type='text' 
                           name="inlinePreview_team_member_job_title_font_color" class='ctshowcase-color-picker' 
                           value="<?php echo $inlinePreview_team_member_job_title_font_color; ?>"
                           />

                </td>
            </tr>


            <tr>
                <td>
                    <?php _e('Other headings font color:', 'ctshowcase'); ?>
                </td>
                <td>
                    <input type="text" 
                           class="ctshowcase-color-picker"
                           name="inlinePreview_other_headings_font_color" 
                           value ="<?php echo $inlinePreview_other_headings_font_color; ?>" />
                </td>
            </tr>

            <tr>
                <td>
                    <?php _e('Skill bar background color: ', 'ctshowcase'); ?>
                </td>
                <td>
                    <input 
                        name="inlinePreview_skill_bar_bg" 
                        value="<?php echo $inlinePreview_skill_bar_bg; ?>"
                        type="text"
                        class="ctshowcase-color-picker"
                        />
                </td>
            </tr>
            <tr>
                <td>
                    <?php _e('Separator color:', 'ctshowcase'); ?>
                </td>
                <td>
                    <input class="ctshowcase-color-picker"
                           type="text"
                           name="inlinePreview_separator_color"
                           value="<?php echo $inlinePreview_separator_color; ?>"
                           />
                </td>
            </tr>
            <tr>
                <td>
                    <?php _e('Social Media bar background color: ', 'ctshowcase'); ?>
                </td>
                <td>
                    <input type="text"
                           name="inlinePreview_social_media_bar_bg_color" 
                           value="<?php echo $inlinePreview_social_media_bar_bg_color; ?>"
                           class="ctshowcase-color-picker"
                           />
                </td>
            </tr>
            <tr>
                <td>
                    <?php _e('Social media font color: ', 'ctshowcase'); ?>
                </td>
                <td>
                    <input name="inlinePreview_social_media_font_color"
                           class="ctshowcase-color-picker"
                           value="<?php echo $inlinePreview_social_media_font_color; ?>" 
                           />

                </td>
            </tr>
            <tr>
                <td>
                    <?php _e('Navigation arrows and up button color: ', 'ctshowcase'); ?>
                </td>
                <td>
                    <input name="inlinePreview_header_icons_color" type="text" class="ctshowcase-color-picker" value="<?php echo $inlinePreview_header_icons_color; ?>" />
                </td>
                <td>
                    <p class="description"><?php _e('These buttons appear only in small screens(<768px)', 'ctshowcase'); ?> </p>
                </td>
            </tr>



        </table>
        <h4 style="display: inline-block;
            border-bottom: 1px solid #000;
            margin-left:20px">
            <?php _e('Other headings title:', 'ctshowcase'); ?> 
        </h4>
        <table>
            <tr>
                <td>
                    <?php _e('Skills Title: ', 'ctshowcase'); ?> 
                </td>
                <td>
                    <input type="text" name="inlinePreview_skills_title" id ="inlinePreview_skills_title" value="<?php echo $inlinePreview_skills_title; ?>" />
                </td>
            </tr>
            <tr>
                <td>
                    <?php _e('Location Title: ', 'ctshowcase'); ?> 
                </td>
                <td>    
                    <input type="text" name="inlinePreview_location_title" id ="inlinePreview_location_title" value="<?php echo $inlinePreview_location_title; ?>" />
                </td>
            </tr>
            <tr>
                <td>
                    <?php _e('Email Title: ', 'ctshowcase'); ?> 
                </td>
                <td>
                    <input type="text" name="inlinePreview_email_title" id ="inlinePreview_email_title" value="<?php echo $inlinePreview_email_title; ?>" />
                </td>
            </tr>
            <tr>
                <td>
                    <?php _e('Phone Title: ', 'ctshowcase'); ?> 
                </td>
                <td>
                    <input type="text" name="inlinePreview_phone_title" id ="inlinePreview_phone_title" value="<?php echo $inlinePreview_phone_title; ?>" />
                </td>
            </tr>
            <tr>
                <td>
                    <?php _e('Personal Site Title: ', 'ctshowcase'); ?> 
                </td>
                <td>
                    <input type="text" name="inlinePreview_personal_site_title" id ="inlinePreview_personal_site_title" value="<?php echo $inlinePreview_personal_site_title; ?>" />
                </td>
            </tr>
        </table>
    </div>
</div>
