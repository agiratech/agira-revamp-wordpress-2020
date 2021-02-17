<?php
class ruya_recent_work_widget extends Ruya_Widget {
	function __construct() {
		parent::__construct(
			'mo_recent_work', // Base ID
			esc_html__( 'Ruya - Recent Work', 'ruya'), // Name
			array('description' => esc_html__('Display a list of portfolio work  on your site.', 'ruya'),) // Args
        );
		$this->settings = array(
			'title'  => array(
				'type'  => 'text',
				'std'   => esc_html__( 'Recent Work', 'ruya' ),
				'label' => esc_html__( 'Title', 'ruya' )
			),
			'project-type' => array(
				'type'   => 'mo_taxonomy',
				'std'    => '',
				'label'  => esc_html__( 'Categories', 'ruya' ),
			),
			'posts_per_page' => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 1,
				'max'   => '',
				'std'   => 8,
				'label' => esc_html__( 'Number of posts to show', 'ruya' )
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
			'el_class'  => array(
				'type'  => 'text',
				'std'   => '',
				'label' => esc_html__( 'Extra Class', 'ruya' )
			)
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
		$category               = isset($instance['project-type'])? $instance['project-type'] : '';
		$posts_per_page         = absint( $instance['posts_per_page'] );
		$orderby                = sanitize_title( $instance['orderby'] );
		$order                  = sanitize_title( $instance['order'] );
		$el_class               = sanitize_title( $instance['el_class'] );
                
		echo ''.$before_widget;
		if ( $title )
				echo ''.$before_title . $title . $after_title;
		
		$query_args = array(
			'posts_per_page' => $posts_per_page,
			'orderby' => $orderby,
			'order' => $order,
			'post_type' => 'portfolio',
			'post_status' => 'publish');
		if (isset($category) && $category != '') {
			$cats = explode(',', $category);
			$category = array();
			foreach ((array) $cats as $cat) :
			$category[] = trim($cat);
			endforeach;
			$query_args['tax_query'] = array(
									array(
										'taxonomy' => 'project-type',
										'field' => 'id',
										'terms' => $category
									)
							);
		}
		$wp_query = new WP_Query($query_args);	
		if ($wp_query->have_posts()){ ?>
			<div class="mo-recent-work">
				<div class="owl-carousel" data-col_lg="3" data-col_md="3" data-col_sm="3" data-col_xs="3" data-item_space="0" data-loop="true" data-autoplay="true" data-smartspeed="700" data-nav="false" data-dots="false">
				<?php
					$count = $wp_query->post_count;
					$i = 0; 
					while ($wp_query->have_posts()){ $wp_query->the_post();
						if($i % 2 == 0) echo '<div class="mo-items">';
						?>
                         <figure class="mo-item widget-effect">
							<?php if( has_post_thumbnail() ) the_post_thumbnail('thumbnail');?>
                            
                            <div class="overlay-effect1"></div>
                            <div class="overlay-zoom">
                                 <?php
                            $title=get_the_title();
                            $full = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ); ?>
                            <a class="portfolio-link lightbox-gallery" href="<?php echo $full; ?>"><i class='fa fa-link'></i></a> 
                            </div>
                        </figure>
						<?php
						if($i % 2 == 1 || $i == $count - 1) echo '</div>';
						$i++;
					} ?>
				</div>
			</div>
		<?php 
		}
		wp_reset_postdata();
		echo ''.$after_widget;
		$content = ob_get_clean();
		echo ''.$content;
	}
}
function ruya_recent_work_widget() {
    register_widget('ruya_recent_work_widget');
}
add_action('widgets_init', 'ruya_recent_work_widget');