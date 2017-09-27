<?php
/*
Template Name: Home Page
*/


//include("header2.php");
get_header(); ?>

<!--<div class="site-search">
	<?php the_widget( 'WC_Widget_Product_Search', 'title=' ); ?>
</div>

<ul class="site-header-cart menu">
	<li class="<?php echo esc_attr( $class ); ?>">
		<?php storefront_cart_link(); ?>
	</li>
	<li>
		<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
	</li>
</ul>

<nav class="secondary-navigation" role="navigation" aria-label="<?php esc_html_e( 'Secondary Navigation', 'storefront' ); ?>">
    <?php
	    wp_nav_menu(
		    array(
			    'theme_location'	=> 'secondary',
			    'fallback_cb'		=> '',
		    )
	    );
    ?>-->
</nav><!-- #site-navigation -->
	
	<div id="primaryB" class="content-area">
		<div id="img-principal">		
			<?php if( function_exists('cyclone_slider') ) cyclone_slider('123'); ?>
		</div>	
		<main id="main" class="site-main" role="main">
			
			<a href="http://">
				<h2>APARATOLOGÍA</h2>
			</a>
			
			<a href="http://">
				<h2>BLANQUEAMIENTO</h2>
			</a>
			
			<a href="http://">
				<h2>CEMENTO</h2>
			</a>
			
			<a href="http://">
				<h2>CEPILLOS</h2>
			</a>
			
			<a href="http://">
				<h2>COMPLEMENTOS</h2>
			</a>
			
			<a href="http://">
				<h2>DESINFECCIÓN</h2>
			</a>
			
			<a href="http://">
				<h2>ESTUDIANTES</h2>
			</a>
			
			<a href="http://">
				<h2>ENDODONCIA</h2>
			</a>
			
			<a href="http://">
				<h2>FRESAS</h2>
			</a>
			
			<a href="http://">
				<h2>ODONTOLOGÍA</h2>
			</a>
			
			<a href="http://">
				<h2>ORTODONCIA</h2>
			</a>
			
			<a href="http://">
				<h2>PERNOS</h2>
			</a>
			
			<a href="http://">
				<h2>PODOLOGÍA</h2>
			</a>
			
			<a href="http://">
				<h2>PROTÉSICOS</h2>
			</a>
			
			<a href="http://">
				<h2>SILICONA</h2>
			</a>
			
			<a href="http://">
				<h2>VETERINARIA</h2>
			</a>
			
			<a href="http://">
				<h2>INSTRUMENTAL</h2>
			</a>
			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
