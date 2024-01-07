<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Forever
 * @since 1.0
 * @version 1.0
 */
edump(__FILE__);
?>
<div class="site-branding">

	<?php the_custom_logo(); ?>

	<div class="site-branding-text">
		<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
		<?php
		$description = get_bloginfo( 'description', 'display' );
		#$description = get_bloginfo( 'description' );
		#dumpStack($description);
		#edump($description);
		if ( $description || is_customize_preview() ) :
			?>
			<p class="site-description"><?php echo $description; ?></p>
		<?php endif; 
			#get_template_part( 'template-parts/footer/site', 'info' );
			?>

	</div><!-- .site-branding-text  -->

</div><!-- .site-branding -->
