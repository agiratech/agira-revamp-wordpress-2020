<?php

/**
 * Plugin Name: WP Basic Job Portal
 * Description: This plugin to create Job portal from database using WP_List_Table class.
 * Version:    1.1.0 
 * Author:     agira
 * Author URI:  https://agiratech.com
 * Text Domain: wpbjp
 * Domain Path: /languages
 */

defined('ABSPATH') or die('No direct access');

require plugin_dir_path(__FILE__) . 'classes/Job_Post_List_Table_Class.php';
require plugin_dir_path(__FILE__) . 'classes/Applicant_List_Table_Class.php';
require plugin_dir_path(__FILE__) . 'includes/metabox-p1.php';
require plugin_dir_path(__FILE__) . 'includes/metabox-p2.php';

function wpbjp_custom_admin_styles()
{
    wp_enqueue_script(
        'jquery-moment',
        plugin_dir_url(__FILE__) . 'admin/js-plugins/moment/js/moment.min.js',
        array('jquery'),
        '2.18.1',
        true
    );
    wp_enqueue_script(
        'jquery-daterangepicker',
        plugin_dir_url(__FILE__) . 'admin/js-plugins/daterange/js/daterangepicker.min.js',
        array('jquery'),
        '3.14.1',
        true
    );
    wp_enqueue_script('custom-admins-scripts', plugins_url('/admin/js/wpbjp-admin-scripts.js', __FILE__));
    wp_enqueue_style('custom-styles', plugins_url('/css/styles.css', __FILE__));
    wp_enqueue_style(
        'daterangepicker-styles',
        plugin_dir_url(__FILE__) . 'admin/js-plugins/daterange/css/daterangepicker.css'
    );
}

add_action('admin_enqueue_scripts', 'wpbjp_custom_admin_styles');

function wpbjp_custom_public_scripts()
{
    wp_enqueue_script(
        'jquery-bootstrap',
        plugin_dir_url(__FILE__) . 'public/js-plugins/bootstrap.min.js',
        array('jquery'),
        '3.3.6',
        true
    );
    /*wp_enqueue_script(
        'jquery-bootstrapvalidator',
        plugin_dir_url(__FILE__) . 'public/js-plugins/bootstrap-validator.min.js',
        array('jquery'),
        '0.5.2',
        true
    );*/
    wp_enqueue_script(
        'jquery-bootstrap3validator',
        plugin_dir_url(__FILE__) . 'public/js-plugins/validator.min.js',
        array('jquery'),
        '0.11.9',
        true
    );
    wp_enqueue_style('jquery-bootstrapvalidator', plugins_url('public/css/bootstrap-validator.min.css', __FILE__));
    wp_enqueue_style('wpbjp-custom-css', plugins_url('public/css/styles.css', __FILE__));   
    wp_enqueue_script('wpbjp-custom-js', plugins_url('public/js/custom.js', __FILE__ ));
    wp_localize_script('wpbjp-custom-js', 'ag_ajax', array('ajaxurl' => admin_url('admin-ajax.php')));
    wp_enqueue_script("wpbjp-custom-js");
}

add_action('wp_enqueue_scripts', 'wpbjp_custom_public_scripts');

function wpbjp_plugin_load_textdomain()
{
    load_plugin_textdomain('wpbjp', false, basename(dirname(__FILE__)) . '/languages');
}
add_action('plugins_loaded', 'wpbjp_plugin_load_textdomain');


global $wpbjp_db_version;
$wpbjp_db_version = '1.1.1';

