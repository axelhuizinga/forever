<?php /* Template Name: Login */ 
/**
 * The template for displaying a frontend only user login form
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

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main loginform" role="main">

			<?php
			#$content = the_content();
			#echo($content);
			$login  = (isset($_GET['login']) ) ? $_GET['login'] : 0;
			if ( $login === "failed" ) {
				echo '<p class="login-msg"><strong>ERROR:</strong> Invalid username and/or password.</p>';
			  } elseif ( $login === "empty" ) {
				echo '<p class="login-msg"><strong>ERROR:</strong> Username and/or Password is empty.</p>';
			  } elseif ( $login === "false" ) {
				echo '<p class="login-msg"><strong>ERROR:</strong> You are logged out.</p>';
			  }
			$args = array(
				'redirect' => home_url()
			);
				wp_login_form($args);
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php
get_footer();
