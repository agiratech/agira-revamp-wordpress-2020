<?php
if (!class_exists('WP_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}


class Applicant_List_Table extends WP_List_Table
 { 
    function __construct()
    {
        global $status, $page;

        parent::__construct(array(
            'singular' => 'applicant',
            'plural'   => 'applicants',
        ));
    }

    function extra_tablenav($which) 
    {
        global $wp;  
        $current_url = admin_url('admin.php'.add_query_arg(array($_GET), $wp->request));
        $date_default = "Please Select";
        if ( $which == "top" ){ 
        if(!empty($_GET['date_start']) && $_GET['date_end'])
        {
            $date_default = $_GET['date_start'].' - '.$_GET['date_end'];
        }
        ?> 
        <div style="width:100%">
            <div id="reportdaterange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 15%; text-align:center;float:left">
                <i class="fa fa-calendar" style="float:left"></i>&nbsp;
                <span><?php echo $date_default; ?></span> <i class="fa fa-caret-down" style="float:right"></i>
            </div>      
            <div style="float:right;">
                <a href="<?php echo $current_url.'&export=excel'; ?>">Export as Excel</a>
            </div>
        </div>
    <?php 
            }
    }

    function column_default($item, $column_name)
    {
        return $item[$column_name];
    }

    function column_cand_unique_id($item)
    {
        $actions = array(
            'edit' => sprintf('<a href="?page=applicants_form&id=%s">%s</a>', $item['id'], __('Edit', 'wpbjp'))            
        );
        $cand_unique_id = 'CID'.str_pad($item['cand_unique_id'], 4, '0', STR_PAD_LEFT);
        return sprintf('%s %s',
        $cand_unique_id,
        $this->row_actions($actions)
      );
    }   

    function column_cand_from($item){

    $fromArr = array(
        '1' => 'Google',
        '2' => 'Facebook',
        '3' => 'Linked In',
        '4' => 'Twitter',
        '5' => 'Employee Referral',
        '6' => 'Direct',
        '7' => 'Other'
    );
    
    return $fromArr[$item['cand_from']];

    }

    function column_app_applied_on($item){
        return date("F j, Y, g:i a",strtotime('+5 hours +30 minutes', strtotime($item['app_applied_on']))); 
    }

    function column_app_resume($item)
    {
        $resume = sprintf('<a href="%s" target= "_blank" >%s</a>', $item['app_resume_path'], $item['app_resume']);
        return $resume;
    }

    function column_column_cb($item)
    {
        return sprintf(
            '<input type="checkbox" name="id[]" value="%s" />',
            $item['id']
        );
    }

    function get_columns()
    {
        $columns = array(
            'cb' => '<input type="checkbox" />', 
            'cand_unique_id' => __('Candidate Id', 'wpbjp'),
            'cand_name' => __('Name', 'wpbjp'),           
            'cand_email' => __('E-Mail', 'wpbjp'),
            'cand_mobile' => __('Mobile', 'wpbjp'),
            'job_title'  => __('Job Title', 'wpbjp'), 
            'app_status' => __('Status', 'wpbjp'),   
            'app_applied_on' =>__('Applied On', 'wpbjp'),   
            'app_resume' => __('Resume', 'wpbjp'),             
            'app_additional' => __('Additional', 'wpbjp'),    
            'cand_from'   => __('Candidate by', 'wpbjp'),          
        );
        return $columns;
    }

    function get_sortable_columns()
    {
        $sortable_columns = array(
            'cand_unique_id' => array('cand_name', true), 
            'cand_name' => array('cand_name', true),          
            'cand_email' => array('cand_email', true),
            'cand_mobile' => array('cand_mobile', true),          
            'job_title' => array('job_title', true),     
            'app_status' => array('job', true),
            'app_applied_on' => array('job', true)
        );
        return $sortable_columns;
    }

    function prepare_items()
    {
        global $wpdb;

        
        $table_name1 = $wpdb->prefix . 'wpbjp_applicant'; 
        $table_name2 = $wpdb->prefix . 'wpbjp_candidate'; 
        $table_name3 = $wpdb->prefix . 'wpbjp_job_post'; 

        $sql = '';
        $paramStr= '';

        $conditions = [];
        $placeholders = [];
        $parameters = [];
        if (!empty($_GET['app_job_id']))
        {
            // here we are using equality
            $conditions[] = 't1.app_job_id = %s';
            $app_job_id = $_GET['app_job_id'];
            $parameters [] = $app_job_id;
        }

        if(!empty($_GET['date_start']) && $_GET['date_end'])
        {
            // BETWEEN
            $conditions[] = 't1.app_applied_on BETWEEN %s AND %s';
            $start_date = $_GET['date_start'];
            $end_date = $_GET['date_end'];
            $parameters [] = $start_date;
            $parameters [] = $end_date;
        }

        if ($conditions)
        {
            $sql .= " WHERE ".implode(" AND ", $conditions);
        }      
        
        $per_page = 10; 

        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();
        
        $this->_column_headers = array($columns, $hidden, $sortable);      

        $total_items = $wpdb->get_var("SELECT COUNT(id) FROM $table_name1");

        $paged = isset($_REQUEST['paged']) ? max(0, intval($_REQUEST['paged']) - 1)* $per_page : 0;
        $orderby = (isset($_REQUEST['orderby']) && in_array($_REQUEST['orderby'], array_keys($this->get_sortable_columns()))) ? $_REQUEST['orderby'] : 'cand_unique_id';
        $order = (isset($_REQUEST['order']) && in_array($_REQUEST['order'], array('asc', 'desc'))) ? $_REQUEST['order'] : 'asc';

        $oldParams[] = $per_page;
        $oldParams[] = $paged;
        if(!empty($parameters)){
            $oldParams = array_merge($parameters,$oldParams);
        }
        $sql_query = "SELECT 
         t1.id,
         t1.app_additional, 
         t1.app_other_job, 
         t1.app_resume, 
         t1.app_resume_path, 
         t1.app_status, 
         t1.app_applied_on, 
         t2.cand_unique_id, 
         t2.cand_name,
         t2.cand_email,
         t2.cand_mobile,
         t2.cand_experience, 
         t2.cand_education, 
         t2.cand_current_company, 
         t2.cand_current_location, 
         t2.cand_current_ctc,
         t2.cand_notice_period,
         t2.cand_from,
         t2.cand_from_other,         
         t3.job_title
         FROM $table_name1 as t1  
         LEFT OUTER JOIN $table_name2 t2 ON t2.id = t1.app_cand_id 
         LEFT OUTER JOIN $table_name3 t3 ON t3.id = t1.app_job_id $sql
         ORDER BY $orderby $order 
         LIMIT %d OFFSET %d";   

        //  $buildSql= $wpdb->prepare($sql_query, $oldParams);
        //  echo "<pre>";
        //  print_r($sql_query);
        //  print_r($oldParams);
        //  echo "</pre";   
        $results = $wpdb->get_results($wpdb->prepare($sql_query, $oldParams), ARRAY_A);     
        $this->items = $wpdb->get_results($wpdb->prepare($sql_query, $oldParams), ARRAY_A);   
        
        if(!empty($_GET['export']) && $_GET['export']=='excel')
        {

            $this->exportAsExcel($results); 
        }
       
        //echo $wpdb->last_query;
        //echo $wpdb->last_error;

        $this->set_pagination_args(array(
            'total_items' => $total_items, 
            'per_page' => $per_page,
            'total_pages' => ceil($total_items / $per_page) 
        ));
    }

    // Filter the excel data 
    function filterData(&$str){ 
        $str = preg_replace("/\t/", "\\t", $str); 
        $str = preg_replace("/\r?\n/", "\\n", $str); 
        if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
    } 

   function exportAsExcel($results){
        ob_clean();

        $fromArr = array(
            '1' => 'Google',
            '2' => 'Facebook',
            '3' => 'Linked In',
            '4' => 'Twitter',
            '5' => 'Employee Referral',
            '6' => 'Direct',
            '7' => 'Other'
        );
        // Column names 
        $fields = array(
            'Id',
            'Candidate Id',
            'Name', 
            'Email', 
            'Mobile', 
            'Job Title',
            'If Other',  
            'Experience', 
            'Education', 
            'Current Company', 
            'Current Location', 
            'Current CTC', 
            'Notice Period', 
            'Status', 
            'Applied On', 
            'Resume',
            'Additional', 
            'How do you find us?', 
            'If Other'
        ); 

        // Display column names as first row 
        $excelData = implode("\t", array_values($fields)) . "\n";             

        if(count($results) > 0){ 
            // Output each row of the data 
            foreach($results as $row){
                $cand_unique_id = 'CID'.str_pad($row['cand_unique_id'], 4, '0', STR_PAD_LEFT);
                $applied_date = date("Y-m-d", strtotime($row['app_applied_on']));
                $lineData = array(
                    $row['id'], 
                    $cand_unique_id,
                    $row['cand_name'], 
                    $row['cand_email'], 
                    $row['cand_mobile'], 
                    $row['job_title'],
                    $row['app_other_job'],
                    $row['cand_experience'],
                    $row['cand_education'],
                    $row['cand_current_company'],
                    $row['cand_current_location'],
                    $row['cand_current_ctc'],
                    $row['cand_notice_period'], 
                    $row['app_status'],  
                    $applied_date, 
                    $row['app_resume_path'], 
                    $row['app_additional'], 
                    $fromArr[$row['cand_from']],
                    $row['cand_from_other'] 
                ); 
                array_walk($lineData, array($this, 'filterData')); 
                $excelData .= implode("\t", array_values($lineData)) . "\n"; 
            } 
        }else{ 
            $excelData .= 'No records found...'. "\n"; 
        } 
        // Excel file name for download 
        $fileName = "candidate-data_" . date('Y-m-d') . ".xls";                     
        // Headers for download 
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private", false);
        header("Content-Type: application/vnd.ms-excel"); 
        header("Content-Disposition: attachment; filename=\"$fileName\""); 
        header("Content-Transfer-Encoding: binary");
        // Render excel data 
        echo $excelData;             
        exit;
   }
}