<?php
class ruya_news_slider_widget extends Ruya_Widget {
	function __construct() {
		parent::__construct(
			'mo_news_slider', 
			esc_html__( 'Ruya - News slider', 'ruya'), 
			array('description' => esc_html__('Display a slider of your posts on your site.', 'ruya'),) 
        );
		
		$this->settings  = array(
			'title'  => array(
				'type'  => 'text',
				'std'   => esc_html__( 'News Slider', 'ruya' ),
				'label' => esc_html__( 'Title', 'ruya' )
			),
			'category' => array(
				'type'   => 'mo_taxonomy',
				'std'    => '',
				'label'  => esc_html__( 'Categories', 'ruya' ),
			),
			'posts_per_page' => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 2,
				'max'   => '',
				'std'   => 3,
				'label' => esc_html__( 'Number of slider to show', 'ruya' )
			),
			'orderby' => array(
				'type'  => 'select',
				'std'   => 'none',
				'label' => esc_html__( 'Order by', 'ruya' ),
				'options' => array(
					'none'   => esc_html__( 'None', 'ruya' ),
					'comment_count'  => esc_html__( 'Comment Count', 'ruya' ),
					'title'  => esc_html__( 'Title', 'ruya' ),
					'date'   => esc_html__( 'Date', 'ruya' ),
					'ID'  => esc_html__( 'ID', 'ruya' ),
				)
			),
			'order' => array(
				'type'  => 'select',
				'std'   => 'none',
				'label' => esc_html__( 'Order', 'ruya' ),
				'options' => array(
					'none'  => esc_html__( 'None', 'ruya' ),
					'asc'  => esc_html__( 'ASC', 'ruya' ),
					'desc' => esc_html__( 'DESC', 'ruya' ),
				)
			),
		);
		 add_action('admin_enqueue_scripts', array($this, 'widget_scripts'));
	}
        
	function widget_scripts() {
		wp_enqueue_script('widget_scripts', RUYA_JS . 'widgets.js');
	}
	
	function widget( $args, $instance ) {
		ob_start();
		global $post;
		extract( $args );
		$title                  = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
		$category               = isset($instance['category'])? $instance['category'] : '';
		$posts_per_page         = absint( $instance['posts_per_page'] );
		$orderby                = sanitize_title( $instance['orderby'] );
		$order                  = sanitize_title( $instance['order'] );
                
		echo ''.$before_widget;
		if ( $title )
				echo ''.$before_title . $title . $after_title;
		
		$query_args = array(
			'posts_per_page' => $posts_per_page,
			'orderby' => $orderby,
			'order' => $order,
			'post_type' => 'post',
			'post_status' => 'publish');
		if (isset($category) && $category != '') {
			$cats = explode(',', $category);
			$category = array();
			foreach ((array) $cats as $cat) :
			$category[] = trim($cat);
			endforeach;
			$query_args['tax_query'] = array(
									array(
										'taxonomy' => 'category',
										'field' => 'id',
										'terms' => $category
									)
							);
		}
		$wp_query = new WP_Query($query_args);                
		if ($wp_query->have_posts()){ ?>
			<div class="mo-news-slider">
				<div class="owl-carousel grid-carousel-post dots-center dark" data-col_lg="1" data-col_md="1" data-col_sm="1" data-col_xs="1" data-item_space="30" data-loop="true" data-autoplay="false" data-smartspeed="700" data-nav="false" data-dots="true">
					<?php while ($wp_query->have_posts()){ $wp_query->the_post(); ?>
                    <div class="post overlay-post">
                        <article <?php post_class(); ?>>
							<div class="img-perspective">
                                   <?php if( has_post_thumbnail() ){
                                        $thumbnail_data = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
                                        echo '<a href="'.get_the_permalink().'"><div class="mo-thumb" style="background: url('.esc_url($thumbnail_data[0]).') no-repeat center center / cover, #333"></div></a>';
                                    }?>
                                <div class="perspective_overlay"></div>
								<div class="perspective-caption">
									<p class="perspective-description"><?php echo get_the_date(); ?></p>
									<h3 class="perspective-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								</div>
							</div>
					   </article>
					</div>	
					<?php } ?>
				</div>
			</div>
		<?php }
		wp_reset_postdata();
		echo ''.$after_widget;
		$content = ob_get_clean();
		echo ''.$content;
	}
}
/* Class ruya_news_slider_widget */
function ruya_news_slider_widget() {
    register_widget('ruya_news_slider_widget');
}
add_action('widgets_init', 'ruya_news_slider_widget');