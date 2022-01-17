<?php

/**
 * The file that defines the core plugin class.
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @since      1.0.0
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 *
 * @author     Infinue
 */
class Creative_Team_ShowCase
{
    /**
     * The loader that's responsible for maintaining and registering all hooks that power
     * the plugin.
     *
     * @since    1.0.0
     *
     * @var Creative_Team_ShowCase_Loader maintains and registers all hooks for the plugin
     */
    protected $loader;

    /**
     * The unique identifier of this plugin.
     *
     * @since    1.0.0
     *
     * @var string the string used to uniquely identify this plugin
     */
    protected $plugin_name;

    /**
     * The current version of the plugin.
     *
     * @since    1.0.0
     *
     * @var string the current version of the plugin
     */
    protected $version;

    /**
     * Define the core functionality of the plugin.
     *
     * Set the plugin name and the plugin version that can be used throughout the plugin.
     * Load the dependencies, define the locale, and set the hooks for the admin area and
     * the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function __construct()
    {
        if (defined('CTSHOWCASE_VERSION')) {
            $this->version = CTSHOWCASE_VERSION;
        } else {
            $this->version = '1.0.0';
        }
        $this->plugin_name = 'ctshowcase';

        $this->load_dependencies();
        $this->set_locale();
        $this->define_admin_hooks();
        $this->define_public_hooks();
    }

    /**
     * Load the required dependencies for this plugin.
     *
     * Include the following files that make up the plugin:
     *
     * - Creative_Team_ShowCase_Loader. Orchestrates the hooks of the plugin.
     * - Creative_Team_ShowCase_i18n. Defines internationalization functionality.
     * - Creative_Team_ShowCase_Admin. Defines all hooks for the admin area.
     * - Creative_Team_ShowCase_Public. Defines all hooks for the public side of the site.
     *
     * Create an instance of the loader which will be used to register the hooks
     * with WordPress.
     *
     * @since    1.0.0
     */
    private function load_dependencies()
    {
        /**
         * The class responsible for orchestrating the actions and filters of the
         * core plugin.
         */
        require_once plugin_dir_path(dirname(__FILE__)).'includes/class-creative-team-showcase-loader.php';

        /**
         * The class responsible for defining internationalization functionality
         * of the plugin.
         */
        require_once plugin_dir_path(dirname(__FILE__)).'includes/class-creative-team-showcase-i18n.php';

        /**
         * The class responsible for defining all actions that occur in the admin area.
         */
        require_once plugin_dir_path(dirname(__FILE__)).'admin/class-creative-team-showcase-admin.php';

        /**
         * The class responsible for defining all actions that occur in the public-facing
         * side of the site.
         */
        require_once plugin_dir_path(dirname(__FILE__)).'public/class-creative-team-showcase-public.php';

        $this->loader = new Creative_Team_ShowCase_Loader();
    }

    /**
     * Define the locale for this plugin for internationalization.
     *
     * Uses the Creative_Team_ShowCase_i18n class in order to set the domain and to register the hook
     * with WordPress.
     *
     * @since    1.0.0
     */
    private function set_locale()
    {
        $plugin_i18n = new Creative_Team_ShowCase_i18n();

        $this->loader->add_action('plugins_loaded', $plugin_i18n, 'load_plugin_textdomain');
    }

    /**
     * Register all of the hooks related to the admin area functionality
     * of the plugin.
     *
     * @since    1.0.0
     */
    private function define_admin_hooks()
    {
        $plugin_admin = new Creative_Team_ShowCase_Admin($this->get_plugin_name(), $this->get_version());

        // Actions
        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');
        $this->loader->add_action('init', $plugin_admin, 'register_team_post_type');
        $this->loader->add_action('init', $plugin_admin, 'register_shortcode_post_type');
        $this->loader->add_action('init', $plugin_admin, 'register_custom_taxonomies');
        $this->loader->add_action('admin_head-post.php', $plugin_admin, 'hide_publishing_actions');
        $this->loader->add_action('admin_head-post-new.php', $plugin_admin, 'hide_publishing_actions');
        $this->loader->add_action('admin_menu', $plugin_admin, 'add_custom_meta_boxes_for_cts_team_member');
        $this->loader->add_action('admin_menu', $plugin_admin, 'add_team_order_page');
        $this->loader->add_action('save_post', $plugin_admin, 'save_post_meta_for_cts_team_member');
        $this->loader->add_action('admin_menu', $plugin_admin, 'add_custom_meta_boxes_for_cts_shortcode');
        $this->loader->add_action('save_post', $plugin_admin, 'save_post_meta_for_cts_shortcode');
        $this->loader->add_action('wp_ajax_save_team_sorting', $plugin_admin, 'save_team_sorting');
        $this->loader->add_action('vc_before_init', $plugin_admin, 'add_ctshowcase_vc_element');
        $this->loader->add_action('ctshowcase_group_add_form_fields', $plugin_admin, 'add_custom_taxonomy_fields');
        $this->loader->add_action('ctshowcase_group_edit_form_fields', $plugin_admin, 'edit_custom_taxonomy_fields', 10);
        $this->loader->add_action('created_term', $plugin_admin, 'save_custom_taxonomy_fields', 10, 3);
        $this->loader->add_action('edit_term', $plugin_admin, 'save_custom_taxonomy_fields', 10, 3);
        $this->loader->add_action('manage_posts_custom_column', $plugin_admin, 'add_shortcode_column_content_to_shortcode_table', 10, 2);
        // Filters
        $this->loader->add_filter('post_row_actions', $plugin_admin, 'remove_quick_edit', 10, 2);
        $this->loader->add_filter('manage_ctshowcase_shortcode_posts_columns', $plugin_admin, 'add_shortcode_column_head_to_shortcode_table');
        $this->loader->add_action('admin_init', $plugin_admin, 'add_admin_cap_for_ordering', 9999);
    }

    /**
     * Register all of the hooks related to the public-facing functionality
     * of the plugin.
     *
     * @since    1.0.0
     */
    private function define_public_hooks()
    {
        $plugin_public = new Creative_Team_ShowCase_Public($this->get_plugin_name(), $this->get_version());

        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts', 99999999);
        $this->loader->add_action('init', $plugin_public, 'register_shortcode');
    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     *
     * @since    1.0.0
     */
    public function run()
    {
        $this->loader->run();
    }

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     *
     * @since     1.0.0
     *
     * @return string the name of the plugin
     */
    public function get_plugin_name()
    {
        return $this->plugin_name;
    }

    /**
     * The reference to the class that orchestrates the hooks with the plugin.
     *
     * @since     1.0.0
     *
     * @return Creative_Team_ShowCase_Loader orchestrates the hooks of the plugin
     */
    public function get_loader()
    {
        return $this->loader;
    }

    /**
     * Retrieve the version number of the plugin.
     *
     * @since     1.0.0
     *
     * @return string the version number of the plugin
     */
    public function get_version()
    {
        return $this->version;
    }
}
