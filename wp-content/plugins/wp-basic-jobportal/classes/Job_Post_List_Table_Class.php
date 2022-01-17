<?php
if (!class_exists('WP_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}


class Job_Post_List_Table extends WP_List_Table
 { 
    function __construct()
    {
        global $status, $page;

        parent::__construct(array(
            'singular' => 'job_post',
            'plural'   => 'job_posts',
        ));
    }


    function column_default($item, $column_name)
    {
        return $item[$column_name];
    }

    function column_job_unique_id($item)
    {

        $actions = array(
            'edit' => sprintf('<a href="?page=job_posts_form&id=%s">%s</a>', $item['id'], __('Edit', 'wpbjp'))            
        );
        if($item['job_status'] =='active'){
            $actions['active'] = sprintf('<a href="?page=%s&action=active&id=%s">%s</a>', $_REQUEST['page'], $item['id'], __('Active', 'wpbjp'));
        }else{
            $actions['inactive'] = sprintf('<a href="?page=%s&action=inactive&id=%s">%s</a>', $_REQUEST['page'], $item['id'], __('Inactive', 'wpbjp'));
        }
        $job_unique_id = 'REQID'.str_pad($item['job_unique_id'], 4, '0', STR_PAD_LEFT);
        return sprintf('%s %s',
            $job_unique_id,
            $this->row_actions($actions)
        );
    }

    function column_created_by($item)
    {
        $user_id = $item['created_by'];
        if (!$user = get_userdata($user_id))
        return false;
        return $user->data->display_name;      
    }

    function column_applicants($item)
    {     
        $job_id = $item['id'];
        global $wpdb;
        $table_name = $wpdb->prefix . 'wpbjp_applicant'; 
        //$date_start = date( 'Y-m-d', current_time( 'timestamp', 0 ) );
        //$date_end = date('Y-m-d', strtotime($date.' - 29 days'));
              
        $total_items = $wpdb->get_var("SELECT COUNT(id) FROM $table_name WHERE app_job_id = $job_id");
        if($total_items > 0){
        //$applicants = sprintf('<a href="?page=%s&app_job_id=%s&date_start=%s&date_end=%s">%s</a>', 'applicants', $job_id, $date_start,$date_end, $total_items);
        $applicants = sprintf('<a href="?page=%s&app_job_id=%s">%s</a>', 'applicants', $job_id, $total_items);
        }else{
            $applicants = 0;
        }
        return $applicants;     
    }


    function column_cb($item)
    {
        return sprintf(
            '<input type="checkbox" name="id[]" value="%s" />',
            $item['id']
        );
    }

    function column_created_at($item)
    {
       return date("F j, Y, g:i a",strtotime('+5 hours +30 minutes', strtotime($item['created_at']))); 
    }

    function column_updated_at($item)
    {
        return date("F j, Y, g:i a",strtotime('+5 hours +30 minutes',strtotime($item['updated_at'])));
    }

    function get_columns()
    {
        $columns = array(
            'cb' => '<input type="checkbox" />', 
            'job_unique_id'      => __('Job Id', 'wpbjp'),
            'job_title'  => __('Title', 'wpbjp'),
            'job_for'     => __('Opening For', 'wpbjp'),
            'job_location' => __('Location', 'wpbjp'),
            'job_openings'   => __('Openings', 'wpbjp'),
            'job_experience' => __('Experience', 'wpbjp'),  
            'job_joining' => __('Notice Period', 'wpbjp'),   
            'job_status' => __('Status', 'wpbjp'),  
            'created_by' => __('Created By', 'wpbjp'),
            'created_at' => __('Created On', 'wpbjp'),
            'updated_at' => __('Last updated On', 'wpbjp'),
            'applicants' => __('Applicants', 'wpbjp'),
        );
        return $columns;
    }

    function get_sortable_columns()
    {
        $sortable_columns = array(
            'job_title' => array('job_title', true),
            'job_for'   => array('job_for', true),
            'job_location' => array('job_location', true),
            'job_openings' => array('job_openings', true),
            'job_experience' => array('job_experience', true),
            'job_joining' => array('job_joining', true),  
            'job_status' => array('job_status', true),   
            'created_by' => array('created_by', true),  
            'created_at' => array('created_at', true),
            'updated_at' => array('updated_at', true),
        );
        return $sortable_columns;
    }

    function get_bulk_actions()
    {
        $actions = array(
            'active' => 'Active',
            'inactive' => 'Inactive'
        );
        return $actions;
    }

    function process_bulk_action()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'wpbjp_job_post'; 

        if ('inactive' === $this->current_action()) {
            $ids = isset($_REQUEST['id']) ? $_REQUEST['id'] : array();
            if (is_array($ids)) $ids = implode(',', $ids);

            if (!empty($ids)) {
                $wpdb->query("UPDATE $table_name SET job_status = 'inactive' WHERE id IN($ids)");
            }
        }else{
            $ids = isset($_REQUEST['id']) ? $_REQUEST['id'] : array();
            if (is_array($ids)) $ids = implode(',', $ids);

            if (!empty($ids)) {
                $wpdb->query("UPDATE $table_name SET job_status = 'active' WHERE id IN($ids)");
            }
        }
    }

    function prepare_items()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'wpbjp_job_post'; 

        $per_page = 10; 

        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();
        
        $this->_column_headers = array($columns, $hidden, $sortable);
       
        $this->process_bulk_action();

        $total_items = $wpdb->get_var("SELECT COUNT(id) FROM $table_name");


        $paged = isset($_REQUEST['paged']) ? max(0, intval($_REQUEST['paged']) - 1)* $per_page : 0;
        $orderby = (isset($_REQUEST['orderby']) && in_array($_REQUEST['orderby'], array_keys($this->get_sortable_columns()))) ? $_REQUEST['orderby'] : 'job_title';
        $order = (isset($_REQUEST['order']) && in_array($_REQUEST['order'], array('asc', 'desc'))) ? $_REQUEST['order'] : 'asc';


        $this->items = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name ORDER BY $orderby $order LIMIT %d OFFSET %d", $per_page, $paged), ARRAY_A);

        $this->set_pagination_args(array(
            'total_items' => $total_items, 
            'per_page' => $per_page,
            'total_pages' => ceil($total_items / $per_page) 
        ));
    }
}