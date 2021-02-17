<?php
/*
Template Name: Coming Soon Template
*/
?>
<?php get_header('coming-soon'); ?>
	<div class="main-content comingsoon">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; // end of the loop. ?>
	</div>
    <?php wp_footer(); ?>
     </div><!-- wrapper  -->
</body>