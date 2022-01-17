<?php
function wpbjp_job_posts_page_handler()
{
    global $wpdb;

    $table = new Job_Post_List_Table();
    $table->prepare_items();

    $message = '';
    if ('inactive' === $table->current_action()) {
        $message = '<div class="updated below-h2" id="message"><p>' . sprintf(__('Items inactivated: %d', 'wpbjp'), count($_REQUEST['id'])) . '</p></div>';
    }
    ?>
<div class="wrap">

    <div class="icon32 icon32-posts-post" id="icon-edit"><br></div>
    <h2><?php _e('Job Posts', 'wpbjp')?> <a class="add-new-h2"
                                 href="<?php echo get_admin_url(get_current_blog_id(), 'admin.php?page=job_posts_form');?>"><?php _e('Add new', 'wpbjp')?></a>
    </h2>
    <?php echo $message; ?>

    <form id="job_posts-table" method="POST">
        <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>"/>
        <?php $table->display() ?>
    </form>

</div>
<?php
}

function wpbjp_job_posts_form_page_handler()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'wpbjp_job_post'; 
    $unique_col = 'job_unique_id';
    $message = '';
    $notice = '';

    $default = array(
        'id' => 0,
        'job_unique_id' => '',
        'job_title'  => '',
        'job_for'     => '',
        'job_location'   => '',
        'job_openings'   => '',
        'job_experience' => '',  
        'job_joining' => '',   
        'job_description' => '',
        'job_status'       => '',        
        'created_by' => '',  
        'created_at' => date( 'Y-m-d H:i:s', current_time( 'timestamp', 0 ) ),  
        'updated_at' => date( 'Y-m-d H:i:s', current_time( 'timestamp', 0 ) ),   
    );    

    if ( isset($_REQUEST['nonce']) && wp_verify_nonce($_REQUEST['nonce'], basename(__FILE__))) {
        
        $item = shortcode_atts($default, $_REQUEST);       
        
        if($item['id'] == 0){
            $next_id = wpbjp_getNextIncrement($table_name, $unique_col);
            $item['job_unique_id'] =  $next_id;
        }
        $item['created_by'] = get_current_user_id();

        $item_valid = wpbjp_validate_job_post($item);          

        if ($item_valid === true) {
            if ($item['id'] == 0) {
                $result = $wpdb->insert($table_name, $item);
                //echo $wpdb->last_query;
                //echo $wpdb->last_error;
                $item['id'] = $wpdb->insert_id;
                if ($result) {
                    $message = __('Item was successfully saved', 'wpbjp');
                } else {
                   
                    $notice = __('There was an error while saving item', 'wpbjp');
                }
            } else {
                $item['updated_at'] = date( 'Y-m-d H:i:s', current_time( 'timestamp', 0 ) );
                $result = $wpdb->update($table_name, $item, array('id' => $item['id']));
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
        $item = $default;
        if (isset($_REQUEST['id'])) {
            $item = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $_REQUEST['id']), ARRAY_A);
            if (!$item) {
                $item = $default;
                $notice = __('Item not found', 'wpbjp');
            }
        }
    }

    
    add_meta_box('job_posts_form_meta_box', __('Job Post data', 'wpbjp'), 'wpbjp_job_posts_form_meta_box_handler', 'job_post', 'normal', 'default');

    ?>
<div class="wrap">
    <div class="icon32 icon32-posts-post" id="icon-edit"><br></div>
    <h2><?php _e('Job Post', 'wpbjp')?> <a class="add-new-h2"
                                href="<?php echo get_admin_url(get_current_blog_id(), 'admin.php?page=job_posts');?>"><?php _e('back to list', 'wpbjp')?></a>
    </h2>

    <?php if (!empty($notice)): ?>
    <div id="notice" class="error"><p><?php echo $notice ?></p></div>
    <?php endif;?>
    <?php if (!empty($message)): ?>
    <div id="message" class="updated"><p><?php echo $message ?></p></div>
    <?php endif;?>

    <form id="form" method="POST">
        <input type="hidden" name="nonce" value="<?php echo wp_create_nonce(basename(__FILE__))?>"/>
        
        <input type="hidden" name="id" value="<?php echo $item['id'] ?>"/>

        <div class="metabox-holder" id="poststuff">
            <div id="post-body">
                <div id="post-body-content">
                    
                    <?php do_meta_boxes('job_post', 'normal', $item); ?>
                    <input type="submit" value="<?php _e('Save', 'wpbjp')?>" id="submit" class="button-primary" name="submit">
                </div>
            </div>
        </div>
    </form>
