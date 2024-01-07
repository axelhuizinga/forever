<?php
/**
 * Displays footer site info
 *
 * @package WordPress
 * @subpackage Forever
 * @since 1.0
 * @version 1.0
 */

?>
<div class="site-info">
	<?php
	if ( function_exists( 'the_privacy_policy_link' ) ) {
		//the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
		echo(forever_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' ));
	}
	?>
	<a href="<?php echo esc_url( __( 'mailto:info@paradiseprojects.de', 'forever' ) ); ?>" class="imprint">
		<?php printf('Copyright &copy; 2010-%s paradiseprojects.de', date('Y') ); ?>
	</a>
</div><!-- .site-info  printf( __( 'Proudly powered by %s', 'forever' ), 'WordPress' ); -->
