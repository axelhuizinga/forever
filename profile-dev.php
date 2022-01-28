<?php /* Template Name: User Profile Dev*/ 
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

require '/var/www/econet4.me/web/wp-load.php';
edump(load_plugin_textdomain('pods'));
/*$trans = &get_translations_for_domain('pods');
foreach($trans->entries as $k=>$tentry){
	edev($k.':'.$tentry->translations[0]);
}*/

get_header(); ?>

<div class="">
	<div id="primary" class="">
		<main id="main" class="site-main" role="main">
		<?php echo do_shortcode( '[bogo]' ); ?>
			<pre>
			<?php
				$mypod = pods( 'user' );				
				#echo print_r(pods_field_raw($mypod, 'user_category'),1); 
				#echo print_r($mypod->fields('user_category'),1); 
				
				#echo print_r($mypod->display('user_category'),1); 
				#echo print_r($mypod,1); 
				#echo print_r(get_class_methods('Pods'),1); 
				#echo print_r($mypod->form());
				$fields = array( 
					'display_name', 
					'user_login'=>array('label'=>'Login Name','attributes'=>array('class'=>'readonly')),
					'user_pass',
					'user_email'=>array('required'=>0),
					'user_url'=>array('label'=>'Blog|WebSite'),
					'birthday',
					'role',
					'user_category'=>array('label'=>'User Category','description'=>'')
				);
				#echo var_dump($mypod->display($fields)); 
				#print_r(array_keys($mypod->fields('birthday')));
				print_r($mypod->fields('roles'));
				#print_r($mypod->fields('type'));
				#print_r($mypod);
				#print_r(array_keys($mypod->fields('type')));
				echo('---<br>');
				global $wp_roles;
		
				$all_roles = $wp_roles->roles;
				echo(implode('|',array_keys($all_roles)));
				echo('---<br>');
				echo(implode('|',array_keys(EcoNet::get_registration_form_roles())));
			?>
			</pre>
			<?php 
				#echo the_content();
			 #echo $mypod->form($fields, 'Register', '/thank-you-for-submitting/?new_id=X_ID_X'); 


			?>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php
get_footer();
