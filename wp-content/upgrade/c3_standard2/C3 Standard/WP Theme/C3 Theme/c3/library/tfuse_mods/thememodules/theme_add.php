<?php 

if ( !is_admin() ) {
	add_action( 'wp_print_styles', 'tfuse_add_css' );
	add_action( 'wp_print_scripts', 'tfuse_add_js' );
}
 	
/* 
This function include  files of javascript
*/	
if ( !function_exists( 'tfuse_add_js' ) ) :

	function tfuse_add_js()
	{
		$template_directory = get_template_directory_uri();

        wp_enqueue_script( 'jquery' );

		wp_register_script( 'prettyPhoto', $template_directory.'/js/jquery.prettyPhoto.js' );
		wp_enqueue_script( 'prettyPhoto' );

        wp_register_script( 'ui.core', $template_directory.'/js/ui.core.js' );
		wp_enqueue_script( 'ui.core' );

        wp_register_script( 'ui.tabs', $template_directory.'/js/ui.tabs.js' );
		wp_enqueue_script( 'ui.tabs' );

        wp_register_script( 'custom', $template_directory.'/js/custom.js' );
        wp_enqueue_script( 'custom' );

	}	// End function tfuse_add_js()

endif;



/*
This function include  files of css
*/

if ( !function_exists( 'tfuse_add_css' ) ) :

	function tfuse_add_css()
	{
		$template_directory = get_template_directory_uri();

		wp_register_style( 'prettyPhoto', $template_directory.'/css/prettyPhoto.css' );
		wp_enqueue_style( 'prettyPhoto' );

		wp_register_style( 'ui.tabs', $template_directory.'/css/ui.tabs.css' );
		wp_enqueue_style( 'ui.tabs' );

	}	// End function tfuse_add_css()
	
endif;

?>