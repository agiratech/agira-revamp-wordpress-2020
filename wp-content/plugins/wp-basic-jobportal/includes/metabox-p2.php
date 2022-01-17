<?php
function wpbjp_applicants_page_handler()
{
    global $wpdb;

    $table = new Applicant_List_Table();
    $table->prepare_items();

    $message = '';
   /* if ('delete' === $table->current_action()) {
        $message = '<div class="updated below-h2" id="message"><p>' . sprintf(__('Items deleted: %d', 'wpbjp'), count($_REQUEST['id'])) . '</p></div>';
    }*/
    ?>
<div class="wrap">

    <div class="icon32 icon32-posts-post" id="icon-edit"><br></div>
    <h2><?php _e('Applicants', 'wpbjp')?> <a class="add-new-h2"
                                 href="<?php echo get_admin_url(get_current_blog_id(), 'admin.php?page=applicants_form');?>"><?php _e('Add new', 'wpbjp')?></a>
    </h2>
    <?php echo $message; ?>

    <form id="applicants-table" method="POST">
        <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>"/>
        <?php $table->display() ?>
    </form>

</div>
<?php
}


function wpbjp_applicants_form_page_handler()
{
    global $wpdb;
    $table_name1 = $wpdb->prefix . 'wpbjp_applicant'; 
    $table_name2 = $wpdb->prefix . 'wpbjp_candidate';
    $table_name3 = $wpdb->prefix . 'wpbjp_job_post';
    $unique_col2 = 'cand_unique_id';


    $message = '';
    $notice = '';


    $default1 = array(
        'id' => 0,
        'app_cand_id'=> 0,
        'app_job_id' => 0, 
        'app_other_job' => '',  
        'app_additional' => '',
        'app_status'     => '',
        'app_resume'     => '',
        'app_resume_path' => '',
        'app_applied_on'   => '',       
    );


    $default2 = array(       
        'cand_unique_id' => '',
        'cand_name'      => '',       
        'cand_email'     => '',
        'cand_mobile'    => null,
        'cand_experience' => '', 
        'cand_relavent_exp' => '',
        'cand_education' => null, 
        'cand_current_company' => '', 
        'cand_current_location' => '', 
        'cand_willing_relocate' => true, 
        'cand_current_ctc' => '', 
        'cand_expected_ctc' => '',
        'cand_notice_period' => '', 
        'cand_from' => '',     
        'cand_from_other' => '',    
    );


    if ( isset($_REQUEST['nonce']) && wp_verify_nonce($_REQUEST['nonce'], basename(__FILE__))) {
        
        $item = shortcode_atts(($default1 + $default2), $_REQUEST); 
        $cand_id = 0;
        // $item['app_resume'] = $_FILES;
        // echo "<pre>";
        // print_r($_FILES);
        // echo "</pre>";
        // exit;
        $item_valid = wpbjp_validate_applicant($item);
        if ($item_valid === true) {
            $data = array();
            if($item['app_cand_id'] == 0){
                $next_id = wpbjp_getNextIncrement($table_name2, $unique_col2);
                $data['cand_unique_id'] =  $next_id;
            }  
            $data['id'] = $item['app_cand_id']; 
            $data['cand_name'] = $item['cand_name']; 
            $data['cand_email'] = $item['cand_email']; 
            $data['cand_mobile'] = $item['cand_mobile'];
            $data['cand_from'] = $item['cand_from']; 
            $data['cand_from_other'] = $item['cand_from_other']; 
            $data['cand_experience'] = $item['cand_experience'];
            $data['cand_relavent_exp'] = $item['cand_relavent_exp'];
            $data['cand_education'] = $item['cand_education'];
            $data['cand_current_company'] = $item['cand_current_company']; 
            $data['cand_current_location'] =$item['cand_current_location'];  
            $data['cand_willing_relocate'] =$item['cand_willing_relocate']; 
            $data['cand_current_ctc'] = $item['cand_current_ctc']; 
            $data['cand_expected_ctc'] = $item['cand_expected_ctc']; 
            $data['cand_notice_period'] = $item['cand_notice_period']; 
         

            if ($item['app_cand_id'] == 0) {     
                $result = $wpdb->insert($table_name2, $data);
                // echo $wpdb->last_query;
                // echo $wpdb->last_error;
                $item['app_cand_id'] = $wpdb->insert_id;
                $cand_id = $item['app_cand_id'];
                if ($result) {
                    $message = __('Item was successfully saved', 'wpbjp');
                } else {
                    $notice = __('There was an error while saving item', 'wpbjp');
                }
            } else {
                $result = $wpdb->update($table_name2, $data, array('id' => $item['app_cand_id']));
                // echo $wpdb->last_query;
                // echo $wpdb->last_error;
                if ($result) {
                    $message = __('Item was successfully updated', 'wpbjp');
                } else {
                    $notice = __('There was an error while updating item', 'wpbjp');
                }
            }

            $data = array();
            $data['id'] = $item['id'];
            $data['app_cand_id'] = $item['app_cand_id'];                             
            $data['app_job_id'] = $item['app_job_id']; 
            $data['app_other_job'] = $item['app_other_job']; 
            $data['app_additional'] = $item['app_additional']; 
            if(isset($_FILES['app_resume']) && file_exists($_FILES['app_resume']['tmp_name']))
            {
                $oldFilePath = $_POST['app_resume_old'];
                $upload_dir   = wp_upload_dir();
                $resume_dir = $upload_dir['basedir'].'/resumes/';
                $oldFilename = basename($oldFilePath);
                $filePath = $resume_dir.$oldFilename;
                //echo $filePath;
                //exit;
                wp_delete_file($filePath);
                $uploaded_file = wpbjp_ag_candidate_file_upload($_FILES);                     
                $data['app_resume'] = basename($uploaded_file);
                $data['app_resume_path'] = $uploaded_file;
            }
            $data['app_applied_on'] = date( 'Y-m-d H:i:s', current_time( 'timestamp', 0 ) );
              
            if ($item['id'] == 0) {
                $result = $wpdb->insert($table_name1, $data);
                //echo $wpdb->last_query;
                //echo $wpdb->last_error;
                $item['id'] = $wpdb->insert_id;
                if ($result) {
                    $message = __('Item was successfully saved', 'wpbjp');
                } else {
                    $notice = __('There was an error while saving item', 'wpbjp');
                }
            } else {
                $result = $wpdb->update($table_name1, $data, array('id' => $data['id']));
                //echo $wpdb->last_query;
                //echo $wpdb->last_error;
                if ($result) {
                    $message = __('Item was successfully updated', 'wpbjp');
                } else {
                    $notice = __('There was an error while updating item', 'wpbjp');
                }

            }

        } else {            
            $notice = $item_valid;
        }
    }
    else {        
        $item = $default1 + $default2;
        if (isset($_REQUEST['id'])) {
            $item = $wpdb->get_row($wpdb->prepare("SELECT 
            t1.id, 
            t1.app_cand_id, 
            t1.app_job_id,
            t3.job_title,
            t1.app_additional, 
            t1.app_resume, 
            t1.app_resume_path,
            t1.app_other_job,
            t1.app_status, 
            t1.app_applied_on, 
            t2.cand_unique_id, 
            t2.cand_name,
            t2.cand_email,
            t2.cand_mobile,
            t2.cand_experience, 
            t2.cand_relavent_exp,
            t2.cand_education, 
            t2.cand_current_company, 
            t2.cand_current_location,
            t2.cand_willing_relocate, 
            t2.cand_current_ctc,
            t2.cand_expected_ctc,
            t2.cand_notice_period,
            t2.cand_from,   
            t2.cand_from_other           
            FROM $table_name1 as t1  
            LEFT OUTER JOIN $table_name2 t2 ON t2.id = t1.app_cand_id 
            LEFT OUTER JOIN $table_name3 t3 ON t3.id = t1.app_job_id WHERE t1.id = %d", $_REQUEST['id']
            ), ARRAY_A);
            // echo $wpdb->last_query;
            // echo $wpdb->last_error;
            if (!$item) {
                $item = ($default1 + $default2);
                $notice = __('Item not found', 'wpbjp');
            }
        }
    }    
    add_meta_box('applicants_form_meta_box', __('Applicant data', 'wpbjp'), 'wpbjp_applicants_form_meta_box_handler', 'applicant', 'normal', 'default');

    ?>
<div class="wrap">
    <div class="icon32 icon32-posts-post" id="icon-edit"><br></div>
    <h2><?php _e('Applicant', 'wpbjp')?> <a class="add-new-h2"
                                href="<?php echo get_admin_url(get_current_blog_id(), 'admin.php?page=applicants');?>"><?php _e('back to list', 'wpbjp')?></a>
    </h2>

    <?php if (!empty($notice)): ?>
    <div id="notice" class="error"><p><?php echo $notice ?></p></div>
    <?php endif;?>
    <?php if (!empty($message)): ?>
    <div id="message" class="updated"><p><?php echo $message ?></p></div>
    <?php endif;?>

    <form id="form" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="nonce" value="<?php echo wp_create_nonce(basename(__FILE__))?>"/>
        
        <input type="hidden" name="id" value="<?php echo $item['id'] ?>"/>
        <input type="hidden" name="app_cand_id" value="<?php echo $item['app_cand_id'] ?>"/>

        <div class="metabox-holder" id="poststuff">
            <div id="post-body">
                <div id="post-body-content">
                    
                    <?php do_meta_boxes('applicant', 'normal', $item); ?>
                    <input type="submit" value="<?php _e('Save', 'wpbjp')?>" id="submit" class="button-primary" name="submit">
                </div>
            </div>
        </div>
    </form>
</div>
<?php
}

