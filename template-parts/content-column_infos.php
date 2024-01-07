 <?php
/**
 * Template part for displaying page content in infos.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Forever
 * @since 1.0
 * @version 1.0
 */
#require '/var/www/econet4.me/web/wp-load.php';
#edump('hi');

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!--<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php forever_edit_link( get_the_ID() ); ?>
	</header> .entry-header -->
	<div class="center-grid">
		<?php
			the_content();
 			#edump($post);
			?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
