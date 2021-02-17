<?php 
	$id = get_the_ID();
	$terms = wp_get_object_terms($id, 'category'); 
?>
 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="grid-left-post">
   
    <div class="format-post">
		<?php if (has_post_thumbnail()) { ?>
		<figure> <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('ruya-small');?></a></figure>		
		<?php  } else{ ?>
		   <div class="empty_thumbnail"></div>
		<?php  } ?>
	</div>					
		
	<div class="info-post">
		<a class="cat-name" href="<?php esc_url(get_term_link($terms[0]->slug, 'category')) ?>"><?php echo esc_html($terms[0]->name); ?></a>
		<h3 class="post-title"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h3>
		<p><?php echo ruya_custom_excerpt($excerpt_lenght); ?></p>
		<div class="footer-info-post">
		    <ul class="meta-post">
			   <li><div class="avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), '30', get_option( 'avatar_default', 'mystery' ), get_the_author(), array( 'class' => 'circle' ) ); ?> </div><?php echo get_the_author(); ?></li>
			   <li class="date"><?php echo get_the_date(); ?></li>
			 </ul>
		</div
	</div>
  </div>
 
 </div> 
</article>