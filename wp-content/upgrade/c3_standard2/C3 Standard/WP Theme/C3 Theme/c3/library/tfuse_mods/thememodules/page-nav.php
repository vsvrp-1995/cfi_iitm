<?php 

class Custom_Walker_Nav_Sub_Menu extends Walker_Nav_Menu {

  function start_el(&$output, $item, $depth, $args) {
    global $wp_query;

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
		$class_names = $value = '';
		
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		
		if($item->object=="page") {
			$last = get_post_meta($item->object_id,PREFIX."_page_navigation_line",true);	
		} elseif ($item->object=="category") {
			$last = get_option(PREFIX."_categories_navigation_line_".$item->object_id);
		} else $last = '';
		
		if($last=='true') $last_class_name = ' last '; else $last_class_name = '';
		
		$class_names = ' class="' . esc_attr( $class_names ) .  $last_class_name .  '"';
		
		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
		
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		
		$item->title = "<span>".$item->title."</span>";
		
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;
		
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
}

function default_menu() {
	return '';
}

wp_nav_menu( array('depth' => 1, 'container_class' => 'topmenu', 'menu_class' => '', 'menu_id' => '', 'walker' => new Custom_Walker_Nav_Sub_Menu(), 'fallback_cb' => 'default_menu', 'theme_location' => 'primary' ) );

/* Add last_item class to last li in wp_nav_menu lists*/
function add_last_item_class($strHTML) {
	$intPos = strripos($strHTML,'</ul>');
	$intPos = $intPos+5;
	printf("%s <div class=\"clear\"></div> %s",
		substr($strHTML,0,$intPos),
		substr($strHTML,$intPos,strlen($strHTML))
	);
}

?>