<?php
/**
 * The template for displaying all single posts.
 *
 * @package storefront
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
		<?php  
			
			$author_id = get_the_author_meta('ID');
			$author_badge = get_field('campo_extra', 'user_'. $author_id );
			echo $author_badge;
		
		?>
		
				
		<?php while ( have_posts() ) : the_post();
		
					
			
		endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//do_action( 'storefront_sidebar' );
get_footer();
