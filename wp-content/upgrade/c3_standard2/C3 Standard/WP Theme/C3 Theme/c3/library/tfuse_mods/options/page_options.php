<?php
/* Initializes all the theme settings option fields for pages area. */
function page_option_fields(){
	global $tfuse, $page_options;
	$prefix = $tfuse->prefix;
	
	$page_options = array();  	
 
 	/***********************************************************
		Sidebar
	************************************************************/

	/* Single Post */ 
	$page_options[] = array(	"name"    	=> "Single Page",
								"id"      	=> "{$prefix}_page_side_page",
								"page"		=> "page", 					 
								"type"		=> "metabox",				 
								"context"	=> "side");		
	
	// Enable Subpages Sidebar
	$page_options[] = array(	"name"  	=> "Enable Subpages Sidebar",
								"desc"  	=> "This will enable Subpages Sidebar",
								"id"    	=> "{$prefix}_page_subpages_sidebar",
								"std"   	=> "false",
								"type"  	=> "checkbox");    
	
	// Enable Dynamic Image Resizer Option  
	$page_options[] = array(	"name"  	=> "Enable Navigation Menu Delimiter",
								"desc"  	=> "This will Enable Navigation Menu Delimiter",
								"id"    	=> "{$prefix}_page_navigation_line",
								"std"   	=> "false",
								"type"  	=> "checkbox");

	// Blog Category Option  
	$page_options[] = array(	"name"  	=> "Blog Category",
								"desc"  	=> "Which category to display in case if you choose this page like a blog themplate.",
								"id"    	=> "{$prefix}_blog_page_cat",
								"std"   	=> "",
								"type"  	=> "dropdown_categories",
								"install"   => 'cat');


 	/***********************************************************
		Normal
	************************************************************/
	
	/* Header Panel */ 
	$page_options[] = array(	"name"    	=> "Custom Page Information",
								"id"      	=> "{$prefix}_page_information",
								"page"		=> "page", 					 
								"type"		=> "metabox",				 
								"context"	=> "normal");				 
	
	/* Header Title */						
	$page_options[] = array( 	"name" 		=> "Custom Page Title",
								"desc" 		=> "Enter your preferred Page Title for this page.",
								"id" 		=> "{$prefix}_page_title",
								"std" 		=> "Introduction",
								"type"		=> "text");
	
	/* Header SubTitle */						
	$page_options[] = array( 	"name" 		=> "Custom Page SubTitle",
								"desc" 		=> "Enter your preferred Page SubTitle for this page.",
								"id" 		=> "{$prefix}_page_subtitle",
								"std" 		=> "Ten years ago a great crack commando unit was sent to prison by a super military court for a crime they ever didn't commit.",
								"type"		=> "text");
	
	 /* Custom Header Image */
	 $page_options[] = array(	"name" 		=> "Custom Page Image",
								"desc" 		=> "Upload a Page Image for your page, or specify the image address of your online Page Image. (http://yoursite.com/image.png)",
								"id" 		=> "{$prefix}_page_image",
								"std" 		=> "",
								"type" 		=> "upload"); 
	
	 /* Custom Header Image */
	 $page_options[] = array(	"name" 		=> "Custom Page Button Name",
								"desc" 		=> "Enter your preferred Page Button Name for this page.",
								"id" 		=> "{$prefix}_page_button_name",
								"std" 		=> "Watch Video",
								"type" 		=> "text"); 
	
	 /* Custom Header Image */
	 $page_options[] = array(	"name" 		=> "Watch Video Link",
								"desc" 		=> "Read <a target='_blank' href='http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone/'>prettyPhoto documentation</a> for info on how to add video or flash in this URL.",
								"id" 		=> "{$prefix}_page_button_link",
								"std" 		=> "",
								"type" 		=> "text"); 
	 
	

	if(get_option("{$prefix}_deactivate_tfuse_seo")!='true') {
	/* SEO Panel */
	$page_options[] = array(	"name"    	=> "SEO",
								"id"      	=> "{$prefix}_page_seo",
								"page"		=> "page",
								"type"		=> "metabox",
								"context"	=> "normal");

	$page_options[] = array(	"name" 		=> "Custom Post Title",
								"desc" 		=> "Enter your prefered custom title or leave blank for deafault value.",
								"id" 		=> "{$prefix}_page_seo_title",
								"std" 		=> "",
								"type" 		=> "text");

	$page_options[] = array(	"name" 		=> "Custom Post Keywords",
								"desc" 		=> "Enter your prefered custom keywords or leave blank for deafault value.",
								"id" 		=> "{$prefix}_page_seo_keywords",
								"std" 		=> "",
								"type" 		=> "textarea");

	$page_options[] = array(	"name" 		=> "Custom Post Description",
								"desc" 		=> "Enter your prefered custom description or leave blank for deafault value.",
								"id" 		=> "{$prefix}_page_seo_description",
								"std" 		=> "",
								"type" 		=> "textarea");
	}


 	/***********************************************************
		Advanced
	************************************************************/
	
 	
	/* END custom_option_fields() */
	update_option("{$tfuse->prefix}_page_options",$page_options);
	// END custom_option_fields()
}

?>