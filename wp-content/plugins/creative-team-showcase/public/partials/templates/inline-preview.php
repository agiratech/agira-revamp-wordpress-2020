<?php
wp_enqueue_style($this->plugin_name . '-inline-preview');
wp_enqueue_script($this->plugin_name . '_inline-preview');
wp_enqueue_script('ctshowcase_tiny-color');
$counter = 0;
?>
<div class="ctshowcase-inline-preview-layout ctshowcase-layout <?php echo is_rtl()  ? 'is-rtl ' : '';?> ctshowcase-<?php echo $inlinePreview_type; ?>-style">
    <div class="ctshowcase-layout-main-content">
        <div class="ctshowcase-row">    
            <div class="ctshowcase-col-8 ctshowcase-col ctshowcase-team-members-list-col" style="background: <?php echo $inlinePreview_list_col_bg; ?>">
                <div class='ctshowcase-team-members-list-wrapper'>
                    <?php if ($inlinePreview_display_heading == 'yes'): ?>
                        <h2 class="ctshowcase-heading" style="color: <?php echo $inlinePreview_heading_color; ?>;font-size: <?php echo $inlinePreview_heading_font_size;?>px;"><?php echo $inlinePreview_heading; ?></h2>
                    <?php endif; ?>
                    <div  class="ctshowcase-row  <?php echo $inlinePreview_type == 'hex' ? 'ctshowcase-hexGrid ctshowcase-hexGrid-' . $inlinePreview_no_of_cols : ''; ?>">
                        <?php
                        while ($team_query->have_posts()) : $team_query->the_post();
                            $team_member_id = get_the_ID();
                            $team_image_id = get_post_thumbnail_id();
                            $team_member_name = get_the_title();
                            if ($team_image_id) {
                                $team_member_image = wp_get_attachment_image_src($team_image_id, 'ctshowcase_custom_image');
                                if (!empty($team_member_image[0])):
                                    $team_member_image = $team_member_image[0];
                                else:
                                    $team_member_image = plugin_dir_url(__FILE__) . 'default-avatar.png' ;
                                endif;
                            }
                            else {
                                $team_member_image = plugin_dir_url(__FILE__). 'default-avatar.png' ;
                            }
                            if ($inlinePreview_type == 'circle' || $inlinePreview_type == 'square'):
                                ?>
                                <div class="ctshowcase-team-member-col ctshowcase-col-<?php echo ( 12 / $inlinePreview_no_of_cols);?> <?php echo ($counter == 0) ? 'active' : ''; ?> ">
                                    <div class="ctshowcase-team-member-profile-pic">
                                        <img class="ctshowcase-team-member-profile-image square-object-fit" style="<?php echo $inlinePreview_type == 'circle' ? 'border-radius:50%;' : ''; ?> width: 100%" src="<?php echo $team_member_image; ?>" >
                                    </div>
                                </div>
                            <?php
                            elseif ($inlinePreview_type == 'hex'):
                                wp_enqueue_style($this->plugin_name . '-hex');
                                ?>
                                <div class="ctshowcase-team-member-col <?php echo ($counter == 0) ? 'active' : ''; ?>  ctshowcase-hex ctshowcase-hex-<?php echo $inlinePreview_no_of_cols; ?>">
                                    <div class="ctshowcase-hexIn">
                                        <div class="ctshowcase-hexLink">
                                            <div class="ctshowcase-hex-profile-pic ctshowcase-team-member-profile-pic">
                                                <img class="ctshowcase-team-member-profile-image" src="<?php echo $team_member_image; ?>" alt="<?php echo $team_member_name; ?>" />
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <?php
                            endif;
                            $counter++;
                        endwhile;
                        wp_reset_query();
                        ?>
                    </div>
                </div>
            </div>
            <div class="ctshowcase-col-4 ctshowcase-col ctshowcase-all-team-members-details-col" style="background: <?php echo $inlinePreview_member_details_col_bg; ?>">
                <div class="ctshowcase-inlinePreview-nav clearfix">
                    <span class="ctshowcase-inlinePreview-sliding-nav">
                        <a href="#" class="ctshowcase-nav-left ctshowcase-nav-item" style='color:<?php echo $inlinePreview_header_icons_color; ?>;-webkit-text-stroke: 1.6px <?php echo $inlinePreview_member_details_col_bg; ?>;text-decoration: none;'><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                        <a href="#" class="ctshowcase-nav-right ctshowcase-nav-item" style='color:<?php echo $inlinePreview_header_icons_color; ?>;-webkit-text-stroke: 1.6px <?php echo $inlinePreview_member_details_col_bg; ?>;text-decoration:none;' ><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    </span>
                    <a href="#" class="ctshowcase-inlinePreview-nav-up" 
                       style='color:<?php echo $inlinePreview_header_icons_color; ?>;-webkit-text-stroke: 1.66px <?php echo $inlinePreview_member_details_col_bg; ?>;' >
                        <i class="fa fa-angle-double-up"></i>
                    </a>
                </div>
                <div class="ctshowcase-member-details-wrapper <?php echo $inlinePreview_type=='slider' ? 'owl-carousel owl-theme' : ''; ?>">
<?php require('inline-preview-member-details.php'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="ctshowcase-loader-wrapper">
        <div class="ctshowcase-loader">
            <div class="ctshowcase-loader-section section-left"></div>
            <div class="ctshowcase-loader-section section-right"></div>

        </div>
    </div>
</div>

