<?php ?>
<div class="wave-settings layout-settings">   
    <h4 class="ctshowcase-table-heading"> <?php _e('Wave settings', 'ctshowcase'); ?> </h4> 
    <table class='ctshowcase-table' style="padding-left: 30px;" cellpadding="3">
        <tr class="display-heading general-settings">
            <td style="width: 250px;"> <?php _e('Display heading?', 'ctshowcase'); ?></td>
            <td style="width: 250px"> 
                <input type="hidden" name='wave_display_heading' value="no" />
                <input name="wave_display_heading"
                       id="wave_display_heading_input"
                       type="checkbox"
                       class="ctshowcase-tgl ctshowcase-tgl-light" 
                       value='yes'
                       <?php checked($wave_display_heading, 'yes') ?>> 
                <label class="ctshowcase-tgl-btn" for="wave_display_heading_input"></label>

            </td>
            <td>
                <p class="description">
                    <?php _e('Default heading shown in middle of the wave layout.' , 'ctshowcase'); ?>
                </p>
            </td>
        </tr>
        <tr class="wave-heading-title ">
            <td> <?php _e('Heading: ', 'ctshowcase'); ?></td>
            <td> <input  name="wave_heading" type="text" value="<?php echo $wave_heading; ?>"/> </td>
        </tr>
        
        <tr class="wave-display-subheading">
            <td> <?php _e('Display subheading?', 'ctshowcase'); ?></td>
            <td> 
                <input type="hidden" name='wave_display_subheading' value="no" />
                <input name="wave_display_subheading" 
                       id ="wave_display_subheading"
                       class="ctshowcase-tgl ctshowcase-tgl-light" 
                       type="checkbox"
                       value='yes'
                       <?php checked($wave_display_subheading, 'yes'); ?>>
                <label class="ctshowcase-tgl-btn" for="wave_display_subheading"></label>

            </td>
            <td>
                <p class="description">
                    <?php _e('Default subheading shown in middle of the wave layout just above the heading.' , 'ctshowcase'); ?>
                </p>
            </td>
        </tr>
        <tr class="wave-subheading-title">
            <td> <?php _e('Subheading: ', 'ctshowcase'); ?></td>
            <td> <input name="wave_subheading" type="text" value="<?php echo $wave_subheading; ?>"/> </td>
        </tr>
    </table>
    <div style="padding-left: 30px;">
        <h4 style="display: inline-block;
                border-bottom: 1px solid #000;
                margin-left:20px">
                <?php _e('Colors:', 'ctshowcase'); ?> 
        </h4>
        <table class='ctshowcase-table' cellpadding="3">
            <tr class="wave-theme-color">
                <td style="width: 250px"> <?php _e('General theme color:', 'ctshowcase'); ?> </td>
                <td style="width: 250px"> <input type="text"  class="ctshowcase-color-picker" name="wave_theme_color" value ="<?php echo $wave_theme_color; ?> " /> </td>
                <td style='max-width:300px;'>
                    <p class="description"><?php _e('Theme color is the color for  job title, connectors and waves around the team member image. Note: This theme color can be overriden for each group and this feature is only in wave layout.', 'ctshowcase'); ?> </p>
                </td>
            </tr>
            <tr class="wave-team-member-name-color">
                <td> <?php _e('Team member name color:', 'ctshowcase'); ?> </td>
                <td> <input type="text" class="ctshowcase-color-picker" 
                            name="wave_team_member_name_color" value="<?php echo $wave_team_member_name_color; ?>" /> </td>
            </tr>
            <tr class="wave-heading-color">
                <td> <?php _e('Heading color: ', 'ctshowcase'); ?></td>
                <td> <input name="wave_heading_color" class="ctshowcase-color-picker" type="text" value="<?php echo $wave_heading_color; ?>"/> </td>
            </tr>
            <tr class="wave-subheading-color">
                <td> <?php _e('Subheading color : ', 'ctshowcase'); ?></td>
                <td> <input name="wave_subheading_color" class="ctshowcase-color-picker" type="text" value="<?php echo $wave_subheading_color; ?>"/> </td>
            </tr>
        </table>
    </div>
    <div class="wave-media-queries" style="display:table; padding-left: 46px;">
        <h4 style="display: inline-block;
            border-bottom: 1px solid #000">
            <?php _e('Media Queries:', 'ctshowcase'); ?> 
        </h4>
        <div class="ctshowcase-ui-tabgroup">
            <input class="ui-tab1" type="radio" id="tgroup_wave_tab1" name="tgroup_wave" checked />
            <input class="ui-tab2" type="radio" id="tgroup_wave_tab2" name="tgroup_wave" />
            <input class="ui-tab3" type="radio" id="tgroup_wave_tab3" name="tgroup_wave" />
            <input class="ui-tab4" type="radio" id="tgroup_wave_tab4" name="tgroup_wave" />
            <input class="ui-tab5" type="radio" id="tgroup_wave_tab5" name="tgroup_wave" />
            <div class="ui-tabs">
                <label class="ui-tab1" for="tgroup_wave_tab1">
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
                <label class="ui-tab2" for="tgroup_wave_tab2">
                    <div>
                        <svg id="preview-sizer-lg" viewBox="0 0 24 24" width="20px" height="100%">
                        <g>
                        <path d="M21,13.795V4c0-1.103-0.897-2-2-2H5C3.897,2,3,2.897,3,4v9.795l-2.322,5.417 c-0.265,0.62-0.202,1.326,0.169,1.889C1.218,21.664,1.842,22,2.517,22h18.967c0.674,0,1.298-0.336,1.67-0.899 c0.371-0.563,0.434-1.269,0.168-1.889L21,13.795z M19,13H5V4h14V13z"></path>
                        </g>
                        </svg>
                    </div>                   
                    <span class="ctshowcase-preview-sizer-desc">980px-1199px</span>
                </label>
                <label class="ui-tab3" for="tgroup_wave_tab3">
                    <div>
                        <svg id="preview-sizer-md" viewBox="0 0 24 24" width="20px" height="100%">
                        <g>
                        <path d="M20,0H4C2.346,0,1,1.346,1,3v18c0,1.654,1.346,3,3,3h16c1.654,0,3-1.346,3-3V3C23,1.346,21.654,0,20,0z  M12,22c-0.552,0-1-0.448-1-1s0.448-1,1-1s1,0.448,1,1S12.552,22,12,22z M21,17c0,0.552-0.448,1-1,1H4c-0.552,0-1-0.448-1-1V4 c0-0.552,0.448-1,1-1h16c0.552,0,1,0.448,1,1V17z"></path>
                        </g>
                        </svg>
                    </div>
                    <span class="cs-preview-sizer-desc">768px-979px</span>
                </label>
                <label class="ui-tab4" for="tgroup_wave_tab4">
                    <div>
                        <svg id="preview-sizer-sm" viewBox="0 0 24 24" width="20px" height="100%">
                        <g>
                        <path d="M18,0H6C4.346,0,3,1.346,3,3v18c0,1.654,1.346,3,3,3h12c1.654,0,3-1.346,3-3V3C21,1.346,19.654,0,18,0z  M12,22c-0.552,0-1-0.448-1-1s0.448-1,1-1s1,0.448,1,1S12.552,22,12,22z M19,17c0,0.552-0.448,1-1,1H6c-0.552,0-1-0.448-1-1V4 c0-0.552,0.448-1,1-1h12c0.552,0,1,0.448,1,1V17z"></path>
                        </g>
                        </svg>
                    </div>
                    <span class="cs-preview-sizer-desc">481px-767px</span>
                </label>
                <label class="ui-tab5" for="tgroup_wave_tab5">
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
                    <table class="wave-xl-table"  cellpadding="3">
                        <tr class="wave-xl-team-member-name-font-size">
                            <td> <?php _e('Team Member name / heading font size(px) : ', 'ctshowcase'); ?></td>
                            <td> <input name="wave_xl_team_member_name_font_size" type="number" value="<?php echo $wave_xl_team_member_name_font_size; ?>"/> </td>
                        </tr> 
                        <tr class="wave-xl-team-member-job-title-font-size">
                            <td> <?php _e('Team Member job title / subheading font size(px) : ', 'ctshowcase'); ?></td>
                            <td> <input name="wave_xl_team_member_job_title_font_size" type="number" value="<?php echo $wave_xl_team_member_job_title_font_size; ?>"/> </td>
                        </tr> 

                    </table>
                </div>
                <div class="ui-tab2">
                    <table class="wave-lg-table"  cellpadding="3">
                        <tr class="wave-lg-team-member-name-font-size">
                            <td> <?php _e('Team Member name / heading font size(px) : ', 'ctshowcase'); ?></td>
                            <td> <input name="wave_lg_team_member_name_font_size" type="number" value="<?php echo $wave_lg_team_member_name_font_size; ?>"/> </td>
                        </tr> 
                        <tr class="wave-lg-team-member-job-title-font-size">
                            <td> <?php _e('Team Member job title / subheading font size(px) : ', 'ctshowcase'); ?></td>
                            <td> <input name="wave_lg_team_member_job_title_font_size" type="number" value="<?php echo $wave_lg_team_member_job_title_font_size; ?>"/> </td>
                        </tr> 
                    </table>
                </div>
                <div class="ui-tab3">
                    <table class="wave-md-table"  cellpadding="3">
                        <tr class="wave-md-team-member-name-font-size">
                            <td> <?php _e('Team Member name /heading font size(px) : ', 'ctshowcase'); ?></td>
                            <td> <input name="wave_md_team_member_name_font_size" type="number" value="<?php echo $wave_md_team_member_name_font_size; ?>"/> </td>
                        </tr> 
                        <tr class="wave-md-team-member-job-title-font-size">
                            <td> <?php _e('Team Member job title / subheading font size(px) : ', 'ctshowcase'); ?></td>
                            <td> <input name="wave_md_team_member_job_title_font_size" type="number" value="<?php echo $wave_md_team_member_job_title_font_size; ?>"/> </td>
                        </tr> 
                    </table>
                </div>
                <div class="ui-tab4">
                    <table class="wave-sm-table"  cellpadding="3">
                        <tr class="wave-sm-team-member-name-font-size">
                            <td> <?php _e('Team Member name / heading font size(px) : ', 'ctshowcase'); ?></td>
                            <td> <input name="wave_sm_team_member_name_font_size" type="number" value="<?php echo $wave_sm_team_member_name_font_size; ?>"/> </td>
                        </tr> 
                        <tr class="wave-sm-team-member-job-title-font-size">
                            <td> <?php _e('Team Member job title / subheading font size(px) : ', 'ctshowcase'); ?></td>
                            <td> <input name="wave_sm_team_member_job_title_font_size" type="number" value="<?php echo $wave_sm_team_member_job_title_font_size; ?>"/> </td>
                        </tr> 
                    </table>
                </div>
                <div class="ui-tab5">
                    <table class="wave-xs-table"  cellpadding="3">
                        <tr class="wave-xs-team-member-name-font-size">
                            <td> <?php _e('Team Member name / heading font size(px) : ', 'ctshowcase'); ?></td>
                            <td> <input name="wave_xs_team_member_name_font_size" type="number" value="<?php echo $wave_xs_team_member_name_font_size; ?>"/> </td>
                        </tr> 
                        <tr class="wave-xs-team-member-job-title-font-size">
                            <td> <?php _e('Team Member job title / subheading font size(px) : ', 'ctshowcase'); ?></td>
                            <td> <input name="wave_xs_team_member_job_title_font_size" type="number" value="<?php echo $wave_xs_team_member_job_title_font_size; ?>"/> </td>
                        </tr> 
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>