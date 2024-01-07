<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Forever
 * @since 1.0
 * @version 1.0
 */


?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg font">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/bulma.min.css">
<link rel="preload" as="font" href="/design/fonts/linotte-semibold.woff2" type="font/woff2" crossorigin="anonymous">
<!--<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>-->
<script>
	// Check if API exists
	if (document && document.fonts) {    
	  // Do not block page loading
	  setTimeout(function () {           
		document.fonts.load('16px "Linotte-SemiBold"').then(() => {
		  // Make font using elements visible
		  document.documentElement.classList.add('font-loaded') 
		})
	  }, 0)
	} else {
	  // Fallback if API does not exist 
	  document.documentElement.classList.add('font-loaded') 
	}
</script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!---->
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'forever' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<?php if ( has_nav_menu( 'top' ) ) : ?>
			<div class="navigation-top">
				<div class="wrap">
					<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
				</div><!-- .wrap -->
			</div><!-- .navigation-top -->
		<?php endif; ?>
		<?php 
			get_template_part( 'template-parts/header/header', 'image' ); 
		?>

	</header><!-- #masthead -->

	<?php
	/*
	 * If a regular post or page, and not the front page, show the featured image.
	 * Using get_queried_object_id() here since the $post global may not be set before a call to the_post().
	 */
	if ( ( is_single() || ( is_page() && ! is_front_page() ) ) && has_post_thumbnail( get_queried_object_id() ) ) :
		echo '<div class="single-featured-image-header">';
		echo get_the_post_thumbnail( get_queried_object_id(), 'forever-featured-image' );
		echo '</div><!-- .single-featured-image-header  -->';
	endif;
	edump('forever_is_frontpage:'.(forever_is_frontpage()?'Y':'N'));
	edump('is_front_page:'.(is_front_page()?'Y':'N'));
	if(!is_front_page()){
		echo(<<<EOS
		<div class="site-content-contain">
			<div id="content" class="site-content">
		EOS);
	}
	?>
	
	