function wpbjp_install()
{
    global $wpdb;
    global $wpbjp_db_version;

    $table_name1 = $wpdb->prefix . 'wpbjp_job_post';
    $table_name2 = $wpdb->prefix . 'wpbjp_candidate';
    $table_name3 = $wpdb->prefix . 'wpbjp_applicant';

    $sql1 = "CREATE TABLE " . $table_name1 . " (
        id INT(11) NOT NULL AUTO_INCREMENT,
        job_unique_id VARCHAR (50) NOT NULL,
        job_title VARCHAR (100) NOT NULL,
        job_for VARCHAR(100) NOT NULL,
        job_location VARCHAR(100) NOT NULL,
        job_openings int(11) NOT NULL,
        job_experience VARCHAR(25) NOT NULL,  
        job_joining VARCHAR(50) NOT NULL,   
        job_description LONGTEXT NOT NULL,  
        job_status ENUM ('active','inactive') NOT NULL DEFAULT 'active',
        created_by INT(11) NOT NULL,
        created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY  (id)
    );";

    $sql2 = "CREATE TABLE " . $table_name2 . " (
        id INT(11) NOT NULL AUTO_INCREMENT,
        cand_unique_id VARCHAR (50) NOT NULL,
        cand_name VARCHAR (100) NOT NULL,
        cand_email VARCHAR(100) NOT NULL,
        cand_mobile VARCHAR(15) NOT NULL,      
        cand_experience VARCHAR (50) NOT NULL, 
        cand_education VARCHAR (50) NOT NULL, 
        cand_current_company VARCHAR (100) NOT NULL, 
        cand_current_location VARCHAR (50) DEFAULT NULL, 
        cand_current_ctc VARCHAR (50) DEFAULT NULL,        
        cand_notice_period VARCHAR (100) DEFAULT NULL,
        cand_from TINYINT NOT NULL,  
        cand_from_other VARCHAR (50) DEFAULT NULL,     
        created_at TIMESTAMP NULL DEFAULT 0,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY  (id)
      );";

    $sql3 = "CREATE TABLE " . $table_name3 . " (
        id INT(11) NOT NULL AUTO_INCREMENT,
        app_cand_id INT(11) NOT NULL,
        app_job_id INT(11) NOT NULL,
        app_other_job VARCHAR(100) DEFAULT NULL,       
        app_additional TEXT DEFAULT NULL,
        app_status ENUM ('new','contacted','scheduled','interviewed','selected','rejected') NOT NULL DEFAULT 'new',
        app_resume VARCHAR(100) NOT NULL,  
        app_resume_path TEXT NOT NULL,
        app_applied_on DATETIME NULL,
        PRIMARY KEY  (id),
        KEY `app_job_id` (`app_job_id`),
        CONSTRAINT `job_post_ibfk_1` FOREIGN KEY (`app_job_id`) REFERENCES `$table_name1` (`id`),
        KEY `app_cand_id` (`app_cand_id`),
        CONSTRAINT `candidate_ibfk_1` FOREIGN KEY (`app_cand_id`) REFERENCES `$table_name2` (`id`)        
    );";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql1);
    dbDelta($sql2);
    dbDelta($sql3);

    add_option('wpbjp_db_version', $wpbjp_db_version);

    $installed_ver = get_option('wpbjp_db_version');
    if ($installed_ver != $wpbjp_db_version) {
        $sql1 = "CREATE TABLE " . $table_name1 . " (
            id INT(11) NOT NULL AUTO_INCREMENT,
            job_unique_id VARCHAR (50) NOT NULL,
            job_title VARCHAR (100) NOT NULL,
            job_for VARCHAR(100) NOT NULL,
            job_location VARCHAR(100) NOT NULL,
            job_openings int(11) NOT NULL,
            job_experience VARCHAR(25) NOT NULL,  
            job_joining VARCHAR(50) NOT NULL,   
            job_description LONGTEXT NOT NULL,  
            job_status ENUM ('active','inactive') NOT NULL DEFAULT 'active',
            created_by INT(11) NOT NULL,
            created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY  (id)
        );";

        $sql2 = "CREATE TABLE " . $table_name2 . " (
            id INT(11) NOT NULL AUTO_INCREMENT,
            cand_unique_id VARCHAR (50) NOT NULL,
            cand_name VARCHAR (100) NOT NULL,
            cand_email VARCHAR(100) NOT NULL,
            cand_mobile VARCHAR(15) NOT NULL,      
            cand_experience VARCHAR (50) NOT NULL, 
            cand_relavent_exp VARCHAR (50) NOT NULL,
            cand_education VARCHAR (50) DEFAULT NULL, 
            cand_current_company VARCHAR (100) NOT NULL, 
            cand_willing_relocate ENUM('true','false') DEFAULT 'true',
            cand_current_location VARCHAR (50) DEFAULT NULL, 
            cand_current_ctc VARCHAR (50) DEFAULT NULL,
            cand_expected_ctc VARCHAR (50) DEFAULT NULL,          
            cand_notice_period VARCHAR (100) DEFAULT NULL,
            cand_from TINYINT NOT NULL,  
            cand_from_other VARCHAR (50) DEFAULT NULL,     
            created_at TIMESTAMP NULL DEFAULT 0,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY  (id)
          );";

        $sql3 = "CREATE TABLE " . $table_name3 . " (
            id INT(11) NOT NULL AUTO_INCREMENT,
            app_cand_id INT(11) NOT NULL,
            app_job_id INT(11) NOT NULL,
            app_other_job VARCHAR(100) DEFAULT NULL,       
            app_additional TEXT DEFAULT NULL,
            app_status ENUM ('new','contacted','scheduled','interviewed','selected','rejected') NOT NULL DEFAULT 'new',
            app_resume VARCHAR(100) NOT NULL,  
            app_resume_path TEXT NOT NULL,
            app_applied_on DATETIME NULL,
            PRIMARY KEY  (id),
            KEY `app_job_id` (`app_job_id`),
            CONSTRAINT `job_post_ibfk_1` FOREIGN KEY (`app_job_id`) REFERENCES `$table_name1` (`id`),
            KEY `app_cand_id` (`app_cand_id`),
            CONSTRAINT `candidate_ibfk_1` FOREIGN KEY (`app_cand_id`) REFERENCES `$table_name2` (`id`)        
        );";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql1);
        dbDelta($sql2);
        dbDelta($sql3);

        update_option('wpbjp_db_version', $wpbjp_db_version);
    }
}

register_activation_hook(__FILE__, 'wpbjp_install');


function wpbjp_install_data()
{
    global $wpdb;

    $table_name = $wpdb->prefix . 'job_post';
}

register_activation_hook(__FILE__, 'wpbjp_install_data');


function wpbjp_update_db_check()
{
    global $wpbjp_db_version;
    if (get_site_option('wpbjp_db_version') != $wpbjp_db_version) {
        wpbjp_install();
    }
}

// plugin deactivation
register_deactivation_hook(__FILE__, 'wpbjp_deactivate');
function wpbjp_deactivate()
{
    delete_option('wpbjp_hr_mail_ids');
    delete_option('wpbjp_hr_mail_subject');
    delete_option('wpbjp_hr_mail_template');
    delete_option('wpbjp_cand_mail_subject');
    delete_option('wpbjp_cand_mail_template');
}

// plugin uninstallation
register_uninstall_hook(__FILE__, 'wpbjp_uninstall');
function wpbjp_uninstall()
{
    global $wpdb;
    $table_name1 = $wpdb->prefix . 'wpbjp_job_post';
    $table_name2 = $wpdb->prefix . 'wpbjp_candidate';
    $table_name3 = $wpdb->prefix . 'wpbjp_applicant';
    $wpdb->query("DROP TABLE $table_name3");
    $wpdb->query("DROP TABLE $table_name2");
    $wpdb->query("DROP TABLE $table_name1");
}

add_action('plugins_loaded', 'wpbjp_update_db_check');