</div>
<?php
}

function wpbjp_validate_job_post($item)
{
    $messages = array();

    if (empty($item['job_title'])) $messages[] = __('Job Title is required', 'wpbjp');
    if (empty($item['job_for'])) $messages[] = __('Job Opening For is required', 'wpbjp');
    if (empty($item['job_location'])) $messages[] = __('Job Location is required', 'wpbjp');
    if (!empty($item['job_openings']) && !absint(intval($item['job_openings'])))  $messages[] = __('Job Openings can not be less than zero');
    if (!empty($item['job_openings']) && !preg_match('/[0-9]+/', $item['job_openings'])) $messages[] = __('Job Openings must be number');
    if (empty($item['job_experience'])) $messages[] = __('Job Experience level is required', 'wpbjp');
    if (empty($item['job_joining'])) $messages[] = __('Notice Period is required', 'wpbjp');
    if (empty($item['job_description'])) $messages[] = __('job_description is required', 'wpbjp');
    if (empty($item['job_status'])) $messages[] = __('Job Status is required', 'wpbjp');
    

    if (empty($messages)) return true;
    return implode('<br />', $messages);
}

function wpbjp_job_posts_form_meta_box_handler($item)
{
    ?>
<tbody >
		
	<div class="formdatabc">		
		
    <form >
		<div class="form2bc">
        <p>			
		    <label for="job_title"><?php _e('Job Title:', 'wpbjp')?></label>
		<br>	
            <input id="job_title" name="job_title" type="text" value="<?php echo esc_attr($item['job_title'])?>"
                    required>
		</p><p>	
            <label for="job_for"><?php _e('Job Opening For:', 'wpbjp')?></label>
		<br>
		    <input id="job_for" name="job_for" type="text" value="<?php echo esc_attr($item['job_for'])?>"
                    required>
        </p>
		</div>	
		<div class="form2bc">
			<p>
            <label for="job_location"><?php _e('Job Location:', 'wpbjp')?></label> 
		<br>	
            <input id="job_location" name="job_location" type="text" value="<?php echo esc_attr($item['job_location'])?>"
                   required>
        </p><p>	  
            <label for="job_openings"><?php _e('Job Openings:', 'wpbjp')?></label> 
		<br>
			<input id="job_openings" name="job_openings" type="number" value="<?php echo esc_attr($item['job_openings'])?>">
		</p>
		</div>
		<div class="form2bc">
			<p>
            <label for="job_experience"><?php _e('Job Experience:', 'wpbjp')?></label> 
		<br>	
            <input id="job_experience" name="job_experience" type="text" value="<?php echo esc_attr($item['job_experience'])?>">
        </p><p>	  
            <label for="job_joining"><?php _e('Notice Period:', 'wpbjp')?></label> 
		<br>
			<input id="job_joining" name="job_joining" type="text" value="<?php echo esc_attr($item['job_joining'])?>">
		</p>
		</div>			
		<div>		
		    <p>  
            <label for="job_description"><?php _e('Job Description:', 'wpbjp')?></label>
		    <br>
            <?php wp_editor( $item['job_description'], 'job_description' ); ?>
            <!--<textarea id="job_description" name="job_description" cols="100" rows="3" maxlength="240"><?php echo esc_attr($item['job_description'])?></textarea> -->
		    </p>
            <p>  
            <label for="job_status"><?php _e('Job Status:', 'wpbjp')?></label>
		    <br>
             <select  id="job_status" name="job_status">
                <option value = 'active' <?php if(esc_attr($item['job_status']) == 'active') echo "selected"; ?>> Active </option>
                <option value = 'inactive'<?php if(esc_attr($item['job_status']) == 'inactive') echo "selected"; ?>> InActive </option>
             </select>
		    </p>
		</div>	
		</form>
		</div>
</tbody>
<?php
}


