
<?php
// if uninstall.php is not called by WordPress, die

if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}
 
// drop a custom database table

global $wpdb; 
$table_name1 = $wpdb->prefix . 'wpbjp_job_post'; 
$table_name2 = $wpdb->prefix . 'wpbjp_candidate'; 
$table_name3 = $wpdb->prefix . 'wpbjp_applicant'; 
$wpdb->query("DROP TABLE IF EXISTS $table_name3");
$wpdb->query("DROP TABLE IF EXISTS $table_name2");
$wpdb->query("DROP TABLE IF EXISTS $table_name1");
?>

