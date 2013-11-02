<?php 
	global $sliders;
	
	$featposts = get_option(PREFIX.'_homepage_slider_entries');                           // Number of featured entries to be shown
	
	if ( get_option(PREFIX.'_homepage_slider_type')=='posts' || get_option(PREFIX.'_homepage_slider_type')=='categories' ) {
			
		if (get_option(PREFIX.'_homepage_slider_type')=='posts') {
		
			$GLOBALS['feat_tags_array'] = explode(',',get_option(PREFIX.'_homepage_slider_posts')); // Tags to be shown
			$clean_tags = array();
			foreach ($GLOBALS['feat_tags_array'] as $tags){ $clean_tags[] = trim($tags); }
			$new_tags = implode(',',$clean_tags);
				
			$sliders = get_posts('tag=' . $new_tags . '&showposts=-1'); 
				                
		} else { 
	
			$GLOBALS['feat_categories_array'] = explode(',',get_option(PREFIX.'_homepage_slider_categories')); // Categories to be shown
			$clean_categories = array();
			foreach ($GLOBALS['feat_categories_array'] as $categories){ $clean_categories[] = trim($categories); }
			$new_categories = implode(',',$clean_categories);
				
			$sliders = get_posts('cat=' . $new_categories . '&showposts=-1'); 
			
		} 
	                
		
		foreach($sliders as $posturi) {
			setup_postdata($posturi);
			$postid = get_the_ID();
			
			$src = get_post_meta($postid, PREFIX.'_post_slider_image', true);
			$info = wp_check_filetype($src);
			
			if( preg_match('/image/',$info['type']) ) $count++;			
		}
	
	} else {
		//is slider type is upload
	
		$count = get_option(PREFIX.'_homepage_slider_img_count'); 
	    
	}
	
	if(!isset($count)) $count = 0;
	if ($count > $featposts ) $count = $featposts;
	
	update_option(PREFIX.'_slider_count',$count);

?>