function wpbjp_validate_applicant($item)
{
    $messages = array();
    
    if (empty($item['cand_name'])) {
        $messages[] = __('Name is required', 'wpbjp');
    }
    if (!empty($item['cand_email']) && !is_email($item['cand_email'])) {
        $messages[] = __('E-Mail is in wrong format', 'wpbjp');
    }
    if (!empty($item['cand_mobile']) && !absint(intval($item['cand_mobile']))) {
        $messages[] = __('Mobile can not be less than zero');
    }
    if (!empty($item['cand_mobile']) && !preg_match('/[0-9]+/', $item['cand_mobile'])) {
        $messages[] = __('Mobile must be number');
    }
    if (empty($item['cand_experience'])) {
        $messages[] = __('Total Experience is required', 'wpbjp');
    }
    if (empty($item['cand_relavent_exp'])) {
        $messages[] = __('Relavent Experience is required', 'wpbjp');
    }
    if (empty($item['cand_current_company'])) {
        $messages[] = __('Current company is required', 'wpbjp');
    }
    if (empty($item['cand_current_location'])) {
        $messages[] = __('Current location is required', 'wpbjp');
    }
    if (empty($item['cand_willing_relocate'])) {
        $messages[] = __('Willing to relocate is required', 'wpbjp');
    }
    if (empty($item['cand_current_ctc'])) {
        $messages[] = __('Current ctc is required', 'wpbjp');
    }
    if (empty($item['cand_expected_ctc'])) {
        $messages[] = __('expected ctc is required', 'wpbjp');
    }
    if (empty($item['cand_notice_period'])) {
        $messages[] = __('Notice Period is required', 'wpbjp');
    }
    if (empty($item['cand_from'])) {
        $messages[] = __('Applicant from is required', 'wpbjp');
    }
    if (empty($item['app_job_id'])) {
        $messages[] = __('Apply for is required', 'wpbjp');
    }
    if (!empty($item['app_job_id']) && $item['app_job_id'] ==1) {  
        if (empty($item['app_other_job'])) {
            $messages[] = __('If choose others please enter details', 'wpbjp');
        } 
    }
    if (empty($_POST['app_resume_old']) && !isset($_FILES['app_resume']) && !file_exists($_FILES['app_resume']['tmp_name'])){    
        $file_errors = wpbjp_ag_file_validation($_FILES);
        $messages = array_merge($messages,$file_errors);
    }
    
    if (empty($messages)) return true;
    
    return implode('<br />', $messages);
}

