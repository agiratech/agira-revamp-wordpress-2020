<?php global $ruya_options; 
$id = get_the_ID();
$terms = wp_get_object_terms($id, 'category');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="grid-carousel-post">
	<?php
		$media_output = '';
				if (has_post_thumbnail()) {
				$media_output = '
					<figure>
					   <a href="'.get_the_permalink().'">'.get_the_post_thumbnail(get_the_ID(), "ruya-small").'</a>
					   <a class="cat-name" href="'. esc_url(get_term_link($terms[0]->slug, 'category')) .'">'.  esc_html($terms[0]->name) .'</a>
					</figure>';			
				} else{
					$media_output .= '<div class="empty_thumbnail"></div>';
				}
				$media_output .= '
				<div class="info-post">
					<h3 class="post-title"><a href="'.get_the_permalink().'"> '. get_the_title() .'</a></h3>
					<p>'. ruya_custom_excerpt($excerpt_lenght) .'</p>
					<div class="footer-info-post">
						<ul class="meta-post">
						   <li><div class="avatar"> '. get_avatar( get_the_author_meta( 'ID' ), '30', get_option( 'avatar_default', 'mystery' ), get_the_author(), array( 'class' => 'circle' ) ).' </div>'.get_the_author().'</li>
						   <li class="date">'.get_the_date().'</li>
						 </ul>
					</div>
				</div>';
		 echo '<div class="format-post">'.$media_output.'</div>' ?>
   </div>
</article>