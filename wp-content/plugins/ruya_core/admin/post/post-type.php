<?php
/*-----------------------------------------------*
  Portfolio Post Type
/*-----------------------------------------------*/
add_action('init', 'th_portfolio_register');  
function th_portfolio_register() {
	$labels = array(
        'name'               => esc_html__( 'Portfolio' , 'ruya' ),
        'singular_name'      => esc_html__( 'Portfolio' , 'ruya' ),
        'add_new'            => esc_html__( 'Add New' , 'ruya' ),
        'add_new_item'       => esc_html__( 'Add New Portfolio item' , 'ruya' ),
        'edit_item'          => esc_html__( 'Edit Portfolio item' , 'ruya' ),
        'new_item'           => esc_html__( 'New Portfolio item' , 'ruya' ),
        'all_items'          => esc_html__( 'All Portfolio items' , 'ruya' ),
        'view_item'          => esc_html__( 'View Portfolio item' , 'ruya' ),
        'search_items'       => esc_html__( 'Search Portfolio item' , 'ruya' ),
        'not_found'          => esc_html__( 'No products found' , 'ruya' ),
        'not_found_in_trash' => esc_html__( 'No products found in the Trash' , 'ruya' ),
        'parent_item_colon'  => '',
        'menu_name'          => esc_html__('Portfolio','ruya')
    );
    $args = array(
		'labels'    => $labels,
		'menu_icon' => 'dashicons-format-gallery',
        'public' => true,
        'show_ui' => true,
        'hierarchical' => true,
        'rewrite' => true,
        'supports' => array('title','editor','thumbnail')
       );  
    register_post_type( 'portfolio' , $args );
    register_taxonomy(
    	"project-type", 
    	array("portfolio"), 
    	array(
    		"hierarchical" => true, 
    		"context" => "normal", 
    		'show_ui' => true,
    		"label" => "Portfolio Categories", 
    		"singular_label" => "Portfolio Category", 
    		"rewrite" => true
    	)
    );
}

add_filter( 'manage_edit-portfolio_columns', 'th_portfolio_columns_settings' ) ;
function th_portfolio_columns_settings( $columns ) {
	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __('Title', 'ruya'),
		'category' => __( 'Category', 'ruya'),
		'date' => __('Date', 'ruya'),
		'thumbnail' => ''	
	);
	return $columns;
}

add_action( 'manage_portfolio_posts_custom_column', 'th_portfolio_columns_content', 10, 2 );
function th_portfolio_columns_content( $column, $post_id ) {
	global $post;
	switch( $column ) {
		case 'category' :
			$taxonomy = "project-type";
			$post_type = get_post_type($post_id);
			$terms = get_the_terms($post_id, $taxonomy);
			if ( !empty($terms) ) {
				foreach ( $terms as $term )
					$post_terms[] = "<a href='edit.php?post_type={$post_type}&{$taxonomy}={$term->slug}'> " . esc_html(sanitize_term_field('name', $term->name, $term->term_id, $taxonomy, 'edit')) . "</a>";
				echo join( ', ', $post_terms );
			}
			else echo '<i>No categories.</i>';
			break;
		case 'thumbnail' :
			the_post_thumbnail('thumbnail', array('class' => 'column-img'));
			break;
		default :
			break;
	}
}

function isAssoc($arr){
    return array_keys($arr) !== range(0, count($arr) - 1);
}
function th_create_dropdown($name,$elements,$current_value,$folds = NULL) {
    $folds_class = $selected = '';
    if($folds) $folds_class = ' portfolios';
    echo '<select id="nnn" name="'.$name.'" class="select'.$folds_class.'">';
    if(isAssoc($elements)) {
        foreach($elements as $title => $key) {
            if($key == $current_value) $selected = 'selected';
            echo '<option value="'.$key.'"'.$selected.'>'.$title.'</option>';
            $selected = '';
        }
    } else {
        foreach($elements as $key) {
            if($key == $current_value) $selected = 'selected';
            echo '<option value="'.$key.'"'.$selected.'>'.$key.'</option>';
            $selected = '';
        }
    }
    echo '</select>';
}


add_action("admin_init", "th_portfolio_extra_settings");   
function th_portfolio_extra_settings(){
    add_meta_box("portfolio_extra_settings", "Portfolio Post Settings", "th_portfolio_extra_settings_config", "portfolio", "normal", "high");
}   
function th_portfolio_extra_settings_config(){
        global $post;
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
        $custom = get_post_custom($post->ID);
        $link_type = $link_url = $url = '';
		
		if (isset($custom["url"][0])) {
			$url = sanitize_text_field($custom["url"][0]);
		}
		if (isset($custom["link_url"][0])) {
			$link_url = sanitize_text_field($custom["link_url"][0]);
		}
		if(isset($custom["link_type"][0])) $link_type = $custom["link_type"][0];
        if(isset($custom["link_url"][0])) $link_url;
        if(isset($custom["url"][0])) $url;
?>
	<div class="metabox-options form-table fullwidth-metabox">
		<div class="metabox-option">
			<h6><?php _e('Thumbnail Link Type', 'ruya') ?>:</h6>
            <?php
            $link_type_arr = array(
				'Single Page - Opens a progect page' => 'single_page',
				'Default - Is opening in a Lightbox' => 'lightbox', 
				'Video Link - Is opening a Video in a Lightbox' => 'direct', 
				'External Link - Opens a Custom Link' => 'external'
			);
            th_create_dropdown('link_type',$link_type_arr,$link_type, true); ?>
            <p class="description"><?php echo esc_html_e('Choose what thumbnail does.', 'ruya') ?></p>
        </div>
        <div class="metabox-option video-link">
            <h6><?php esc_html_e('Video link', 'ruya') ?>:</h6>
            <input type="text" name="link_url" value="<?php echo esc_attr($link_url); ?>">
            <p class="description"><?php echo esc_html_e('You can set the thumbnail to open a video from third-party websites(Vimeo, YouTube) in an URL. Ex: http://www.youtube.com/watch?v=y6Sxv-sUYtM', 'ruya') ?></p>
        </div>
        <div class="metabox-option ext-link">
        <h6><?php esc_html_e('External link', 'ruya') ?>:</h6>
        <input type="text" name="url" value="<?php echo esc_attr($url); ?>">
        <p class="description"><?php echo esc_html_e('You can set the thumbnail to open a custom link.', 'ruya') ?></p>
        </div>
	</div>
<?php }

// Save Custom Fields
add_action('save_post', 'th_save_portfolio_post_settings'); 
function th_save_portfolio_post_settings(){
    global $post;  

    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return $post_id;
	}else{
	    if (isset($_POST["link_url"])) {
            $link_url = sanitize_text_field($_POST["link_url"]);
        }
		if (isset($_POST["url"])) {
            $url = sanitize_text_field($_POST["url"]);
        }
		if(isset($_POST["link_type"])) update_post_meta($post->ID, "link_type", $_POST["link_type"]);
		if(isset($_POST["link_url"])) update_post_meta($post->ID, "link_url", $link_url);
		if(isset($_POST["url"])) update_post_meta($post->ID, "url", $url);
    }
}