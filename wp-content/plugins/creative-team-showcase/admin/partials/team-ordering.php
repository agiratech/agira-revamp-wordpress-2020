<?php
wp_enqueue_script($this->prefix . 'admin-select2');
wp_enqueue_style($this->plugin_name . '-admin-main');
wp_enqueue_script($this->prefix . 'admin-main-js');
$team_query = new WP_Query(array(
    'post_type' => 'ctshowcase_member' ,
    'posts_per_page' => -1 , 
    'orderby' => 'menu_order ID',
    'order' => 'DESC'
));
?>
<h4 style="display: inline-block;
    border-bottom: 1px solid #000;
    padding: 10px;">
    <?php _e('Drag and Drop Team Order' ,'ctshowcase'); ?> 
</h4>
<?php
if ($team_query->have_posts()): ?>
    <div data-team_no = "<?php echo $team_query->post_count; ?>" class="sortable-team-row"> 
<?php
    while($team_query->have_posts()) : $team_query->the_post();
        $team_member_id = get_the_ID();
        $team_image_id = get_post_thumbnail_id();
        if ($team_image_id) {
            $team_member_image = wp_get_attachment_image_src($team_image_id, 'thumbnail' );
            $team_member_image = $team_member_image[0];
        }
        $team_member_name = get_the_title();
         ?>

        <div class="sortable-team-member" id="<?php the_ID();?>" >
            <img class="profile-image" style="width:50px" src="<?php echo $team_member_image; ?>" />
            <span class="team-member-name"> <?php echo $team_member_name; ?></span>
        </div>
<?php
    endwhile;
?>
    </div>
    <button class="save-team-ordering button-primary"> Save </button>
    <button class="cancel-team-ordering button-primary"> Cancel </button>
<?php
    
endif;