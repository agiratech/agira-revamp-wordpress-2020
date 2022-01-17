<?php

// Before VC Init


/*
  Element Description: Ctshowcase_vc_element
 */

// Element Class 
class Ctshowcase_vc_element extends WPBakeryShortCode {

    // Element Init
    function __construct() {
        add_action('init', array($this, 'vc_custom_mapping'));
        add_shortcode('vc_ctshowcase_shortcode', array($this, 'vc_render_shortcode'));
    }

    // Element Mapping
    public function vc_custom_mapping() {

        // Stop all if VC is not enabled
        if (!defined('WPB_VC_VERSION')) {
            return;
        }
        $shortcode_values_arr = array();
        $ctshowcase_shortcodes = new WP_Query(array(
            'post_type' => 'ctshowcase_shortcode',
            'posts_per_page' => -1,
            'post_status' => 'publish'
        ));
        if ($ctshowcase_shortcodes->have_posts()):
            while ($ctshowcase_shortcodes->have_posts()):
                $ctshowcase_shortcodes->the_post();
                $shortcode_id = get_the_ID();
                $shortcode_title = get_the_title();
                $shortcode_values_arr[$shortcode_title] = $shortcode_id;
            endwhile;
            wp_reset_query();
        endif;
        vc_map(
                array(
                    'name' => __('Creative Team Showcase shortcode', 'ctshowcase'),
                    'base' => 'vc_ctshowcase_shortcode',
                    'description' => __('Select your own shortcode', 'ctshowcase'),
                    'category' => __('Creative Team Showcase', 'ctshowcase'),
                    'icon' => get_template_directory_uri() . '/assets/img/vc-icon.png',
                    'params' => array(
                        array(
                            'type' => 'dropdown',
                            'holder' => 'div',
                            'class' => 'field-class',
                            'heading' => __('Select Shortcode', 'text-domain'),
                            'param_name' => 'param',
                            'value' => $shortcode_values_arr,
                            'admin_label' => true,
                            "std" => reset($shortcode_values_arr),
                        ),
                    ),
                )
        );
    }

    // Element HTML
    public function vc_render_shortcode($atts) {
        extract(
                shortcode_atts(
                        array(
            'param' => '',
                        ), $atts
                )
        );

        ob_start();
        if (!empty($param)):

            echo do_shortcode("[ctshowcase id='$param' ]");
            if (vc_mode() === 'page_editable'):
                $obj = new Creative_Team_ShowCase_Admin('ctshowcase', '1.0.0');
                $shortcode_data = $obj->get_the_correct_value_for_shortcode_data($param);
                ?>
                <script>
                    jQuery('.ctshowcase-layout .ctshowcase-loader-wrapper').hide().fadeOut();
                    jQuery('.ctshowcase-layout-main-content').addClass('visible');
                    jQuery('.ctshowcase-team-member-profile-image.square-object-fit').each(function () {
                        jQuery(this).ctshowcaseSquareObjectFit()
                    });
                </script>
                <?php

                switch ($shortcode_data['shortcode_layout']):
                    case 'wave':
                        ?>
                        <script>
                            setTimeout(function () {
                                jQuery('.ctshowcase-wave-layout:not(.rendered)').each(function () {
                                    jQuery(this).ctshowcaseWaveRender();

                                })

                            }, 200)
                        </script>
                        <?php

                        break;
                    case 'hex-grid':

                        break;
                    case 'inline-preview' : ?>
                        <script>
                            ctshowcaseIpAdjustHeights();
                            jQuery('.ctshowcase-member-details-wrapper .ctshowcase-member-details').mCustomScrollbar({
                                theme: 'light',
                                mouseWheelPixels: 200,
                                mouseWheel: {
                                    enable: true
                                },
                                axis: 'y',
                            });
                        </script>
                        <?php
                        
                        break;
                    case 'mosaic' :
                        break;
                    case 'normal-grid':

                        break;
                endswitch;

            endif;
        endif;
        return ob_get_clean();
    }

}

// End Element Class
// Element Class Init
new Ctshowcase_vc_element();
