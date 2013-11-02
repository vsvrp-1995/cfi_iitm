<?php
/* Initializes all the theme settings option fields for admin area. */ 	
function admin_option_fields(){
	global $admin_options, $tfuse;	
	$prefix = $tfuse->prefix;
	
	$admin_options = array();  
  	
	/* General Tab */
 	$admin_options[] = array( 	"name"  	=> "General",
								"type"  	=> "tab",
								"id"    	=> "general");
	
	/* General Settings Panel */
	$admin_options[] = array( 	"name"  	=> "General Settings",
								"type"  	=> "heading");
	
	// Custom Logo Option  
	 $admin_options[] = array( "name" 		=> "Custom Logo",
								"desc" 		=> "Upload a logo for your theme, or specify the image address of your online logo. (http://yoursite.com/logo.png)",
								"id" 		=> "{$prefix}_logo",
								"std" 		=> "",
								"type" 		=> "upload"); 
	 
	// Custom Favicon Option  
	$admin_options[] = array( 	"name"  	=> "Custom Favicon",
								"desc"  	=> "Upload a 16px x 16px Png/Gif image that will represent your website's favicon.",
								"id"    	=> "{$prefix}_custom_favicon",
								"std"   	=> "",
								"type"  	=> "upload"); 
	
	// Tracking Code Option  
	$admin_options[] = array( 	"name"  	=> "Tracking Code",
								"desc"  	=> "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
								"id"    	=> "{$prefix}_google_analytics",
								"std"   	=> "",
								"type"  	=> "textarea");        
	
	// RSS URL Option  
	$admin_options[] = array( 	"name"  	=> "RSS URL",
								"desc"  	=> "Enter your preferred RSS URL. (Feedburner or other)",
								"id"    	=> "{$prefix}_feedburner_url",
								"std"   	=> "",
								"type"  	=> "text");
	// E-Mail URL Option  
	$admin_options[] = array(	"name"  	=> "E-Mail URL",
								"desc"  	=> "Enter your preferred E-mail subscription URL. (Feedburner or other)",
								"id"    	=> "{$prefix}_feedburner_id",
								"std"   	=> "",
								"type"  	=> "text");
	
	// Custom CSS Option  
	$admin_options[] = array( 	"name"  	=> "Custom CSS",
							  	"desc"  	=> "Quickly add some CSS to your theme by adding it to this block.",
								"id"    	=> "{$prefix}_custom_css",
								"std"   	=> "",
								"type"  	=> "textarea");
	
	/* Sidebar Panel */
	$admin_options[] = array(	"name"  	=> "Sidebar",
					    	  	"type"  	=> "heading"); 

	// Extra Widget Areas for specific Pages Option  
 	$admin_options[] = array(	"name"  	=> "Extra Widget Areas for specific Pages",
								"desc"  	=> "Here you can add widget areas for single pages. That way you can put different content for each page into your sidebar.<br/>
												After you have choosen the Pages press the 'Save Changes' button and then start adding widgets to your new widget areas <a href='widgets.php'>here</a>.<br/><br/>
												<strong>Attention</strong> when removing areas: You have to be carefull when deleting widget areas that are not the last one in the list.<br/> It is recommended to avoid this. If you want to know more about this topic please read the documentation that comes with this theme.<br/>",
								"id"    	=> "{$prefix}_multi_widget_pages",
								"type"  	=> "multi",
								"subtype" 	=> "page");
	
	// Extra Widget Areas for specific Categories Option  
	$admin_options[] = array(	"name"  	=> "Extra Widget Areas for specific Categories",
								"desc"  	=> "Here you can add widget areas for single categories. That way you can put different content for each category into your sidebar.<br/>
												After you have choosen the Categories press the 'Save Changes' button and then start adding widgets to your new widget areas <a href='widgets.php'>here</a>.<br/><br/>
												<strong>Attention</strong> when removing areas: You have to be carefull when deleting widget areas that are not the last one in the list.<br/> It is recommended to avoid this. If you want to know more about this topic please read the documentation that comes with this theme.<br/>",
								"id"    	=> "{$prefix}_multi_widget_categories",
								"type"  	=> "multi",
								"subtype" 	=> "category");
	
	// Extra Widget Areas for specific Posts  
	$admin_options[] = array(	"name"  	=> "Extra Widget Areas for specific Posts",
								"desc"  	=> "Here you can add widget areas for single post. That way you can put different content for each post into your sidebar.<br/>
												After you have choosen the Posts press the 'Save Changes' button and then start adding widgets to your new widget areas <a href='widgets.php'>here</a>.<br/><br/>
												<strong>Attention</strong> when removing areas: You have to be carefull when deleting widget areas that are not the last one in the list.<br/> It is recommended to avoid this. If you want to know more about this topic please read the documentation that comes with this theme.<br/>",
								"id"    	=> "{$prefix}_multi_widget_posts",
								"type"  	=> "multi",
								"subtype" 	=> "post");
	

	/* Disable SEO options Panel */
	$admin_options[] = array(   "name"  	=> "Disable SEO options",
								"type"  	=> "heading");

	// Disable SEO options Option
	$admin_options[] = array(	"name"  	=> "Disable SEO",
								"desc"  	=> "Disable framework SEO options",
								"id"    	=> "{$prefix}_deactivate_tfuse_seo",
								"std"   	=> "false",
								"type"  	=> "checkbox");
	
	/* Dynamic Images Panel */
	$admin_options[] = array( 	"name"  	=> "Dynamic Images",
								"type"  	=> "heading");    
	
	// Enable Dynamic Image Resizer Option  
	$admin_options[] = array( 	"name"  	=> "Enable Dynamic Image Resizer",
								"desc"  	=> "This will enable the thumb.php script. It dynamicaly resizes images on your site.",
								"id"    	=> "{$prefix}_resize",
								"std"   	=> "false",
								"type"  	=> "checkbox");

	 /* Footer Tab */
	$admin_options[] = array( 	"name"  	=> "Posts",
								"type"  	=> "tab",
								"id"    	=> "posts");


    $admin_options[] = array(   "name"  	=> "Thumbnail Posts Options",
								"type"  	=> "heading");

	// Sidebar Position
	$admin_options[] = array( 	"name"  	=> "Default Thumbnail Posts Position",
								"desc"  	=> "Select your preferred Thumbnail Posts Position.",
								"id"    	=> "{$prefix}_thumbnail_posts_position",
								"std"   	=> "alignright",
                                "options" 	=> array("alignleft" =>"Left Posts Thumbnail", "alignright" =>"Right Post Thumbnail"),
								"type"  	=> "select");

    $admin_options[] = array( 	"name" 		=> "Posts Thumbnail Width ",
                                "desc" 		=> "Done Posts Thumbnail Width.",
                                "id" 		=> "{$prefix}_thumbnail_posts_width",
                                "std" 		=> "580",
                                "type" 		=> "text");

    $admin_options[] = array( 	"name" 		=> "Posts Thumbnail Height ",
                                "desc" 		=> "Done Posts Thumbnail Height.",
                                "id" 		=> "{$prefix}_thumbnail_posts_height",
                                "std" 		=> "349",
                                "type" 		=> "text");

 	/* Sliders Tab */
 	$admin_options[] = array( 	"name"  	=> "Sliders",
								"type"  	=> "tab",
								"id"    	=> "sliders");
	
	/* Homepage slider Panel */
	$admin_options[] = array( 	"name"  	=> "Homepage slider",
								"type"  	=> "heading");
	
	/* Homepage Slider Option */
	$admin_options[] = array( 	"name" 		=> "Homepage Slider",
								"desc" 		=> "Add images for slideshow",
								"id" 		=> "{$prefix}_homepage_slider",
								"std" 		=> "",
								"type"		=> "slider",
								"c_field"	=> "{$prefix}_post_slider_image",
								"fields"	=> array( 
													array(	'id' 		=> 'slider_name',
															'desc' 		=> 'type here image name',
															'type' 		=> 'text',
															'std' 		=> ''),
													
													array(  'id' 		=> 'slider_description',
															'desc' 		=> 'type here images description',
															'type' 		=> 'textarea',
															'std' 		=> ''),
													
													array(	'id' 		=> 'slider_link',
															'desc' 		=> 'http://',
															'type' 		=> 'text',
															'std' 		=> ''),
													
													array(  'id' 		=> 'slider_icon',
															'desc' 		=> 'type here icon url',
															'type'		=> 'text',
															'std' 		=> ''),
													
													array(  'id' 		=> 'slider_icon_title',
															'desc' 		=> 'type here icon title',
															'type'		=> 'text',
															'std' 		=> '')     ));
	
	$admin_options[] = array(	"name" 		=> "Homepage Slider Entries (Slider)",
								"desc" 		=> "Select the number of entries that should appear in the Homepage Slider.",
								"id" 		=> "{$prefix}_homepage_slider_entries",
								"std" 		=> "3",
								"type" 		=> "select",
								"options" 	=> array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19"));
	
	$admin_options[] = array(	"name" 		=> "Slider Timeout ",
								"desc" 		=> "The time in <b>seconds</b> between frames will take e.g. 5",
								"id" 		=> "{$prefix}_homepage_slider_timeout",
								"std" 		=> 5,
								"type" 		=> "text");
	
	/* HomePage Tab */
	$admin_options[] = array( 	"name"  	=> "Homepage",
								"type"  	=> "tab",
								"id"    	=> "homepage");
	
	/* HomePage - Boxes Panel */
	$admin_options[] = array(   "name"  	=> "Homepage Options",
								"type"  	=> "heading");  
	
	// HomePage - Featured Post 
	$admin_options[] = array( 	"name" 		=> 	"Homepage Featured Post",
								"desc" 		=> "Add the tag that you would like to have displayed in the homepage featured post section.",
								"id" 		=> "{$prefix}_featured_post",
								"std" 		=> "",
								"type" 		=> "select",
								"options" 	=> tfuse_tags());
	
	// HomePage - Boxes Option  
	$admin_options[] = array(	"name" 		=> "HomePage - Box",
								"desc" 		=> "How to populate HomePage - Box",
								"id"   		=> "{$prefix}_home_box",
								"type" 		=> "boxes",
								"count"		=> 2);
	
	/* Categories Tab */
	$admin_options[] = array( 	"name"  	=> "Categories",
								"type"  	=> "tab",
								"id"    	=> "categories");
	
	/* General Panel */
	$admin_options[] = array(   "name"  	=> "General",
								"type"  	=> "heading");
	
	// Disable posts lightbox (prettyPhoto) Option  
	$admin_options[] = array(	"name"  	=> "Disable lightbox (prettyPhoto)",
								"desc"  	=> "Disable lightbox (prettyPhoto)",
								"id"    	=> "{$prefix}_disable_lightbox",
								"std"   	=> "false",
								"type"  	=> "checkbox");	
	
	/* Pages Tab */
	$admin_options[] = array( 	"name"  	=> "Pages",
								"type"  	=> "tab",
								"id"    	=> "pages");
	
	/* Contact Page Panel */
	$admin_options[] = array(   "name"  	=> "Contact Page",
								"type"  	=> "heading");    
	
	// Contact Page Option  
	$admin_options[] = array(	"name"  	=> "Contact Page",
								"desc"  	=> "Select Contact Page",
								"id"    	=> "{$prefix}_contact_page",
								"std"   	=> "",
								"type"  	=> "dropdown_pages",
								"install"   => 'pag');

	if(get_option("{$prefix}_deactivate_tfuse_seo")!='true') { 
 	 /* SEO Tab */
	$admin_options[] = array( 	"name"  	=> "SEO",
								"type"  	=> "tab",
								"id"    	=> "seo");
	
	$admin_options[] = array(   "name"  	=> "META Data for HomePage",
								"type"  	=> "heading");
	
	$admin_options[] = array( 	"name" 		=> "Home Page Title",
								"desc" 		=> "Enter custom title for home page.",
								"id" 		=> "{$prefix}_homepage_title",
								"std" 		=> "",
								"type" 		=> "text");
	
	$admin_options[] = array( 	"name" 		=> "Keywords",
								"desc" 		=> "Enter custom keywords for home page.",
								"id" 		=> "{$prefix}_homepage_keywords",
								"std" 		=> "",
								"type" 		=> "textarea");
	
	$admin_options[] = array( 	"name" 		=> "Description",
								"desc" 		=> "Enter custom description for home page.",
								"id" 		=> "{$prefix}_homepage_description",
								"std" 		=> "",
								"type" 		=> "textarea");
	

	$admin_options[] = array(   "name"  	=> "General META",
								"type"  	=> "heading");
	
	$admin_options[] = array( 	"name" 		=> "Keywords",
								"desc" 		=> "Enter general keywords for home page, categories, arhives and other pages than single posts and pages.",
								"id" 		=> "{$prefix}_general_keywords",
								"std" 		=> "",
								"type" 		=> "textarea");
	
	$admin_options[] = array( 	"name" 		=> "Description",
								"desc" 		=> "Enter general description for home page, categories, arhives and other pages than single posts and pages.",
								"id" 		=> "{$prefix}_general_description",
								"std" 		=> "",
								"type" 		=> "textarea");
	}
									
									
	/* END admin_option_fields() */
	update_option("{$tfuse->prefix}_admin_options",$admin_options);
	// END admin_option_fields()
}

?>