function wpbjp_admin_menu()
{

    // add_submenu_page( string $parent_slug, string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '', int $position = null )

    add_menu_page(__('Job Posts', 'wpbjp'), __('Job Posts', 'wpbjp'), 'activate_plugins', 'job_posts', 'wpbjp_job_posts_page_handler');

    add_submenu_page('job_posts', __('Settings', 'wpbjp'), __('Settings', 'wpbjp'), 'activate_plugins', 'job_posts_settings', 'wpbjp_job_posts_page_settings', 1);

    add_submenu_page('job_posts', __('Job Posts', 'wpbjp'), __('Job Posts', 'wpbjp'), 'activate_plugins', 'job_posts', 'wpbjp_job_posts_page_handler', 2);
    add_submenu_page('job_posts', __('Add new', 'wpbjp'), __('Add new', 'wpbjp'), 'activate_plugins', 'job_posts_form', 'wpbjp_job_posts_form_page_handler', 3);

    /*add_submenu_page('job_posts', __('Candidates', 'wpbjp'), __('Candidates', 'wpbjp'), 'activate_plugins', 'candidates', 'wpbjp_candidates_page_handler');   
    add_submenu_page('job_posts', __('Add new', 'wpbjp'), __('Add new', 'wpbjp'), 'activate_plugins', 'candidates_form', 'wpbjp_candidates_form_page_handler');*/

    add_submenu_page('job_posts', __('Applicants', 'wpbjp'), __('Applicants', 'wpbjp'), 'activate_plugins', 'applicants', 'wpbjp_applicants_page_handler', 4);
    add_submenu_page('job_posts', __('Add new', 'wpbjp'), __('Add new', 'wpbjp'), 'activate_plugins', 'applicants_form', 'wpbjp_applicants_form_page_handler', 5);
}
add_action('admin_menu', 'wpbjp_admin_menu');

function wpbjp_job_posts_page_settings()
{

    if (isset($_POST['submit']) && $_POST['submit'] == 'Save') {
        update_option('wpbjp_hr_mail_ids', wpbjp_ag_sanitize_text($_POST['wpbjp_hr_mail_ids']));
        update_option('wpbjp_hr_mail_subject', wpbjp_ag_sanitize_text($_POST['wpbjp_hr_mail_subject']));
        update_option('wpbjp_hr_mail_template', wpbjp_ag_sanitize_textarea($_POST['wpbjp_hr_mail_template']));
        update_option('wpbjp_cand_mail_subject', wpbjp_ag_sanitize_text($_POST['wpbjp_cand_mail_subject']));
        update_option('wpbjp_cand_mail_template', wpbjp_ag_sanitize_textarea($_POST['wpbjp_cand_mail_template']));
    }

?>
    <div class='wrap'>
        <h2>Short Codes</h2>
        <p>
            [agira_job_apply_form] - Candidate Apply Form <br>
            [agira_job_descriptions] - Jobs Descriptions
        </p>

        <h2>Email Template</h2>
        <h3>Token Replacements </h3>
        <p><strong><small>Use [ag:cand_name] for displaying candidate name. use [ag:job_title] for displaying job title. Use [ag:cand_resume] for displaying resume path</small></strong></p>

        <form method='post'>
            <p><strong>HR Email Ids</strong></p>
            <?php $hr_email_ids = get_option('wpbjp_hr_mail_ids'); ?>
            <input type="text" name="wpbjp_hr_mail_ids" value="<?php echo $hr_email_ids; ?>">
            <p><strong>HR Email Subject</strong></p>
            <?php $hr_mail_subject = get_option('wpbjp_hr_mail_subject'); ?>
            <input type="text" name="wpbjp_hr_mail_subject" value="<?php echo $hr_mail_subject; ?>">
            <p><strong>HR Email Template</strong></p>
            <?php
            $hr_mail_template = get_option('wpbjp_hr_mail_template');
            wp_editor($hr_mail_template, 'wpbjp_hr_mail_template', $settings = array('textarea_rows' => '10'));
            ?>
            <p><strong>Candidate Email Subject</strong></p>
            <?php $cand_mail_subject = get_option('wpbjp_cand_mail_subject'); ?>
            <input type="text" name="wpbjp_cand_mail_subject" value="<?php echo $cand_mail_subject; ?>">
            <p><strong>Candidate Email Template</strong></p>
            <?php
            $cand_mail_template = get_option('wpbjp_cand_mail_template');
            wp_editor($cand_mail_template, 'wpbjp_cand_mail_template', $settings = array('textarea_rows' => '10'));
            ?>

            <?php
            submit_button('Save', 'primary');
            ?>
        </form>
    </div><!-- .wrap -->
    <?php
}

function wpbjp_languages()
{
    load_plugin_textdomain('wpbjp', false, dirname(plugin_basename(__FILE__)));
}

add_action('init', 'wpbjp_languages');

function  wpbjp_getNextIncrement($table_name, $column_name)
{
    global $wpdb;
    $next_increment = 1;
    $item = $wpdb->get_row($wpdb->prepare("SELECT MAX(cast($column_name as unsigned)) as unique_id FROM $table_name"), OBJECT);
    if ($item) {
        $next_increment = ($item->unique_id + $next_increment);
    }
    return $next_increment;
}

function wpbjp_get_jobs_list()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'wpbjp_job_post';
    $results = $wpdb->get_results($wpdb->prepare("SELECT id, job_title FROM $table_name ORDER BY ID DESC"), ARRAY_A);
    $option_arr = array();
    foreach ($results as $job) {
        $option_arr[$job['id']] = $job['job_title'];
    }
    return $option_arr;
}


function wpbjp_get_posted_jobs_list()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'wpbjp_job_post';
    $results = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE job_status ='active' ORDER BY id DESC"), ARRAY_A);
    return $results;
}


function wpbjp_ag_get_candidate($email)
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'wpbjp_candidate';
    $candidate = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE cand_email = %s", $email));
    return $candidate;
}

function wpbjp_ag_get_candidate_id($email)
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'wpbjp_candidate';
    $candidate = $wpdb->get_row($wpdb->prepare("SELECT id FROM $table_name WHERE cand_email = %s", $email));
    return $candidate;
}

