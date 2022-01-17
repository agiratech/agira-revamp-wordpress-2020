<?php
$counter = 0;
if ($team_query->have_posts()):
    while ($team_query->have_posts()) : $team_query->the_post();
        $team_member_id = get_the_ID();
        $team_image_id = get_post_thumbnail_id();
        if ($team_image_id) {
            $team_member_image = wp_get_attachment_image_src($team_image_id, 'ctshowcase_custom_image');
            if (!empty($team_member_image[0])):
                $team_member_image = $team_member_image[0];
            else:
                $team_member_image = plugin_dir_url(__FILE__) . 'default-avatar.png';
            endif;
        }
        else {
            $team_member_image = plugin_dir_url(__FILE__) . 'default-avatar.png';
        }
        $team_member_name = get_the_title();
        $team_member_job_title = get_post_meta($team_member_id, 'ctshowcase_job_title', true);
        $team_member_skills = get_post_meta($team_member_id, 'ctshowcase_skills', true);
        $team_member_email = get_post_meta($team_member_id, 'ctshowcase_email', true);
        $team_member_phone = get_post_meta($team_member_id, 'ctshowcase_phone', true);
        $team_member_location = get_post_meta($team_member_id, 'ctshowcase_location', true);
        $team_member_personal_site = get_post_meta($team_member_id, 'ctshowcase_personal_site', true);
        $social_links = (new Creative_Team_ShowCase_Admin($this->plugin_name, $this->version))->social_links;
        ?>
        <div class="<?php echo $counter == 0 ? 'active' : ''; ?> ctshowcase-member-details"><?php
            $render_social_media = false;
            foreach ($social_links as $social_icon => $social_link) {
                $link = get_post_meta($team_member_id, 'ctshowcase_social_' . $social_link . '_link', true);
                if (!empty($link)) {
                    $render_social_media = true;
                    break;
                }
            }
            ?>
            <div class="ctshowcase-member-details-main-content">
                <div class="ctshowcase-team-member-main-info">
                    <img class="ctshowcase-team-member-profile-image square-object-fit" src="<?php echo $team_member_image; ?>" />
                    <?php if ($render_social_media): ?>
                        <div class="ctshowcase-social-media" style="background: <?php echo $inlinePreview_social_media_bar_bg_color; ?>">
                            <ul class="ctshowcase-social-media-list">
                                <?php
                                foreach ($social_links as $social_icon => $social_link):
                                    $link = get_post_meta($team_member_id, 'ctshowcase_social_' . $social_link . '_link', true);
                                    if (!empty($link)):
                                        ?>
                                        <li class="ctshowcase-<?php echo $social_link; ?>-profile-list-item">
                                            <a  style="color: <?php echo $inlinePreview_social_media_font_color; ?>;text-decoration: none;"class="ctshowcase-<?php echo $social_link; ?>-profile-link" href="<?php echo substr(trim($link), 0, 4) != 'http' ? '//' : ''; ?><?php echo $link ?>" target="_blank"> 
                                                <i class="fa <?php echo $social_icon; ?>" aria-hidden="true"></i>
                                            </a>  
                                        </li>
                                        <?php
                                    endif;
                                endforeach;
                                ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <h2 class="ctshowcase-team-member-name" style="color: <?php echo $inlinePreview_team_member_name_color; ?>  ;font-size: <?php echo $inlinePreview_team_member_name_font_size; ?>px"> <?php echo $team_member_name; ?> </h2>
                    <?php if (!empty($team_member_job_title)): ?>
                        <p class="ctshowcase-team-member-job-title" style="color: <?php echo $inlinePreview_team_member_job_title_font_color; ?> ;font-size: <?php echo $inlinePreview_team_member_job_title_font_size; ?>px"> <?php echo $team_member_job_title; ?> </p>
                    <?php endif; ?>
                </div>
                <div class='ctshowcase-team-member-bio'>
                    <div style="color: <?php echo $inlinePreview_main_text_color; ?>;font-size: <?php echo $inlinePreview_main_font_size; ?>px" class='ctshowcase-team-member-bio-content'>
                        <?php echo get_the_content(); ?>
                    </div>
                </div>
                <?php
                $render_skills = false;
                if (!empty($team_member_skills)) {
                    foreach ($team_member_skills as $skill) {
                        if (!empty($skill['skill_name'])) {
                            $render_skills = true;
                            break;
                        }
                    }
                }
                if ($render_skills):
                    ?>
                    <div class="ctshowcase-inlinePreview-separator"
                         style="min-height: 1px;border-top: 1px solid <?php echo $inlinePreview_separator_color; ?>">
                    </div>
                    <div class='ctshowcase-team-member-skills clearfix'>
                        <h3 class='ctshowcase-skills-heading' 
                            style="color: <?php echo $inlinePreview_other_headings_font_color; ?>;font-size: <?php echo $inlinePreview_other_headings_font_size; ?>px;"> <?php echo $inlinePreview_skills_title; ?></h3>
                        <div class="ctshowcase-skills-list">
                            <?php
                            foreach ($team_member_skills as $skill):
                                if (!empty($skill['skill_name'])) :
                                    if (empty($skill['skill_bar_color'])):
                                        $skill['skill_bar_color'] = '#ff5755';
                                    endif;
                                    ?>
                                    <div class="ctshowcase-skill">
                                        <div class="ctshowcase-row">
                                            <div class="ctshowcase-col-9">
                                                <div class="ctshowcase-skill-title" style="color: <?php echo $inlinePreview_main_text_color; ?>;font-size: <?php echo $inlinePreview_main_font_size; ?>px">
                    <?php echo $skill['skill_name']; ?>
                                                </div>
                                            </div>
                                            <div class="ctshowcase-col-3 ctshowcase-skill-pct">
                                                <span style="color: <?php echo $skill['skill_bar_color']; ?>;" > <?php echo $skill['skill_level']; ?>% </span>                                                     
                                            </div>
                                        </div>

                                        <!-- bar -->
                                        <div class="ctshowcase-skill-bar" style="background:<?php echo $inlinePreview_skill_bar_bg; ?> " data-bar="<?php echo $skill['skill_level']; ?>">
                                            <span class='ctshowcase-skill-bar-color' style="background: <?php echo $skill['skill_bar_color']; ?>"></span></div>
                                    </div> 
                    <?php
                endif;
            endforeach;
            ?>
                        </div>
                    </div>
            <?php
        endif;
        if (!empty($team_member_email)):
            ?> <div class="ctshowcase-inlinePreview-separator"
                         style="min-height: 1px;border-top: 1px solid <?php echo $inlinePreview_separator_color; ?>">
                </div>                                
                <div class="ctshowcase-email">
                    <h3 
                        style="color: <?php echo $inlinePreview_other_headings_font_color; ?>;font-size: <?php echo $inlinePreview_other_headings_font_size; ?>px;"
                        class="ctshowcase-email-heading"><?php echo $inlinePreview_email_title; ?></h3>
                    <a href="mailto:<?php echo $team_member_email; ?>" style="color: <?php echo $inlinePreview_main_text_color; ?>;font-size: <?php echo $inlinePreview_main_font_size; ?>px" class="ctshowcase-team-member-email"> <?php echo $team_member_email; ?> </a>
                </div>
            <?php
        endif;
        if (!empty($team_member_phone)):
            ?> <div class="ctshowcase-inlinePreview-separator"
                    style="min-height: 1px;border-top: 1px solid <?php echo $inlinePreview_separator_color; ?>">
                </div> 
                <div class="ctshowcase-phone">
                    <h3 style="color: <?php echo $inlinePreview_other_headings_font_color; ?>;font-size: <?php echo $inlinePreview_other_headings_font_size; ?>px;"
                        class="ctshowcase-phone-heading"><?php echo $inlinePreview_phone_title ?></h3>
                    <div   style="color: <?php echo $inlinePreview_main_text_color; ?>;font-size: <?php echo $inlinePreview_main_font_size; ?>px" class="ctshowcase-team-member-phone"> <?php echo $team_member_phone; ?> </div>
                </div>

            <?php
        endif;
        if (!empty($team_member_location)):
            ?><div class="ctshowcase-inlinePreview-separator"
                    style="min-height: 1px;border-top: 1px solid <?php echo $inlinePreview_separator_color; ?>">
            </div>
            <div class="ctshowcase-location">
                <h3 style="color: <?php echo $inlinePreview_other_headings_font_color; ?>;font-size: <?php echo $inlinePreview_other_headings_font_size; ?>px;"
                    class="ctshowcase-location-heading"><?php echo $inlinePreview_location_title ?></h3>
                <div   style="color: <?php echo $inlinePreview_main_text_color; ?>;font-size: <?php echo $inlinePreview_main_font_size; ?>px" class="ctshowcase-team-member-location"> <?php echo $team_member_location; ?> </div>
            </div>
            <?php
        endif;
        if (!empty($team_member_personal_site)):
            ?><div class="ctshowcase-inlinePreview-separator"
                    style="min-height: 1px;border-top: 1px solid <?php echo $inlinePreview_separator_color; ?>">
            </div>
            <div class="ctshowcase-personal_site">
                <h3 style="color: <?php echo $inlinePreview_other_headings_font_color; ?>;font-size: <?php echo $inlinePreview_other_headings_font_size; ?>px;"
                    class="ctshowcase-personal_site-heading"><?php echo $inlinePreview_personal_site_title ?></h3>
                <a style="color: <?php echo $inlinePreview_main_text_color; ?>;font-size: <?php echo $inlinePreview_main_font_size; ?>px" target="_blank" href='<?php echo substr(trim($team_member_personal_site), 0, 4) != 'http' ? '//' : ''; ?><?php echo $team_member_personal_site; ?>' class="ctshowcase-team-member-personal_site"><?php echo $team_member_personal_site; ?></a>
            </div>
            <?php
        endif;
        do_action('ctshowcase_inlinePreview_add_extra_fields', $team_member_id);
        ?>
            </div>
        </div>
        <?php
        $counter ++;
    endwhile;
    wp_reset_query();
    endif;
    