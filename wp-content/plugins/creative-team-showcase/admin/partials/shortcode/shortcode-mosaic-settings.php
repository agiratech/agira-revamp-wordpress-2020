<?php ?>
<div class="mosaic-settings layout-settings">   
    <h4 class="ctshowcase-table-heading"> <?php _e('Mosaic settings', 'ctshowcase'); ?> </h4> 
    <div class="mosaic-settings-tables" style="padding-left: 30px;">
        <table cellpadding="3">
            <tr class="mosaic-row-member-no">
                <td> <?php _e('No of members per row:', 'ctshowcase'); ?></td>
                <td>             
                    <select name="mosaic_row_members_no">
                        <option <?php selected($mosaic_row_members_no, 2); ?> value="2"> 2 </option>
                        <option <?php selected($mosaic_row_members_no, 3); ?> value="3"> 3 </option>
                    </select>
                </td>
            </tr>
            <tr class='mosaic-display-social-icons'>
                <td> <?php _e('Display social icons:' , 'ctshowcase' ); ?> </td>
                <td><input type="hidden" name='mosaic_display_social_icons' value="no" />
                    <input id='mosaic_display_social_icons' class="ctshowcase-tgl ctshowcase-tgl-light" name="mosaic_display_social_icons" type="checkbox" value="yes" 
                           <?php echo($mosaic_display_social_icons == 'yes') ? 'checked' : ''; ?>/> 
                    <label class="ctshowcase-tgl-btn" for="mosaic_display_social_icons"></label>
                </td>
            </tr>
	    <tr class='mosaic-display-read-more-link mosaic-read-more-settings'>
                <td> <?php _e('Display read more link:' , 'ctshowcase' ); ?> </td>
                <td><input type="hidden" name='mosaic_display_read_more_link' value="no" />
                    <input id='mosaic_display_read_more_link' 
			   class="ctshowcase-tgl ctshowcase-tgl-light" 
			   name="mosaic_display_read_more_link" type="checkbox" 
			   value="yes" 
                           <?php echo($mosaic_display_read_more_link == 'yes') ? 'checked' : ''; ?>/> 
                    <label class="ctshowcase-tgl-btn" for="mosaic_display_read_more_link"></label>
                </td>
            </tr>
	    <tr class="mosaic-read-more-text hidden">
		<td> <?php _e('Read more text:', 'ctshowcase');?> </td>
		<td> <input type="text" name="mosaic_read_more_text" value="<?php echo $mosaic_read_more_text; ?>" /></td>
	    </tr>
        </table>
        <h4 style="display: inline-block;
            border-bottom: 1px solid #000;
            margin-left:20px">
            <?php _e('Odd rows colors:', 'ctshowcase'); ?> 
        </h4>
        <table class="ctshowcase-table" cellpadding="3">

            <tr class="mosaic-odd-theme-color">
                <td> <?php _e('Odd Rows theme color:', 'ctshowcase'); ?> </td>
                <td> <input type="text"  class="ctshowcase-color-picker" name="mosaic_odd_theme_color" value ="<?php echo $mosaic_odd_theme_color; ?> " /> </td>
                <td> <p class='description'><?php _e('The background for odd rows(first row, third row, fifth row and so on). ' , 'ctshowcase');?>  </p> </td>
            </tr>
            <tr class="mosaic-odd-team-member-name-color">
                <td> <?php _e('Odd rows team member name color:', 'ctshowcase'); ?> </td>
                <td> <input type="text" class="ctshowcase-color-picker" 
                            name="mosaic_odd_team_member_name_color" value="<?php echo $mosaic_odd_team_member_name_color; ?>" /> </td>
            </tr>
            <tr class="mosaic-odd-team-member-job-title-color">
                <td> <?php _e('Odd rows team member job title color:', 'ctshowcase'); ?> </td>
                <td> <input type="text" class="ctshowcase-color-picker" 
                            name="mosaic_odd_team_member_job_title_color" value="<?php echo $mosaic_odd_team_member_job_title_color; ?>" /> </td>
            </tr>
            <tr class="mosaic-odd-social-icons-color mosaic-social-icons-color">
                <td> <?php _e('Odd rows team member social icons color:', 'ctshowcase'); ?> </td>
                <td> <input type="text" class="ctshowcase-color-picker" 
                            name="mosaic_odd_social_icons_color" value="<?php echo $mosaic_odd_social_icons_color; ?>" /> </td>
            </tr>
	    <tr class="mosacic-odd-read-more-color mosaic-read-more-color">
                <td> <?php _e('Odd rows "Read More link" color:', 'ctshowcase'); ?> </td>
                <td><input type="text" class="ctshowcase-color-picker" 
                            name="mosaic_odd_read_more_color" value="<?php echo $mosaic_odd_read_more_color; ?>" />
		</td>
            </tr>
        </table>
        <h4 style="display: inline-block;
            border-bottom: 1px solid #000;
            margin-left:20px">
            <?php _e('Even rows colors:', 'ctshowcase'); ?> 
        </h4>
        <table class="ctshowcase-table" cellpadding="3">
            <tr class="mosaic-even-theme-color">
                <td> <?php _e('Even Rows theme color:', 'ctshowcase'); ?> </td>
                <td> <input type="text"  class="ctshowcase-color-picker" name="mosaic_even_theme_color" value ="<?php echo $mosaic_even_theme_color; ?> " /> </td>
                <td> <p class='description'><?php _e('The background for even rows(second row, forth row, sixth row and so on).'  , 'ctshowcase');?> </p>
            </tr>

            <tr class="mosaic-even-team-member-name-color">
                <td> <?php _e('Even rows team member name color:', 'ctshowcase'); ?> </td>
                <td> <input type="text" class="ctshowcase-color-picker" 
                            name="mosaic_even_team_member_name_color" value="<?php echo $mosaic_even_team_member_name_color; ?>" /> </td>
            </tr>
            <tr class="mosaic-even-team-member-job-title-color">
                <td> <?php _e('Even rows team member job title color:', 'ctshowcase'); ?> </td>
                <td> <input type="text" class="ctshowcase-color-picker" 
                            name="mosaic_even_team_member_job_title_color" value="<?php echo $mosaic_even_team_member_job_title_color; ?>" /> </td>
            </tr>
            <tr class="mosaic-even-social-icons-color mosaic-social-icons-color">
                <td> <?php _e('Even rows team member social icons color:', 'ctshowcase'); ?> </td>
                <td> <input type="text" class="ctshowcase-color-picker" 
                            name="mosaic_even_social_icons_color" value="<?php echo $mosaic_even_social_icons_color; ?>" /> </td>
            </tr>
	    <tr class="mosacic-even-read-more-color mosaic-read-more-color">
                <td> <?php _e('Even rows "Read More link" color:', 'ctshowcase'); ?> </td>
                <td><input type="text" class="ctshowcase-color-picker" 
                            name="mosaic_even_read_more_color" value="<?php echo $mosaic_even_read_more_color; ?>" />
		</td>
            </tr>
        </table>
    <div class="mosaic-media-queries" style="display:table; padding-left: 22px;">
        <h4 style="display: inline-block;
            border-bottom: 1px solid #000">
            <?php _e('Media Queries:', 'ctshowcase'); ?> 
        </h4>
        <div class="ctshowcase-ui-tabgroup">
            <input class="ui-tab1" type="radio" id="tgroup_mosaic_tab1" name="tgroup_mosaic" checked />
            <input class="ui-tab2" type="radio" id="tgroup_mosaic_tab2" name="tgroup_mosaic" />
            <input class="ui-tab3" type="radio" id="tgroup_mosaic_tab3" name="tgroup_mosaic" />
            <input class="ui-tab4" type="radio" id="tgroup_mosaic_tab4" name="tgroup_mosaic" />
            <input class="ui-tab5" type="radio" id="tgroup_mosaic_tab5" name="tgroup_mosaic" />
            <div class="ui-tabs">
                <label class="ui-tab1" for="tgroup_mosaic_tab1">
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
                <label class="ui-tab2" for="tgroup_mosaic_tab2">
                    <div>
                        <svg id="preview-sizer-lg" viewBox="0 0 24 24" width="20px" height="100%">
                        <g>
                        <path d="M21,13.795V4c0-1.103-0.897-2-2-2H5C3.897,2,3,2.897,3,4v9.795l-2.322,5.417 c-0.265,0.62-0.202,1.326,0.169,1.889C1.218,21.664,1.842,22,2.517,22h18.967c0.674,0,1.298-0.336,1.67-0.899 c0.371-0.563,0.434-1.269,0.168-1.889L21,13.795z M19,13H5V4h14V13z"></path>
                        </g>
                        </svg>
                    </div>                   
                    <span class="ctshowcase-preview-sizer-desc">980px-1199px</span>
                </label>
                <label class="ui-tab3" for="tgroup_mosaic_tab3">
                    <div>
                        <svg id="preview-sizer-md" viewBox="0 0 24 24" width="20px" height="100%">
                        <g>
                        <path d="M20,0H4C2.346,0,1,1.346,1,3v18c0,1.654,1.346,3,3,3h16c1.654,0,3-1.346,3-3V3C23,1.346,21.654,0,20,0z  M12,22c-0.552,0-1-0.448-1-1s0.448-1,1-1s1,0.448,1,1S12.552,22,12,22z M21,17c0,0.552-0.448,1-1,1H4c-0.552,0-1-0.448-1-1V4 c0-0.552,0.448-1,1-1h16c0.552,0,1,0.448,1,1V17z"></path>
                        </g>
                        </svg>
                    </div>
                    <span class="cs-preview-sizer-desc">768px-979px</span>
                </label>
                <label class="ui-tab4" for="tgroup_mosaic_tab4">
                    <div>
                        <svg id="preview-sizer-sm" viewBox="0 0 24 24" width="20px" height="100%">
                        <g>
                        <path d="M18,0H6C4.346,0,3,1.346,3,3v18c0,1.654,1.346,3,3,3h12c1.654,0,3-1.346,3-3V3C21,1.346,19.654,0,18,0z  M12,22c-0.552,0-1-0.448-1-1s0.448-1,1-1s1,0.448,1,1S12.552,22,12,22z M19,17c0,0.552-0.448,1-1,1H6c-0.552,0-1-0.448-1-1V4 c0-0.552,0.448-1,1-1h12c0.552,0,1,0.448,1,1V17z"></path>
                        </g>
                        </svg>
                    </div>
                    <span class="cs-preview-sizer-desc">481px-767px</span>
                </label>
                <label class="ui-tab5" for="tgroup_mosaic_tab5">
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
                    <table class="mosaic-xl-table"  cellpadding="3">
                        <tr class="mosaic-xl-team-member-name-font-size">
                            <td> <?php _e('Team Member name font size(px) : ', 'ctshowcase'); ?></td>
                            <td> <input name="mosaic_xl_team_member_name_font_size" type="number" value="<?php echo $mosaic_xl_team_member_name_font_size; ?>"/> </td>
                        </tr> 
                        <tr class="mosaic-xl-team-member-job-title-font-size">
                            <td> <?php _e('Team Member job title font size(px) : ', 'ctshowcase'); ?></td>
                            <td> <input name="mosaic_xl_team_member_job_title_font_size" type="number" value="<?php echo $mosaic_xl_team_member_job_title_font_size; ?>"/> </td>
                        </tr> 
                        <tr class="mosaic-xl-social-icons-font-size mosaic-social-icons-font-size">
                            <td> 
                                <?php _e('Social Icons font size(px) : ', 'ctshowcase'); ?>
                            </td>
                            <td> 
                                <input name="mosaic_xl_social_icons_font_size" 
                                       type="number" 
                                       value="<?php echo $mosaic_xl_social_icons_font_size ?>"/> 
                            </td>
                        </tr> 
                    </table>
                </div>
                <div class="ui-tab2">
                    <table class="mosaic-lg-table"  cellpadding="3">
                        <tr class="mosaic-lg-team-member-name-font-size">
                            <td> <?php _e('Team Member name font size(px) : ', 'ctshowcase'); ?></td>
                            <td> 
                                <input name="mosaic_lg_team_member_name_font_size" 
                                       type="number" 
                                       value="<?php echo $mosaic_lg_team_member_name_font_size; ?>"/> 
                            </td>
                        </tr> 
                        <tr class="mosaic-lg-team-member-job-title-font-size">
                            <td> <?php _e('Team Member job title font size(px) : ', 'ctshowcase'); ?></td>
                            <td> 
                                <input name="mosaic_lg_team_member_job_title_font_size" 
                                       type="number" 
                                       value="<?php echo $mosaic_lg_team_member_job_title_font_size; ?>"/>
                            </td>
                        </tr>
                        <tr class="mosaic-lg-social-icons-font-size mosaic-social-icons-font-size">
                            <td> 
                                <?php _e('Social Icons font size(px) : ', 'ctshowcase'); ?>
                            </td>
                            <td> 
                                <input name="mosaic_lg_social_icons_font_size" 
                                       type="number" 
                                       value="<?php echo $mosaic_lg_social_icons_font_size ?>"/> 
                            </td>
                        </tr> 
                    </table>
                </div>
                <div class="ui-tab3">
                    <table class="mosaic-md-table"  cellpadding="3">
                        <tr class="mosaic-md-team-member-name-font-size">
                            <td> <?php _e('Team Member name font size(px) : ', 'ctshowcase'); ?></td>
                            <td> <input name="mosaic_md_team_member_name_font_size" type="number" value="<?php echo $mosaic_md_team_member_name_font_size; ?>"/> </td>
                        </tr> 
                        <tr class="mosaic-xl-team-member-job-title-font-size">
                            <td> <?php _e('Team Member job title font size(px) : ', 'ctshowcase'); ?></td>
                            <td> <input name="mosaic_md_team_member_job_title_font_size" type="number" value="<?php echo $mosaic_md_team_member_job_title_font_size; ?>"/> </td>
                        </tr>
                        <tr class="mosaic-md-social-icons-font-size mosaic-social-icons-font-size">
                            <td> 
                                <?php _e('Social Icons font size(px) : ', 'ctshowcase'); ?>
                            </td>
                            <td> 
                                <input name="mosaic_md_social_icons_font_size" 
                                       type="number" 
                                       value="<?php echo $mosaic_md_social_icons_font_size ?>"/> 
                            </td>
                        </tr> 
                    </table>
                </div>
                <div class="ui-tab4">
                    <table class="mosaic-sm-table"  cellpadding="3">
                        <tr class="mosaic-sm-team-member-name-font-size">
                            <td> <?php _e('Team Member name font size(px) : ', 'ctshowcase'); ?></td>
                            <td> <input name="mosaic_sm_team_member_name_font_size" type="number" value="<?php echo $mosaic_sm_team_member_name_font_size; ?>"/> </td>
                        </tr> 
                        <tr class="mosaic-sm-team-member-job-title-font-size">
                            <td> <?php _e('Team Member job title font size(px) : ', 'ctshowcase'); ?></td>
                            <td> <input name="mosaic_sm_team_member_job_title_font_size" type="number" value="<?php echo $mosaic_sm_team_member_job_title_font_size; ?>"/> </td>
                        </tr> 
                        <tr class="mosaic-sm-social-icons-font-size mosaic-social-icons-font-size">
                            <td> 
                                <?php _e('Social Icons font size(px) : ', 'ctshowcase'); ?>
                            </td>
                            <td> 
                                <input name="mosaic_sm_social_icons_font_size" 
                                       type="number" 
                                       value="<?php echo $mosaic_sm_social_icons_font_size ?>"/> 
                            </td>
                        </tr> 
                    </table>
                </div>
                <div class="ui-tab5">
                    <table class="mosaic-xs-table"  cellpadding="3">
                        <tr class="mosaic-xs-team-member-name-font-size">
                            <td> <?php _e('Team Member name font size(px) : ', 'ctshowcase'); ?></td>
                            <td> <input name="mosaic_xs_team_member_name_font_size" type="number" value="<?php echo $mosaic_xs_team_member_name_font_size; ?>"/> </td>
                        </tr> 
                        <tr class="mosaic-xs-team-member-job-title-font-size">
                            <td> <?php _e('Team Member job title font size(px) : ', 'ctshowcase'); ?></td>
                            <td> <input name="mosaic_xs_team_member_job_title_font_size" type="number" value="<?php echo $mosaic_xs_team_member_job_title_font_size; ?>"/> </td>
                        </tr>
                       <tr class="mosaic-xs-social-icons-font-size mosaic-social-icons-font-size">
                            <td> 
                                <?php _e('Social Icons font size(px) : ', 'ctshowcase'); ?>
                            </td>
                            <td> 
                                <input name="mosaic_xs_social_icons_font_size" 
                                       type="number" 
                                       value="<?php echo $mosaic_xs_social_icons_font_size ?>"/> 
                            </td>
                        </tr> 
                    </table>
                </div>

            </div>
        </div>
    </div>
    </div>
</div>