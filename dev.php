<?php /* Template Name: Dev*/ 
/**
 * The template for displaying development messages
 * 
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

    #require '/var/www/econet4.me/web/wp-load.php';
/*$trans = &get_translations_for_domain('pods');
foreach($trans->entries as $k=>$tentry){
	edev($k.':'.$tentry->translations[0]);
}*/

get_header(); ?>

<div class="">
	<div id="primary" class="">
		<main id="main" class="site-main" role="main">
			<pre>
			<?php
			global $wpdb;
			#echo(wp_cache_flush().PHP_EOL);
			$api = $_GET['api'];
			preg_match('/(\w)_(\d+)/',$api, $m);
			edump($api);
			/*echo(PHP_EOL);
			print_r($m);
			echo(PHP_EOL);*/
			if($m){
				$api = $m[1];
			}
			switch($api){

				case 'cats':
				//retrieving all posts using parent id set to 1
                $parentCategoryId = 0;
                $args = array(
                    "hide_empty" => false,
                    "parent" => $parentCategoryId
                );

                //retrieve categories
                $categories = get_categories($args);

                //printing category name
                foreach($categories as $category){
                    echo $category->name." <br />";
                    print_r($categories);
                }
				break;
				case 'cf7':					
					$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}posts WHERE post_type='wpcf7_contact_form'", OBJECT );
					print_r($results);
					break;
					$m = [];
				case 'podinfo':
					#$id = explode('_', $api);
					$pod = pods( 'member_level');
					print_r($pod);
					break;
				case 'pod':
					#$id = explode('_', $api);
					$pod = pods( 'member_level');
					#print_r($pod);
					$mlID = $pod->add([
						'capability'=>'@LevelOne you can be enjoy interaction with other members and also begin2earn big if you can win new customers or members on higher levels',
						'fee'=>0,
						'level'=>'One',
						'period'=>"\u221E"
					]);
					echo $mlID.PHP_EOL;

					break;	
					case 'delpod':
						#$id = explode('_', $api);
						$pod = pods( 'member_level', 169);
						if(!$pod->exists()){
							echo "pod 169 not found".PHP_EOL;
						}
						else{
							#print_r($pod);
							$done = $pod->delete(169);
							echo $done.PHP_EOL;
						}

						
						break;									
				case 'member_lab':
					#$id = explode('_', $api);
					$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}posts WHERE ID = {$m[2]}", OBJECT );
					print_r($results);
					break;
				case 'p':
					#$id = explode('_', $api);
					$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}posts WHERE ID = {$m[2]}", OBJECT );
					print_r($results);
					break;
				case 3:
					$tree = array();
					$r = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}posts WHERE ID = 100", OBJECT );
					#print_r($r);
					#$p = $r->post_parent;
					echo(gettype($r[0]->post_parent)."|{$r[0]->post_parent}");
					echo(PHP_EOL);
					while(!is_null($r[0]->post_parent)){
						array_push($tree, "{$r[0]->ID}:{$r[0]->post_title}=>{$r[0]->post_name}");
						$r = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}posts WHERE ID = {$r[0]->post_parent}", OBJECT );
					}
					print_r($tree);
				case 4:
					echo(get_post_permalink(100).PHP_EOL);
					echo(get_permalink(100).PHP_EOL);
				break;
				case 5:
					$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}posts WHERE post_name = 'de'", OBJECT );
					print_r($results);	
				break;
				case 'poedit':
					$sql =<<<EOS
					SHOW TABLES;
					
					EOS;
					$sql =<<<EOS
					SELECT * FROM pp_options  WHERE `option_name` LIKE '%description%';

					EOS;
					echo($sql);
					$results = $wpdb->get_results( $sql, OBJECT );
					print_r($results);	
					#edump(print_r($results,1));	
				break;				
				case 'site_d':
					$description = get_bloginfo( 'description', 'display' );
					#$description = get_bloginfo( 'description', 'raw' );
					echo($description);
					echo(get_bloginfo( 'description'));
					#dumpStack(get_bloginfo( 'description', 'display' ));
					break;
				default:
					echo "no idea about $api";
			}
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