function wpbjp_ag_get_applied_jobs($email, $job_id)
{
    global $wpdb;
    $table_name1 = $wpdb->prefix . 'wpbjp_applicant';
    $table_name2 = $wpdb->prefix . 'wpbjp_job_post';

    $candidate = wpbjp_ag_get_candidate_id($email);
    $cand_id = $candidate->id;
    $applicant = $wpdb->get_row($wpdb->prepare("SELECT t1.id, t2.job_status, t1.app_applied_on FROM $table_name1 as t1  
    LEFT OUTER JOIN $table_name2 t2 ON t2.id = t1.app_job_id  WHERE t1.app_cand_id = %d AND t1.app_job_id = %d AND t2.job_status = %s", array($cand_id, $job_id, 'active')));
    return $applicant;
}

function wpbjp_ag_get_job_by_id($job_id)
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'wpbjp_job_post';
    $job = $wpdb->get_row($wpdb->prepare("SELECT id, job_title FROM $table_name WHERE id = %d ", array($job_id)));
    return $job;
}


// Form markup
function ag_html_candidate_form_code()
{   
    $jobs = wpbjp_get_jobs_list();   
    $app_job_id = $_REQUEST['apply'];
    $job_id = wpbjp_encrypt_decrypt($app_job_id, 'decrypt');
    $job_detail = wpbjp_ag_get_job_by_id($job_id);   
   
    if (!empty($job_detail) && count((array)$job_detail) > 0) {
     
    ?>

        <div class="form-container">
            <div id="successMsg" class="alert alert-success" role="alert">              
            </div>
            <div id="errorMsg" class="alert alert-danger" role="alert"></div>
            <div class="row">
                <form id="ag_candidate_form" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="at_candidate_apply_job">
                    <input id="wpbjp_user_tz" type="hidden" name="wpbjp_user_tz" value="">
                    <!--<input type="hidden" id="app_job_id" name="app_job_id" >-->
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label for="cand_name">Name</label> <span class="required">*</span>
                            <input type="type" class="form-control" id="cand_name" name="cand_name" placeholder=" Full name" autofocus required data-required-error ="Please enter your name">
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="cand_email">Email</label> <span class="required">*</span>
                            <input type="email" class="form-control" id="cand_email" name="cand_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Email" required data-required-error ="Please enter your email" data-pattern-error ="Please enter valid email">
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="cand_mobile">Mobile</label> <span class="required">*</span>
                            <input type="text" class="form-control" id="cand_mobile" name="cand_mobile" pattern ="^\d{10}$" placeholder="Mobile" required data-required-error ="Please enter your Mobile No." data-minlength="10" data-minlength-error="Mobile No. should be 10 digits." data-pattern-error ="Please enter valid Mobile No.">
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="cand_experience">Total Experience</label> <span class="required">*</span>
                            <input type="text" class="form-control" id="cand_experience" name="cand_experience" placeholder="Experience" required data-required-error ="Please enter your experience.">
                            <p class="help-block"> 2 years or 2 years 2 months or 2.5 years</p>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="cand_relavent_exp">Relavent Experience</label> <span class="required">*</span>
                            <input type="text" class="form-control" id="cand_relavent_exp" name="cand_relavent_exp" placeholder="Relavent Experience" required data-required-error ="Please enter your relavent experience.">
                            <p class="help-block"> 2 years or 2 years 2 months or 2.5 years</p>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="cand_education">Education</label>
                            <input type="text" class="form-control" id="cand_education" name="cand_education" placeholder="Education">
                            <p class="help-block"> Please enter your highest education </p>
                        </div>
                        <div class="form-group">
                            <label for="app_resume">Upload Your Resume</label><span class="required">*</span>
                            <input type="file" id="app_resume" class="form-control" name="app_resume" required data-required-error ="Please upload your resume.">
                            <p class="help-block">upload your resume File types:doc, docx, odt, pdf</p>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label for="cand_current_company">Current Company</label> <span class="required">*</span>
                            <input type="text" class="form-control" id="cand_current_company" name="cand_current_company" placeholder="Current Company" required data-required-error ="Please enter your current company">
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="cand_current_location">Current Location</label> <span class="required">*</span>
                            <input type="text" class="form-control" id="cand_current_location" name="cand_current_location" placeholder="Current Location" required data-required-error ="Please enter your current location.">
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="cand_willing_relocate">Willing to Relocate<span class="required">*</span></label><br>
                            <label class="radio-inline">
                                <input type="radio" id="cand_willing_relocate_1" name="cand_willing_relocate" checked value="true" required data-required-error ="Are you willing to relocate?.">Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="cand_willing_relocate_2" name="cand_willing_relocate" value="false" required data-required-error ="Are you willing to relocate?.">No
                            </label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="cand_current_ctc">Current CTC</label> <span class="required">*</span>
                            <input type="text" class="form-control" id="cand_current_ctc" name="cand_current_ctc" pattern ="^[0-9]+$" placeholder="Current CTC" required data-required-error ="Please enter your annual current CTC." data-minlength="6" data-minlength-error="Your annual current CTC should be greater than or equal to 6 digits." data-pattern-error ="Please enter a valid annual current CTC.">
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="cand_expected_ctc">Expected CTC</label> <span class="required">*</span>
                            <input type="text" class="form-control" id="cand_expected_ctc" name="cand_expected_ctc" pattern ="^[0-9]+$" placeholder="Expected CTC" required data-required-error ="Please enter your expected CTC." data-minlength="6" data-minlength-error="Your expected CTC should be greater than or equal to 6 digits." data-pattern-error ="Please enter a valid expected CTC.">
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="cand_notice_period">Notice Period</label> <span class="required">*</span>
                            <input type="text" class="form-control" id="cand_notice_period" name="cand_notice_period" placeholder="Notice Period" required data-required-error ="Please enter your notice period.">
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="app_job_id">Apply For </label> <span class="required">*</span>
                            <select id="app_job_id" name="app_job_id" class="form-control" disabled>
                                <option value=""> Select Apply For </option>
                                <?php foreach ($jobs as $key => $job) { ?>
                                    <option value=<?php echo $key; ?> <?php if ($job_id == $key) echo  "selected"; ?>> <?php echo $job; ?> </option>
                                <?php } ?>
                                <!--<option value = 'other' > Other </option>-->
                            </select>
                            <input type="hidden" name="app_job_id" value="<?php echo $app_job_id ?>" />
                        </div>
                        <div id="app-job-others" class="form-group app-job-others">
                            <label for="app_other_job">If Other</label> <span class="required">*</span>
                            <input type="text" id="app_other_job" class="form-control" name="app_other_job">                          
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="app_additional">Additional Details</label>
                            <textarea class="form-control" name="app_additional" id="app_additional" data-minlength="10" data-minlength="200" data-error="Please enter at least 10 characters and no more than 200" ></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="cand_from">How do you find us?</label> <span class="required">*</span>
                            <select id="cand_from" name="cand_from" class="form-control" required data-required-error ="Please tell, How do you find us?.">
                                <option value=''> --Please select-- </option>
                                <option value=1> Google </option>
                                <option value=2> Facebook </option>
                                <option value=3> Linked In </option>
                                <option value=4> Twitter </option>
                                <option value=5> Employee Referral </option>
                                <option value=6> Direct </option>
                                <option value=7> Other </option>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div id="cand-from-others" class="form-group cand-from-others">
                            <label for="cand_from_other">If Other</label> <span class="required">*</span>
                            <input type="text" id="cand_from_other" class="form-control" name="cand_from_other">                          
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 text-center">
                        <div id="cand-from-others" class="form-group">
                            <input id="applyformsubmit" type="submit" name="cf-submitted" class="btn btn-primary btn-default btn-front-submit" value="Apply">
                            <a href="<?php echo esc_url(site_url('/careers/')) ?>" class="btn btn-primary btn-front-submit">Cancel    </a> 
                        </div>
                    </div>
                </form>
            </div>
        </div> 
    <?php } else { ?>
        <p> Something wrong with your request <a href='<?php echo esc_url(site_url('/careers/')); ?>'>Go back and continue</a></p>
    <?php
    }
}

function wpbjp_converToTz($time="",$toTz='',$fromTz='')
    {   
        // timezone by php friendly values
        $date = new DateTime($time, new DateTimeZone($fromTz));
        $date->setTimezone(new DateTimeZone($toTz));
        $time= $date->format('Y-m-d H:i:s');
        return $time;
    }

// Form validation
function wpbjp_ag_candidate_apply_form_validate()
{    
    $errors = new WP_Error();
    $email = "";
    $job_id = 0;
    $email =  (isset($_POST['cand_email']) && !empty($_POST['cand_email'])) ? $_POST['cand_email'] : "";
    $app_job_id = (isset($_POST['app_job_id']) && !empty($_POST['app_job_id'])) ? wpbjp_ag_sanitize_text($_POST['app_job_id']) : "";
    $job_id = $job_id = wpbjp_encrypt_decrypt($app_job_id, 'decrypt');
    if (!empty($email) && $job_id > 0) {
        $applied_job = wpbjp_ag_get_applied_jobs($email, $job_id);       
        $date_time = date("F j, Y, g:i a",strtotime('+5 hours +30 minutes', strtotime($applied_job->app_applied_on)));       
        if (!empty($applied_job) && count((array)$applied_job) > 0) {
            $user_tz = wpbjp_ag_sanitize_text($_POST['wpbjp_user_tz']);   
            // $userTimezone = new DateTimeZone($user_tz);
            // $gmtTimezone = new DateTimeZone('GMT');  
            // $myDateTime = new DateTime($applied_job->app_applied_on, $gmtTimezone);             
            //$date_time = wpbjp_converToTz($applied_job->app_applied_on,'timestamp',$user_tz);
            $errors->add('cand_already_applied_error', 'You have applied for this job on ' . $date_time);
            return $errors; 
        }        
    }
    if (isset($_POST['cand_name']) && $_POST['cand_name'] == '') {
        $errors->add('name_error', 'Please enter your name.');
    }

    if (isset($_POST['cand_email']) && $_POST['cand_email'] == '') {
        $errors->add('email_error', 'Please fill in a valid email.');
    }

    if (isset($_POST['cand_mobile']) && $_POST['cand_mobile'] == '') {
        $errors->add('mobile_error', 'Please enter your mobile.');
    }

    if (isset($_POST['cand_experience']) && $_POST['cand_experience'] == '') {
        $errors->add('experience_error', 'Please enter your experience.');
    }

    if (isset($_POST['cand_relavent_exp']) && $_POST['cand_relavent_exp'] == '') {
        $errors->add('cand_relavent_exp_error', 'Please enter your relavant experience.');
    }

    if (isset($_POST['cand_current_company']) && $_POST['cand_current_company'] == '') {
        $errors->add('curr_company_error', 'Please enter your current company.');
    }

    if (isset($_POST['cand_current_location']) && $_POST['cand_current_location'] == '') {
        $errors->add('curr_location_error', 'Please enter your current location.');
    }

    if (isset($_POST['cand_current_ctc']) && $_POST['cand_current_ctc'] == '') {
        $errors->add('curr_etc_error', 'Please enter your current ctc.');
    }

    if (isset($_POST['cand_expected_ctc']) && $_POST['cand_expected_ctc'] == '') {
        $errors->add('expected_etc_error', 'Please enter your expected ctc.');
    }

    if (isset($_POST['cand_notice_period']) && $_POST['cand_notice_period'] == '') {
        $errors->add('curr_notice_error', 'Please enter your current Notice period');
    }

    if (isset($_POST['app_job_id']) && $_POST['app_job_id'] == '') {
        $errors->add('app_job_id_error', 'Please Select the job to apply.');
    }

    if (isset($_POST['app_job_id']) && $_POST['app_job_id'] == 1) {
        if (isset($_POST['app_other_job']) && $_POST['app_other_job'] == '') {
            $errors->add('app_other_job_error', 'If Other is required.');
        }
    }

    if (isset($_POST['cand_from']) && $_POST['cand_from'] == '') {
        $errors->add('cand_from_error', 'How do you find us? is required.');
    }

    if (isset($_POST['cand_from']) && $_POST['cand_from'] == 7) {
        if (isset($_POST['cand_from_other']) && $_POST['cand_from_other'] == '') {
            $errors->add('cand_from_other_error', 'If Other is required.');
        }
    }
    $file_errors = wpbjp_ag_file_validation($_FILES);
    $i = 1;

    foreach ($file_errors as $error) {
        $errors->add('app_resume_' . $i . '_error', $error, 'wpbjp');
        $i++;
    }
    return $errors;
}

// Form delivery
function wpbjp_ag_process_candidate_form($args = array())
{
    global $wpdb, $errors;
    $table_name2 = $wpdb->prefix . 'wpbjp_candidate';
    $table_name3 = $wpdb->prefix . 'wpbjp_applicant';
    $unique_col2 = 'cand_unique_id';
    $app_cand_id = 0;
    $cand_data = array();

    // This $default array is a way to initialize some default values that will be overwritten by our $args array.
    // We could add more keys as we see fit and it's a nice way to see what parameter we are using in our function.
    // It will only be overwritten with the values of our $args array if the keys are present in $args.
    // This uses WP wp_parse_args() function.
    $defaults = array(
        'cand_name' => '',
        'cand_email' => '',
        'cand_mobile' => '',
        'cand_experience' => '',
        'cand_relavent_exp' => '',
        'cand_education' => '',
        'cand_current_company' => '',
        'cand_current_location' => '',
        'cand_willing_relocate' => 'true',
        'cand_current_ctc' => '',
        'cand_expected_ctc' => '',
        'cand_notice_period' => '',
        'cand_from' => '',
        'cand_from_other' => '',
        'app_job_id' => 0,
        'app_other_job' => '',
        'app_additional' => '',
        'app_resume' => '',
        'app_resume_path' => '',
        'app_status' => 'new',
        'to' => get_option('admin_email'), // get the administrator's email address
    );


    $args = wp_parse_args($args, $defaults);
    $email_id = $args['cand_email'];
    $candidate = wpbjp_ag_get_candidate($email_id);
    $cand_data = array(
        'cand_name' => $args['cand_name'],
        'cand_email' => $email_id,
        'cand_mobile' => $args['cand_mobile'],
        'cand_experience' => $args['cand_experience'],
        'cand_relavent_exp' => $args['cand_relavent_exp'],
        'cand_education' => $args['cand_education'],
        'cand_current_company' => $args['cand_current_company'],
        'cand_current_location' => $args['cand_current_location'],
        'cand_willing_relocate' => $args['cand_willing_relocate'],
        'cand_current_ctc' => $args['cand_current_ctc'],
        'cand_expected_ctc' => $args['cand_expected_ctc'],
        'cand_notice_period' => $args['cand_notice_period'],
        'cand_from' => $args['cand_from'],
        'cand_from_other' => $args['cand_from_other'],
    );
    if (!empty($candidate) && count((array)$candidate) > 0) {
        $app_cand_id = $candidate->id;
        $result = $wpdb->update($table_name2, $cand_data, array('id' => $app_cand_id));
       
    } else {
        $next_id = wpbjp_getNextIncrement($table_name2, $unique_col2);
        $cand_data['cand_unique_id'] =  $next_id;
        $result = $wpdb->insert($table_name2, $cand_data);       
        $app_cand_id = $wpdb->insert_id;
    }

    if ($app_cand_id > 0) {

        $app_data = array(
            'app_cand_id' =>  $app_cand_id,
            'app_job_id' => $args['app_job_id'],
            'app_other_job' => $args['app_other_job'],
            'app_additional' => $args['app_additional'],
            'app_resume' => $args['app_resume'],
            'app_resume_path' => $args['app_resume_path'],
            'app_status' => $args['app_status'],
            'app_applied_on' => date('Y-m-d H:i:s', current_time('timestamp', 0))
        );

        $result = $wpdb->insert($table_name3, $app_data);     

        $jobs = wpbjp_get_jobs_list();
        $job_title = $jobs[$args['app_job_id']];
        $cand_name = $args['cand_name'];
		$app_resume_path = $args['app_resume_path'];

        $adminSubject = get_option('wpbjp_hr_mail_subject');
        $admin_subject = str_replace("[ag:job_title]", $job_title, $adminSubject); //"Applicant Resume Received for ".$job_title." at Agira Technologies.";

        $userSubject = get_option('wpbjp_cand_mail_subject');
        $user_subject = str_replace("[ag:job_title]", $job_title, $userSubject); //"You have Applied for ".$job_title." at Agira Technologies.";

        $adminMessage = get_option('wpbjp_hr_mail_template');
        $admin_message = str_replace("[ag:job_title]", $job_title, $adminMessage);
        $admin_message = str_replace("[ag:cand_name]", $cand_name, $admin_message);
		$admin_message = str_replace("[ag:cand_resume]", $app_resume_path, $admin_message);

        $hr_emailds = get_option('wpbjp_hr_mail_ids');

        $userMessage = get_option('wpbjp_cand_mail_template');
        $user_message = str_replace("[ag:job_title]", $job_title, $userMessage);
        $user_message = str_replace("[ag:cand_name]", $cand_name, $user_message);
        
        $headers = array("From:Agira Technologies <{$args['to']}>; " . "\r\n" . " Content-Type: text/html; charset=UTF-8");

        // Send email returns true on success, false otherwise
        //wp_mail( $to, $subject, $message, $headers = '', $attachments = array() )
        if (!wp_mail($args['cand_email'], $user_subject, $user_message, $headers)) {
            return false;
        }

        if (!wp_mail($hr_emailds, $admin_subject, $admin_message, $headers)) {
            return false;
        }
        //wp_send_json_success( mixed $data = null, int $status_code = null, int $options )
        $message = 'Thank you for sending profile to us ' . $_POST['cand_name'] . ', a member of our team will be in touch with you shortly.';
        $data = array('success' => true, 'data' => array('job_id' => $args['app_job_id'], 'message' => $message));
        wp_send_json_success($data, 200);
    } else {
        //wp_send_json_error( mixed $data = null, int $status_code = null, int $options )
        $error_messages = $errors->get_error_messages();
        $data = array('success' => false, 'data' => array('job_id' => $args['app_job_id'], 'errors' => $error_messages));
        wp_send_json_error($data, 200);
    }
}

// Form sanitize
function wpbjp_ag_sanitize_text($input)
{
    return trim(stripslashes(sanitize_text_field($input)));
}

// Form sanitize
function wpbjp_ag_sanitize_textarea($input)
{
    return trim(stripslashes(sanitize_textarea_field($input)));
}

// Form succsess message
function wpbjp_ag_candidate_form_message()
{
    global $errors;
    if (is_wp_error($errors) && empty($errors->errors) || isset($_GET['applied']) && $_GET['applied'] == 'success') {
        $url = esc_url($_SERVER['REQUEST_URI']);
        $val = substr($url, 0, strrpos($url, "?"));
        echo '<div class="alert alert-success" role="alert" >';
        echo '<p>Thank you for sending profile to us ' . $_POST['cand_name'] . ', a member of our team will be in touch with you shortly.</p>';
        echo '</div>';
        //Empty $_POST because we already sent email
        $_POST = '';
    } else {
        if (is_wp_error($errors) && !empty($errors->errors)) {
            $error_messages = $errors->get_error_messages();
            foreach ($error_messages as $k => $message) {
                echo '<div class="alert alert-danger cf-error ' . $k . '" role="alert">';
                echo '<p>' . $message . '</p>';
                echo '</div>';
            }
        }
    }
}

// Form shortcode
add_shortcode('agira_job_apply_form', 'wpbjp_ag_candidate_post_apply_form');

function wpbjp_ag_candidate_post_apply_form()
{
    ob_start();
    //wpbjp_ag_candidate_form_message();
    ag_html_candidate_form_code();
    return ob_get_clean();
}


add_action('wp_ajax_nopriv_get_tzoffset', 'wpbjp_ag_get_tzoffset');
function wpbjp_ag_get_tzoffset()
{   
    $timezone_offset_minutes = $_REQUEST['tzoffset'];
    $wpbjp_timezone_name = timezone_name_from_abbr("", $timezone_offset_minutes*60, false);   
    $data = array('user_tz' => $wpbjp_timezone_name);
    wp_send_json_success($data, 200);
}
// Error validation
//add_action('init', 'wpbjp_ag_candidate_apply_form');
add_action('wp_ajax_nopriv_at_candidate_apply_job', 'wpbjp_ag_candidate_apply_form');
function wpbjp_ag_candidate_apply_form()
{
    if (isset($_POST['action'])) {
        $app_job_id = wpbjp_ag_sanitize_text($_POST['app_job_id']);
        global $errors;
        $errors = wpbjp_ag_candidate_apply_form_validate();
        if (empty($errors->errors)) {
            $uploaded_file = wpbjp_ag_candidate_file_upload($_FILES);
            $job_id = wpbjp_encrypt_decrypt(wpbjp_ag_sanitize_text($_POST['app_job_id']), 'decrypt');
            $args = array(
                'cand_name' => wpbjp_ag_sanitize_text($_POST['cand_name']),
                'cand_email' => wpbjp_ag_sanitize_text($_POST['cand_email']),
                'cand_mobile' => wpbjp_ag_sanitize_text($_POST['cand_mobile']),
                'cand_experience' => wpbjp_ag_sanitize_text($_POST['cand_experience']),
                'cand_relavent_exp' => wpbjp_ag_sanitize_text($_POST['cand_experience']),
                'cand_education' => wpbjp_ag_sanitize_text($_POST['cand_education']),
                'cand_current_company' => wpbjp_ag_sanitize_text($_POST['cand_current_company']),
                'cand_current_location' => wpbjp_ag_sanitize_text($_POST['cand_current_location']),
                'cand_willing_relocate' => wpbjp_ag_sanitize_text($_POST['cand_willing_relocate']),
                'cand_current_ctc' => wpbjp_ag_sanitize_text($_POST['cand_current_ctc']),
                'cand_expected_ctc' => wpbjp_ag_sanitize_text($_POST['cand_expected_ctc']),
                'cand_notice_period' => wpbjp_ag_sanitize_text($_POST['cand_notice_period']),
                'cand_from' => wpbjp_ag_sanitize_text($_POST['cand_from']),
                'cand_from_other' => wpbjp_ag_sanitize_text($_POST['cand_from_other']),
                'app_additional' => wpbjp_ag_sanitize_textarea($_POST['app_additional']),
                'app_job_id' => $job_id,
                'app_other_job' => wpbjp_ag_sanitize_text($_POST['app_other_job']),
                'app_resume' =>  basename($uploaded_file),
                'app_resume_path' => $uploaded_file,
                'to' =>  get_option('admin_email')
            );
            wpbjp_ag_process_candidate_form($args);
            //$_POST = '';
        } else {
            $arrErrors = [];
            $error_messages = $errors->get_error_messages();
            $error_codes = $errors->get_error_codes();
            foreach ($error_messages as $k => $message) {
                $arrErrors[$error_codes[$k]] = $message;
            }
            $data = array('success' => false, 'data' => array('job_id' => $app_job_id, 'errors' => $arrErrors));
            wp_send_json_error($data, 200);
        }
    }
}

add_shortcode('agira_job_descriptions', 'wpbjp_ag_jobs_description_list');

function wpbjp_ag_jobs_description_list()
{ 
    ob_start();
    $job_posts = wpbjp_get_posted_jobs_list();  
    ?>
    <div class="bs-example">
        <div class="accordion_container">
            <?php
            if (!empty($job_posts) && count($job_posts) > 0) {
                $i = 0;
                foreach ($job_posts as $key => $job_post) {
            ?>
                    <div class="panel shadow-lg bg-white rounded accordion">
                        <div class="panel-heading bg-primary accordion_head">
                            <h4 class="panel-title">
                                <?php echo $job_post['job_title']; ?><span class="plusminus">+</span>
                            </h4>
                        </div>                
                        <div class="panel-body accordion_body" style="display:none;">
                            <p>
                                <strong>Location: </strong> <?php echo $job_post['job_location']; ?> <br />
                                <strong>Openings: </strong> <?php echo $job_post['job_openings']; ?> <br />
                                <strong>Experience: </strong> <?php echo $job_post['job_experience']; ?> <br />
                                <strong>Notice Period:</strong> <?php echo $job_post['job_joining']; ?>
                            </p>
                            <p><strong>Mandatory Skills: </strong></p>
                            <p><?php echo $job_post['job_description']; ?></p>
                            <?php
                            $app_job_id = wpbjp_encrypt_decrypt($job_post['id']);
                            ?>
                            <!-- Button trigger modal -->
                            <p class="text-center">
                                <a href="<?php echo esc_url(add_query_arg('apply', $app_job_id, site_url('/apply-for-job/'))) ?>" class="btn btn-primary btn-md">Apply Now</a>                                
                            </p>
                        </div>                        
                    </div>
                <?php
                    $i++;
                }
            } else {
                ?>
                <p>
                    <stong> Currently there is no openings. You can send your resume. We will contact if we have suitable position for you.
                    <?php
                }
                    ?>
        </div>
    </div>   
<?php
    return ob_get_clean();
}


add_filter('wp_handle_upload_prefilter', 'wpbjp_ag_pre_upload');
function wpbjp_ag_pre_upload($file)
{
    add_filter('upload_dir', 'wpbjp_ag_custom_upload_dir');
    $no_change_filename = (isset($_REQUEST['post_id']) && $_REQUEST['post_id'] != 0) ? true : false;
    if ($no_change_filename) {
        if (isset($_REQUEST['page']) && $_REQUEST['page'] == 'applicants_form') {
            $file = wpbjp_ag_custom_file_name($file);
        } else {
            return  $file;
        }
    }
    $file = wpbjp_ag_custom_file_name($file);
    return $file;
}

function wpbjp_ag_custom_file_name($file)
{
    $info = pathinfo($file['name']);
    $ext  = empty($info['extension']) ? '' : '.' . $info['extension'];
    $file['name'] = uniqid() . $ext; // uniqid    
    return $file;
}

function wpbjp_ag_custom_upload_dir($param)
{
    $use_default_dir = (isset($_REQUEST['post_id']) && $_REQUEST['post_id'] != 0) ? true : false;
    $mydir = '/resumes';
    if (!empty($param['error']) || $use_default_dir) {
        if (isset($_REQUEST['page']) && $_REQUEST['page'] == 'applicants_form') {
            $mydir = '/resumes';
        } else {
            return $param; //error or uploading not from a post/page/cpt
        }
    }
    $param['path'] = $param['basedir'] . $mydir;
    $param['url']  = $param['baseurl'] . $mydir;
    return $param;
}

function wpbjp_ag_candidate_file_upload($fileUploaded)
{
    if ($fileUploaded['app_resume'] != '') {
        $uploadedfile = $fileUploaded['app_resume'];
        $upload_overrides = array('test_form' => false);

        $movefile = wp_handle_upload($uploadedfile, $upload_overrides);
        $imageurl = "";
        if ($movefile && !isset($movefile['error'])) {
            $imageurl = $movefile['url'];
            remove_filter('upload_dir', 'wpbjp_ag_custom_upload_dir');
            remove_filter('wp_handle_upload_prefilter', 'wpbjp_ag_pre_upload');
            return $imageurl;
        } else {
            return $movefile['error'];
        }
    }
}

function wpbjp_ag_file_validation($fileUploaded)
{

    $erroMsgs = array();

    $uploadedFile = $fileUploaded['app_resume'];    

    if (!isset($fileUploaded['app_resume']) && !file_exists($fileUploaded['app_resume']['tmp_name'])) {
        $erroMsgs[] = __('Applicant resume is required', 'wpbjp');
    } else {

        $name_of_uploaded_file = basename($uploadedFile['name']);

        //get the file extension of the file
        $type_of_uploaded_file = substr($name_of_uploaded_file, strrpos($name_of_uploaded_file, '.') + 1);

        $size_of_uploaded_file = $uploadedFile["size"] / 1024; //size in KBs

        //Settings
        $max_allowed_file_size  = 2048; // size in KB
        $allowed_extensions     = array("doc", "docx", "odt", "pdf");
        $upload_overrides       = array('test_form' => false);

        if ($size_of_uploaded_file > $max_allowed_file_size) {
            $erroMsgs[] = __("Size of uploaded resume should be less than " . round($max_allowed_file_size / 1024) . "MB", 'wpbjp');
        }

        //------ Validate the file extension 
        $allowed_ext = false;
        for ($i = 0; $i < sizeof($allowed_extensions); $i++) {
            if (strcasecmp($allowed_extensions[$i], $type_of_uploaded_file) == 0) {
                $allowed_ext = true;
            }
        }
        if (!$allowed_ext) {
            $erroMsgs[] = __("The uploaded resume is not supported file type. Only the following file types are supported: " . implode(', ', $allowed_extensions));
        }
    }   
    return $erroMsgs;
}

function wpbjp_encrypt_decrypt($string, $action = 'encrypt')
{
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'BB74DEDD2DDSU825136HH7B63C27'; // user define private key
    $secret_iv = '5efg5IK6g38'; // user define secret key
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo
    if ($action == 'encrypt') {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if ($action == 'decrypt') {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}
