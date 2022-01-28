<?php /* Template Name: User Profile */ 
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
	get_header(); 
	$mypod = pods( 'user' );	
	#$mypod->api->display_errors = 0;	
	if ( is_user_logged_in() ) {
		### TODO: switch form
	}
	$apiKeys = array_keys(get_object_vars($mypod->api));
	edump(implode('|',$apiKeys));
	#edump($mypod->api->field('user_category'));
	#edump($mypod->form());
	#edump(print_r(get_avatar(wp_get_current_user()),1));
	edump(wp_get_current_user());
	#edump('hi');
	$fields = array( 
		'display_name'=>array('label_de_DE'=>'Anzeigename'), 
		'user_login'=>array('label'=>'Login Name','attributes'=>array('class'=>'readonly')),
		'user_pass'=>array('label_de_DE'=>'Passwort'),
		'user_email',#=>array('required'=>0),
		'user_url'=>array('label'=>'Blog|WebSite'),
		'birthday'=>array('label_de_DE'=>'Geburtstag'),
	#	'roles',
		'user_category'=>array('label'=>'Category','label_de_DE'=>'Kategorie','description'=>'')
	);
?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php 
			 echo $mypod->form($fields, 'Register', '/thank-you/'); 			 
			?>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php
get_footer();
