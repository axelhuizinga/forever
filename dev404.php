<?php
/**
 * Template Name:dev404
 *
 * @package WordPress
 * @subpackage Forever
 * @since 1.0
 * @version 1.0
 */


get_header(); 
/* Produces a dump on the state of WordPress when a not found error occurs */
/* useful when debugging permalink issues, rewrite rule trouble, place inside functions.php */

ini_set( 'error_reporting', -1 );
ini_set( 'display_errors', 'On' );

#echo '<pre>';
require '/var/www/econet4.me/web/wp-load.php';
edump('hi');

add_action( 'parse_request', 'debug_404_rewrite_dump' );
function debug_404_rewrite_dump( &$wp ) {
    global $wp_rewrite;
	edump($wp_rewrite->wp_rewrite_rules());
    echo '<h2>rewrite rules</h2>';
    echo var_export( $wp_rewrite->wp_rewrite_rules(), true );

    echo '<h2>permalink structure</h2>';
    echo var_export( $wp_rewrite->permalink_structure, true );

    echo '<h2>page permastruct</h2>';
    echo var_export( $wp_rewrite->get_page_permastruct(), true );

    echo '<h2>matched rule and query</h2>';
    echo var_export( $wp->matched_rule, true );

    echo '<h2>matched query</h2>';
    echo var_export( $wp->matched_query, true );

    echo '<h2>request</h2>';
    echo var_export( $wp->request, true );

    global $wp_the_query;
    echo '<h2>the query</h2>';
    echo var_export( $wp_the_query, true );
}
add_action( 'template_redirect', 'debug_404_template_redirect', 99999 );
function debug_404_template_redirect() {
    global $wp_filter;
    echo '<h2>template redirect filters</h2>';
    echo var_export( $wp_filter[current_filter()], true );
}
add_filter ( 'template_include', 'debug_404_template_dump' );
function debug_404_template_dump( $template ) { 
	edump($template);
    echo '<h2>template file selected</h2>';
    echo var_export( $template, true );
    
    echo '</pre>';
    exit();
}
?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops!', 'forever' ); ?></h1>
				</header><!-- .page-header -->
				<div class="page-content">
					<p><?php _e( 'It looks like we get more info soon :)', 'forever' ); ?></p>

					<?php get_search_form(); ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php

get_footer();