function wpbjp_applicants_form_meta_box_handler($item)
{
   $jobs = wpbjp_get_jobs_list();   
?>
<tbody >
		
	<div class="formdatabc">		
		
    <form  enctype="multipart/form-data">
		<div class="form2bc">
            <p>			
                <label for="name"><?php _e('Name:', 'wpbjp')?></label>
            <br>	
                <input id="name" name="cand_name" type="text" value="<?php echo esc_attr($item['cand_name'])?>"
                        required>
            </p><p>	
                <label for="cand_email"><?php _e('Email:', 'wpbjp')?></label>
            <br>
                <input id="cand_email" name="cand_email" type="text" value="<?php echo esc_attr($item['cand_email'])?>"
                        required>
            </p>
        </div>	
        <div class="form3bc">
            <p>	  
                <label for="cand_mobile"><?php _e('Mobile:', 'wpbjp')?></label> 
            <br>
                <input id="cand_mobile" name="cand_mobile" type="tel" value="<?php echo esc_attr($item['cand_mobile'])?>">
            </p>
            <p>
                <label for="cand_from"><?php _e('Applicant from:', 'wpbjp')?></label> 
            <br>	
                <select  id="cand_from" name="cand_from">
                    <option value = 1 <?php if(esc_attr($item['cand_from']) == 1) echo "selected"; ?>> Google </option>
                    <option value = 2 <?php if(esc_attr($item['cand_from']) == 2) echo "selected"; ?>> Facebook </option>
                    <option value = 3 <?php if(esc_attr($item['cand_from']) == 3) echo "selected"; ?>> Linked In </option>
                    <option value = 4 <?php if(esc_attr($item['cand_from']) == 4) echo "selected"; ?>> Twitter </option>
                    <option value = 5 <?php if(esc_attr($item['cand_from']) == 5) echo "selected"; ?>> Employee Referral </option>
                    <option value = 6 <?php if(esc_attr($item['cand_from']) == 6) echo "selected"; ?>> Direct </option>
                    <option value = 7 <?php if(esc_attr($item['cand_from']) == 7) echo "selected"; ?>> Other </option>
                </select>
            </p>
            <p class="cand_other">	  
                <label for="cand_from_other"><?php _e('Other:', 'wpbjp')?></label> 
            <br>
                <input id="cand_from_other" name="cand_from_other" type="text" value="<?php echo esc_attr($item['cand_from_other'])?>">
            </p>
		</div>	
        <div class="form3bc">
            <p>	  
                <label for="cand_experience"><?php _e('Experience:', 'wpbjp')?></label> 
            <br>
                <input id="cand_experience" name="cand_experience" type="text" value="<?php echo esc_attr($item['cand_experience'])?>">
            </p>
            <p>	  
                <label for="cand_relavent_exp"><?php _e('Relavent Experience:', 'wpbjp')?></label> 
            <br>
                <input id="cand_relavent_exp" name="cand_relavent_exp" type="text" value="<?php echo esc_attr($item['cand_relavent_exp'])?>">
            </p>           
            <p>	  
                <label for="cand_education"><?php _e('Education:', 'wpbjp')?></label> 
            <br>
                <input id="cand_education" name="cand_education" type="text" value="<?php echo esc_attr($item['cand_education'])?>">
            </p>          
		</div>
        <div class="form3bc">
            <p>	  
                <label for="cand_current_company"><?php _e('Current Company:', 'wpbjp')?></label> 
            <br>
                <input id="cand_current_company" name="cand_current_company" type="text" value="<?php echo esc_attr($item['cand_current_company'])?>">
            </p>
            <p>	  
                <label for="cand_current_location"><?php _e('Current Location:', 'wpbjp')?></label> 
            <br>
                <input id="cand_current_location" name="cand_current_location" type="text" value="<?php echo esc_attr($item['cand_current_location'])?>">
            </p>
            <p>	  
                <label for="cand_willing_relocate"><?php _e('Willing to relocation:', 'wpbjp')?></label> 
            <br>
            <input id="cand_willing_relocate_1" name="cand_willing_relocate" type="radio" value="true" <?php if($item['cand_willing_relocate'] === 'true')  echo "checked"; ?>> Yes
            <input id="cand_willing_relocate_2" name="cand_willing_relocate" type="radio" value="false" <?php if($item['cand_willing_relocate'] === 'false')  echo "checked"; ?>> No
            </p>
        </div>
        <div class="form3bc">
         
            <p>	  
                <label for="cand_current_ctc"><?php _e('Current CTC:', 'wpbjp')?></label> 
            <br>
                <input id="cand_current_ctc" name="cand_current_ctc" type="text" value="<?php echo esc_attr($item['cand_current_ctc'])?>">
            </p>
            <p>	  
                <label for="cand_expected_ctc"><?php _e('Expected CTC:', 'wpbjp')?></label> 
            <br>
                <input id="cand_expected_ctc" name="cand_expected_ctc" type="text" value="<?php echo esc_attr($item['cand_expected_ctc'])?>">
            </p>
            <p>	  
                <label for="cand_notice_period"><?php _e('Notice Period:', 'wpbjp')?></label> 
            <br>
                <input id="cand_notice_period" name="cand_notice_period" type="texts" value="<?php echo esc_attr($item['cand_notice_period'])?>">
            </p>
		</div>		
        <div class="form3bc">
			<p>
            <label for="app_job_id"><?php _e('Apply For:', 'wpbjp')?></label> 
		    <br>	
            <select id="app_job_id" name="app_job_id">
                <option value=""> Select Apply For </option>
                <?php foreach( $jobs as $key => $job) { ?>
                <option value = <?php echo $key; ?> <?php if(esc_attr($item['app_job_id']) == $key) echo "selected"; ?>> <?php echo $job; ?> </option>
                <?php } ?>
            </select>
            </p>
            <p class="otherjob">	  
                <label for="app_other_job"><?php _e('If Other:', 'wpbjp')?></label> 
            <br>
                <input id="app_other_job" name="app_other_job" type="text" value="<?php echo esc_attr($item['app_other_job'])?>">
            </p>
            <p class="app_resume">	  
                <label for="app_resume"><?php _e('Resume:', 'wpbjp')?></label> 
            <br>
                <input id="app_resume_old" name="app_resume_old" type="hidden" value="<?php echo esc_attr($item['app_resume_path'])?>"><br/>
                <input id="app_resume" name="app_resume" type="file"><br/>
                <a href= "<?php echo esc_attr($item['app_resume_path'])?>"><?php echo esc_attr($item['app_resume'])?></a>
                
            </p>
		</div>
		<div>		
		<p>  
            <label for="app_additional"><?php _e('Additional:', 'wpbjp')?></label>
		<br>
            <textarea id="app_additional" name="app_additional" cols="100" rows="3" maxlength="240"><?php echo esc_attr($item['app_additional'])?></textarea>
		</p>
        <p>  
            <label for="app_status"><?php _e('App Status:', 'wpbjp')?></label>
		    <br>
             <select id="app_status" name="app_status">
                <option value ='' > Select the Status </option>
                <option value = 'new' <?php if(esc_attr($item['app_status']) == 'new') echo "selected"; ?>> New </option>
                <option value = 'contacted'<?php if(esc_attr($item['app_status']) == 'contacted') echo "selected"; ?>> Contacted </option>
                <option value = 'scheduled'<?php if(esc_attr($item['app_status']) == 'scheduled') echo "selected"; ?>> Scheduled </option>
                <option value = 'interviewed'<?php if(esc_attr($item['app_status']) == 'interviewed') echo "selected"; ?>> Interviewed </option>
                <option value = 'selected'<?php if(esc_attr($item['app_status']) == 'selected') echo "selected"; ?>> Selected </option>
                <option value = 'rejected'<?php if(esc_attr($item['app_status']) == 'rejected') echo "selected"; ?>> Rejected </option>
             </select>
             </select>
		    </p>
		</div>	
		</form>
		</div>
</tbody>
<?php
}

function file_upload($files){
    if($_FILES['file']['name'] != ''){
        $uploadedfile = $_FILES['file'];
        $upload_overrides = array( 'test_form' => false );
    
        $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
        $imageurl = "";
        if ( $movefile && ! isset( $movefile['error'] ) ) {
           $imageurl = $movefile['url'];
           echo "url : ".$imageurl;
        } else {
           echo $movefile['error'];
        }
      }
}


