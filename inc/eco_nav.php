<?php
add_shortcode( 'eco', 'eco_language_switcher' );
$titles = array();
$titles['de_DE'] = array();
$titles['de_DE']['fr_FR'] = 'Französisch';
$titles['de_DE']['en_US'] = 'Englisch';
$titles['en_US'] = array();
#$titles['en_US']['de_DE'] = 'Deutsch';
$titles['fr_FR'] = array();
$titles['fr_FR']['de_DE'] = 'Allemand';
#edev(bogo_available_languages());
#edev(bogo_get_language_native_name('de_DE'));
#$wpt = wp_get_available_translations();
#edev($wpt['en_GB']);
#edev(__( 'English' ));
#edev(array_keys($wpt));
function eco_language_switcher( $args = '' ) {
	global $titles;
	$args = wp_parse_args( $args, array(
		'echo' => false,
	) );
	#edev($args);
	$links = bogo_language_switcher_links( $args );
	$total = count( $links );
	$count = 0;

	$output = '';

	foreach ( $links as $link ) {
		#edev($link);
		$count += 1;
		$class = array();
		$class[] = bogo_language_tag( $link['locale'] );
		$class[] = bogo_lang_slug( $link['locale'] );
		#edev(bogo_language_tag( $link['locale'] ).'::'.bogo_lang_slug( $link['locale'] ));
		if ( get_locale() === $link['locale'] ) {
			$class[] = 'current';
			continue;
		}

		if ( 1 == $count ) {
			$class[] = 'first';
		}

		if ( $total == $count ) {
			$class[] = 'last';
		}

		$class = implode( ' ', array_unique( $class ) );

		$label = $link['native_name'] ? $link['native_name'] : $link['title'];
		if(isset($titles[get_locale()])&&isset($titles[get_locale()][$link['locale']])){
			$title = $titles[get_locale()][$link['locale']];
		}
		else
			$title = $link['title'];

		if ( empty( $link['href'] ) ) {
			continue;
			$li = esc_html( $label );
		} else {
			$atts = array(
				'rel' => 'alternate',
				'hreflang' => $link['lang'],
				'href' => esc_url( $link['href'] ),
				'title' => $title,
			);

			if ( get_locale() === $link['locale'] ) {
				$atts += array(
					'class' => 'current',
					'aria-current' => 'page',
				);
			}

			$li = sprintf(
				'<a %1$s>%2$s</a>',
				bogo_format_atts( $atts ),
				esc_html( $label )
			);
		}
		/*$li = sprintf(
			'<span class="bogo-language-name">%s</span>',
			$li
		);
		$li = sprintf(
			'<a %1$s><span class="bogo-language-name" title="%2s">%s</span>',
			$li
		);*/

		if ( apply_filters( 'bogo_use_flags', true ) ) {
			$flag = bogo_get_flag( $link['locale'] );
			$flag = preg_replace( '/(?:.*?)([a-z]+)\.png$/', '$1', $flag, 1 );
			/*$flag = sprintf(
				'<span class="bogoflags bogoflags-%s"></span>',
				$flag ? $flag : 'zz'
			);*/
			$flag = sprintf(
				'<a %2$s><span class="bogoflags bogoflags-%s"></span></a>',
				$flag ? $flag : 'zz',
				bogo_format_atts( $atts )
			);
			$li = sprintf( '<li class="%1$s" title="%2$s">%3$s</li>', $class, $title, $flag );
			#edev($li);
			#$li = sprintf( '<li class="%1$s">%3$s %2$s</li>', $class, $li, $flag );
		} else {
			$li = sprintf( '<li class="%1$s">%2$s</li>', $class, $li );
		}

		$output .= $li . "\n";
	}

	$output = '<ul class="bogo-language-switcher">' . $output . '</ul>' . "\n";

	$output = apply_filters( 'bogo_language_switcher', $output, $args );

	if ( $args['echo'] ) {
		echo $output;
	} else {
		return $output;
	}
	
}
/**
 * Simple helper function for make menu item objects
 * 
 * @param $title      - menu item title
 * @param $url        - menu item url
 * @param $order      - where the item should appear in the menu
 * @param int $parent - the item's parent item
 * @return \stdClass
 */ 
 function _custom_nav_menu_item( $title, $url, $order, $parent = 0 ){
	$item = new stdClass();
	$item->ID = 1000000 + $order + parent;
	$item->db_id = $item->ID;
	$item->title = $title;
	$item->url = $url;
	$item->menu_order = $order;
	$item->menu_item_parent = $parent;
	$item->type = '';
	$item->object = '';
	$item->object_id = '';
	$item->classes = array();
	$item->target = '';
	$item->attr_title = '';
	$item->description = '';
	$item->xfn = '';
	$item->status = '';
	return $item;
  }
?>
