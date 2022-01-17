<?php ?>
<div class="hex-settings layout-settings">
    <h4 class="ctshowcase-table-heading"><?php _e('Hexagonal settings', 'ctshowcase'); ?> </h4>
    <table style="padding-left: 30px;" cellpadding="3">
        <tr class="no-of-hexagons">
            <td> <?php _e('No of hexagons in odd rows:', 'ctshowcase'); ?></td>
            <td>             
                <select name="no_of_hexagons">
                    <option <?php selected($no_of_hexagons, 3); ?> value="3"> 3 </option>
                    <option <?php selected($no_of_hexagons, 4); ?> value="4"> 4 </option>
                    <option <?php selected($no_of_hexagons, 5); ?> value="5"> 5 </option>
					<option <?php selected($no_of_hexagons, 6); ?> value="6"> 6</option>
					<option <?php selected($no_of_hexagons, 7); ?> value="7"> 7</option>
					<option <?php selected($no_of_hexagons, 8); ?> value="8"> 8</option>
                </select>
            </td>
            <td>
                <p class='description'>
                    <?php _e('Odd rows are 1st row, 3rd row, 5th row and so on.', 'ctshowcase'); ?> 
                </p>
            </td>
        </tr>
        <tr class="hex-enable-groups-filter">
            <td> <?php _e('Enable groups filter: ' , 'ctshowcase' ); ?></td>
            <td>
                <input type="hidden" name='hex_enable_filter' value="no" />
                <input name="hex_enable_filter" 
                       id ="hex_enable_filter"
                       class="ctshowcase-tgl ctshowcase-tgl-light" 
                       type="checkbox"
                       value='yes'
                       <?php checked($hex_enable_filter, 'yes'); ?>>
                <label class="ctshowcase-tgl-btn" for="hex_enable_filter"></label>
            
            </td>
        </tr>
    </table>
    <h4 style="display: inline-block;
        border-bottom: 1px solid #000;
        margin-left:50px">
        <?php _e('Colors:', 'ctshowcase'); ?> 
    </h4>
    <table cellpadding="3" style="padding-left: 30px;">
         <tr class="background-overlay">
            <td> <?php _e('Background overlay color:', 'ctshowcase'); ?>  </td>
            <td> <input name="hex_background_overlay" data-alpha="true" type="text" class="ctshowcase-color-picker" value="<?php echo $hex_background_overlay; ?>" />
        </tr>
        <tr class="hex-team-member-name-color">
            <td> <?php _e('Team Member name color : ', 'ctshowcase'); ?></td>
            <td> <input name="hex_team_member_name_color" type="text" class="ctshowcase-color-picker" value="<?php echo $hex_team_member_name_color; ?>"/> </td>
        </tr> 
        <tr class="hex-team-member-job-title-color">
            <td> <?php _e('Team Member job title color : ', 'ctshowcase'); ?></td>
            <td> <input name="hex_team_member_job_title_color" class="ctshowcase-color-picker" type="text" value="<?php echo $hex_team_member_job_title_color ?>"/> </td>
        </tr> 
        <tr class="hex-filter-inactive-font-color">
            <td> <?php _e('Filter inactive link font color: '); ?></td>
            <td>  <input name="hex_filter_inactive_link_font_color" 
                         class="ctshowcase-color-picker" 
                         type="text" 
                         value="<?php echo $hex_filter_inactive_link_font_color ?>"/>
            </td>
        </tr>
        <tr class="hex-filter-inactive-link-bg-color">
            <td> <?php _e('Filter inactive link background color: '); ?> </td>
            <td> <input name="hex_filter_inactive_link_bg_color"
                        class="ctshowcase-color-picker" 
                        type="text" 
                        value="<?php echo $hex_filter_inactive_link_bg_color ?>"/>
            </td>
        </tr>
        <tr class="hex-filter-active-link-font-color">
            <td>
                <?php _e('Filter active link font color: ', 'ctshowcase'); ?>
            </td>
            <td> <input name="hex_filter_active_link_font_color"
                        class="ctshowcase-color-picker" 
                        type="text" 
                        value="<?php echo $hex_filter_active_link_font_color ?>"/>
            </td>
        </tr>
        <tr class="hex-filter-active-link-bg-color">
            <td>
                <?php _e('Filter active link background color:' , 'ctshowcase'); ?>
            </td>
            <td>
                <input name="hex_filter_active_link_bg_color"
                       class="ctshowcase-color-picker"
                       type="text"
                       value="<?php echo $hex_filter_active_link_bg_color; ?>"
                />
            </td>
        </tr>
    </table>
    <div class="hex-media-queries" style="display:table; padding-left: 45px;">
        <h4 style="display: inline-block;
            border-bottom: 1px solid #000;
            ">
            <?php _e('Media queries:', 'ctshowcase'); ?> 
        </h4>
        <div class="ctshowcase-ui-tabgroup">
            <input class="ui-tab1" type="radio" id="tgroup_hex_tab1" name="tgroup_hex" checked />
            <input class="ui-tab2" type="radio" id="tgroup_hex_tab2" name="tgroup_hex" />
            <input class="ui-tab3" type="radio" id="tgroup_hex_tab3" name="tgroup_hex" />
            <input class="ui-tab4" type="radio" id="tgroup_hex_tab4" name="tgroup_hex" />
            <input class="ui-tab5" type="radio" id="tgroup_hex_tab5" name="tgroup_hex" />
            <div class="ui-tabs">
                <label class="ui-tab1" for="tgroup_hex_tab1">
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
                <label class="ui-tab2" for="tgroup_hex_tab2">
                    <div>
                        <svg id="preview-sizer-lg" viewBox="0 0 24 24" width="20px" height="100%">
                        <g>
                        <path d="M21,13.795V4c0-1.103-0.897-2-2-2H5C3.897,2,3,2.897,3,4v9.795l-2.322,5.417 c-0.265,0.62-0.202,1.326,0.169,1.889C1.218,21.664,1.842,22,2.517,22h18.967c0.674,0,1.298-0.336,1.67-0.899 c0.371-0.563,0.434-1.269,0.168-1.889L21,13.795z M19,13H5V4h14V13z"></path>
                        </g>
                        </svg>
                    </div>                   
                    <span class="ctshowcase-preview-sizer-desc">980px-1199px</span>
                </label>
                <label class="ui-tab3" for="tgroup_hex_tab3">
                    <div>
                        <svg id="preview-sizer-md" viewBox="0 0 24 24" width="20px" height="100%">
                        <g>
                        <path d="M20,0H4C2.346,0,1,1.346,1,3v18c0,1.654,1.346,3,3,3h16c1.654,0,3-1.346,3-3V3C23,1.346,21.654,0,20,0z  M12,22c-0.552,0-1-0.448-1-1s0.448-1,1-1s1,0.448,1,1S12.552,22,12,22z M21,17c0,0.552-0.448,1-1,1H4c-0.552,0-1-0.448-1-1V4 c0-0.552,0.448-1,1-1h16c0.552,0,1,0.448,1,1V17z"></path>
                        </g>
                        </svg>
                    </div>
                    <span class="cs-preview-sizer-desc">768px-979px</span>
                </label>
                <label class="ui-tab4" for="tgroup_hex_tab4">
                    <div>
                        <svg id="preview-sizer-sm" viewBox="0 0 24 24" width="20px" height="100%">
                        <g>
                        <path d="M18,0H6C4.346,0,3,1.346,3,3v18c0,1.654,1.346,3,3,3h12c1.654,0,3-1.346,3-3V3C21,1.346,19.654,0,18,0z  M12,22c-0.552,0-1-0.448-1-1s0.448-1,1-1s1,0.448,1,1S12.552,22,12,22z M19,17c0,0.552-0.448,1-1,1H6c-0.552,0-1-0.448-1-1V4 c0-0.552,0.448-1,1-1h12c0.552,0,1,0.448,1,1V17z"></path>
                        </g>
                        </svg>
                    </div>
                    <span class="cs-preview-sizer-desc">481px-767px</span>
                </label>
                <label class="ui-tab5" for="tgroup_hex_tab5">
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
                    <table class="hex-xl-table"  cellpadding="3">
                        <tr class="hex-xl-team-member-name-font-size">
                            <td> <?php _e('Team Member name font size(px) : ', 'ctshowcase'); ?></td>
                            <td> <input name="hex_xl_team_member_name_font_size" type="number" value="<?php echo $hex_xl_team_member_name_font_size; ?>"/> </td>
                        </tr> 
                        <tr class="hex-xl-team-member-job-title-font-size">
                            <td> <?php _e('Team Member job title font size(px) : ', 'ctshowcase'); ?></td>
                            <td> <input name="hex_xl_team_member_job_title_font_size" type="number" value="<?php echo $hex_xl_team_member_job_title_font_size; ?>"/> </td>
                        </tr> 
                    </table>
                </div>
                <div class="ui-tab2">
                    <table class="hex-lg-table"  cellpadding="3">
                        <tr class="hex-lg-team-member-name-font-size">
                            <td> <?php _e('Team Member name font size(px) : ', 'ctshowcase'); ?></td>
                            <td> 
                                <input name="hex_lg_team_member_name_font_size" 
                                       type="number" 
                                       value="<?php echo $hex_lg_team_member_name_font_size; ?>"/> 
                            </td>
                        </tr> 
                        <tr class="hex-lg-team-member-job-title-font-size">
                            <td> <?php _e('Team Member job title font size(px) : ', 'ctshowcase'); ?></td>
                            <td> 
                                <input name="hex_lg_team_member_job_title_font_size" 
                                       type="number" 
                                       value="<?php echo $hex_lg_team_member_job_title_font_size; ?>"/>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="ui-tab3">
                    <table class="hex-md-table"  cellpadding="3">
                        <tr class="hex-md-team-member-name-font-size">
                            <td> <?php _e('Team Member name font size(px) : ', 'ctshowcase'); ?></td>
                            <td> <input name="hex_md_team_member_name_font_size" type="number" value="<?php echo $hex_md_team_member_name_font_size; ?>"/> </td>
                        </tr> 
                        <tr class="hex-xl-team-member-job-title-font-size">
                            <td> <?php _e('Team Member job title font size(px) : ', 'ctshowcase'); ?></td>
                            <td> <input name="hex_md_team_member_job_title_font_size" type="number" value="<?php echo $hex_md_team_member_job_title_font_size; ?>"/> </td>
                        </tr>
                    </table>
                </div>
                <div class="ui-tab4">
                    <table class="hex-sm-table"  cellpadding="3">
                        <tr class="hex-sm-team-member-name-font-size">
                            <td> <?php _e('Team Member name font size(px) : ', 'ctshowcase'); ?></td>
                            <td> <input name="hex_sm_team_member_name_font_size" type="number" value="<?php echo $hex_sm_team_member_name_font_size; ?>"/> </td>
                        </tr> 
                        <tr class="hex-sm-team-member-job-title-font-size">
                            <td> <?php _e('Team Member job title font size(px) : ', 'ctshowcase'); ?></td>
                            <td> <input name="hex_sm_team_member_job_title_font_size" type="number" value="<?php echo $hex_sm_team_member_job_title_font_size; ?>"/> </td>
                        </tr> 
                    </table>
                </div>
                <div class="ui-tab5">
                    <table class="hex-xs-table"  cellpadding="3">
                        <tr class="hex-xs-team-member-name-font-size">
                            <td> <?php _e('Team Member name font size(px) : ', 'ctshowcase'); ?></td>
                            <td> <input name="hex_xs_team_member_name_font_size" type="number" value="<?php echo $hex_xs_team_member_name_font_size; ?>"/> </td>
                        </tr> 
                        <tr class="hex-xs-team-member-job-title-font-size">
                            <td> <?php _e('Team Member job title font size(px) : ', 'ctshowcase'); ?></td>
                            <td> <input name="hex_xs_team_member_job_title_font_size" type="number" value="<?php echo $hex_xs_team_member_job_title_font_size; ?>"/> </td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
