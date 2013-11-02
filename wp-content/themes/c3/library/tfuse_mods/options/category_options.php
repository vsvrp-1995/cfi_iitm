<?php
/* Initializes all the theme settings option fields for categories area. */
function category_option_fields(){
	global $tfuse, $category_options;
	$prefix = $tfuse->prefix;
	
	$category_options = array();
	
		
	/* Description HTML */						
	$category_options[] = array("name" 		=> "Description (HTML format)",
								"desc" 		=> "The description is not prominent by default; however, some categories may show it.",
								"id" 		=> "{$prefix}_category_description_html",
								"std" 		=> "",
								"type"		=> "textarea");
	
	
	/* Choise Header Bar Type */
	$category_options[] = array("name" 		=> "Choice Category Template",
								"desc" 		=> "Some themes have custom templates you can use for certain categories that might have additional features or custom layouts. If so, you'll see them above.",
								"id" 		=> "{$prefix}_category_template",
								"std" 		=> "default",
								"type"		=> "select",
								"options" 	=> tfuse_category_template());
	
	// Enable Dynamic Image Resizer Option  
	$category_options[] = array("name"  	=> "Enable Subcategories Sidebar",
								"desc"  	=> "This will enable Subcategories Sidebar",
								"id"    	=> "{$prefix}_categories_subcategories_sidebar",
								"std"   	=> "false",
								"type"  	=> "checkbox");    
	
	// Enable Dynamic Image Resizer Option  
	$category_options[] = array("name"  	=> "Enable Navigation Menu Delimiter",
								"desc"  	=> "This will Enable Navigation Menu Delimiter",
								"id"    	=> "{$prefix}_categories_navigation_line",
								"std"   	=> "false",
								"type"  	=> "checkbox");  

	

	if(get_option("{$prefix}_deactivate_tfuse_seo")!='true') {
	$category_options[] = array("name" 		=> "SEO - Title",
								"desc" 		=> "Enter your prefered custom title or leave blank for deafault value.",
								"id" 		=> "{$prefix}_cat_seo_title",
								"std" 		=> "",
								"type" 		=> "text");
	
	$category_options[] = array("name" 		=> "SEO - Keywords",
								"desc" 		=> "Enter your prefered custom keywords or leave blank for deafault value.",
								"id" 		=> "{$prefix}_cat_seo_keywords",
								"std" 		=> "",
								"type" 		=> "textarea");
	
	$category_options[] = array("name" 		=> "SEO - Description",
								"desc" 		=> "Enter your prefered custom description or leave blank for deafault value.",
								"id" 		=> "{$prefix}_cat_seo_description",
								"std" 		=> "",
								"type" 		=> "textarea");
	}

	
	/* END custom_option_fields() */
	update_option("{$tfuse->prefix}_category_options",$category_options);
	// END custom_option_fields()
}

?>