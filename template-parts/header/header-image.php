<?php
/**
 * Displays header media
 *
 * @package WordPress
 * @subpackage Forever
 * @since 1.0
 * @version 1.0
 */
edump(__FILE__);
	if(is_front_page()){
		echo('<div class="custom-header custom-header-front">');
		get_template_part( 'template-parts/header/site', 'branding' );
		echo('</div><!-- .custom-header -->');
	}
?>

