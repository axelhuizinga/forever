<?php /* Template Name: Mobile Data*/ 
/**
 * The template for displaying register/login/profile pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Forever
 * @since 1.0
 * @version 1.0
 */
#edev(load_plugin_textdomain('pods'));

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<pre>HI :)
			<?php
				
			?>
			</pre>
			<?php 
				echo the_content();
			 #echo $mypod->form($fields, 'Register', '/thank-you-for-submitting/?new_id=X_ID_X'); 
			 
			?>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php
get_footer();
