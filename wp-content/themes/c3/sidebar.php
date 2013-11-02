<div class="navigation"> 
 
	<?php
	$is_widget = false;
	
    if( is_category() ) {

		if ( is_category() ) $q_cat = get_query_var('cat');
		
		if ( get_option( PREFIX.'_categories_subcategories_sidebar_'. $q_cat ) == 'true' ) { 		
        
			$cat = get_category( $q_cat );
	
			if ( $cat->category_parent == 0 ) $parent  = get_query_var('cat');
			else                              $parent  = $cat->category_parent; 
			
			$child_cats = get_categories('child_of='.$parent);
			
			if ($child_cats) { ?>
			
			<div class="left-menu">
				<ul>
					<?php
					$category_link = get_category_link( $parent ); ?>
		
					<?php if ( $q_cat == $parent ) { ?>
						<li class="active"><a href="<?php echo $category_link ?>"><?php echo get_cat_name($parent); ?></a></li>
						
					<?php } else { ?>
						<li><a href="<?php echo $category_link ?>"><?php echo get_cat_name($parent); ?></a></li>
						
					<?php } ?>
					
					<?php $categories = get_categories("title_li=&child_of=".$parent);  
					foreach ($categories as $cat) {
						 
						if ( $q_cat == $cat->term_id ) { ?>
							<li class="active"><a href="<?php echo get_category_link( $cat->term_id ) ?>"><?php echo $cat->cat_name ?></a></li>
							
						<?php } else { ?>
							<li><a href="<?php echo get_category_link( $cat->term_id ) ?>"><?php echo $cat->cat_name ?></a></li>
						<?php }                                
					}                               
					?>
				</ul>
			</div>
			
			<?php 
			}
		}
    }
    ?>


 
	<?php
    if( is_page() ) {

		if ( is_page() ) $q_page = $post->ID;
        
		if ( get_post_meta( $q_page, PREFIX.'_page_subpages_sidebar', true ) == 'true' ) { 		

			if ( $post->post_parent == 0 )  $parent  = $post->ID;
			else                            $parent  = $post->post_parent ; 
			
			$child_pages = get_pages('child_of='.$parent);
			
			if ($child_pages) { ?>
			
			<div class="left-menu">
				<ul>
					<?php				
					$page_link = get_permalink( $parent ); ?>
		
					<?php if ( $q_page == $parent ) { ?>
						<li class="active"><a href="<?php echo $page_link ?>"><?php echo $post->post_title; ?></a></li>
						
					<?php } else { $post = get_post($parent); ?>
						<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						
					<?php } ?>
					
					<?php $pages = get_pages("child_of=".$parent);  
					foreach ($pages as $page) {
						 
						if ( $q_page == $page->ID ) { ?>
							<li class="active"><a href="<?php echo get_permalink( $page->ID ) ?>"><?php echo $page->post_title; ?></a></li>
							
						<?php } else { ?>
							<li><a href="<?php echo get_permalink( $page->ID ) ?>"><?php echo $page->post_title; ?></a></li>
						<?php }                                
					}                               
					?>
				</ul>
			</div>
			
			<?php 
			}
		}
    }
    ?>


 
 	<?php
    // Multi Page Widget
    if ( is_page() )  {
        
        $pageID = $post->ID;				
        $multi_widget = PREFIX.'_multi_widget_pages_hidden';
        $count_multi_widget = get_option( $multi_widget );
        
        if( $count_multi_widget > 1 ) {
        
            for($i = 0; $i < $count_multi_widget; $i++)
            {
                $page_str = get_option( PREFIX.'_multi_widget_pages_'. $i );
                if($page_str == '0') continue;			
		$pageArr = explode("_", $page_str);
		$page_id = $pageArr[1];
                if ( $page_id > 0 ) $pageIDArr[] = $page_id; 					
            }
            if (is_array($pageIDArr))
                if (in_array($pageID, $pageIDArr)) { $is_widget = true; dynamic_sidebar("Sidebar Page - ".get_the_title($pageID)); }
        }
    }
    ?>	
    
    <?php
    // Multi Post Widget
    if ( is_single() )  {
        
        $postID = $post->ID;				
        $multi_widget = PREFIX.'_multi_widget_posts_hidden';
        $count_multi_widget = get_option( $multi_widget );
        
        if( $count_multi_widget > 1 ) {
        
            for($i = 0; $i < $count_multi_widget; $i++)
            {
                $post_str = get_option( PREFIX.'_multi_widget_posts_'. $i );
                if($post_str == '0') continue;			
		$pageArr = explode("_", $post_str);
		$post_id = $pageArr[1];
                if ( $post_id > 0 ) $postIDArr[] = $post_id; 					
            }
            if (is_array($postIDArr))
                if (in_array($postID, $postIDArr)) { $is_widget = true; dynamic_sidebar("Sidebar Post - ".get_the_title($postID)); }
        }
    }
    ?>		
    
     <?php 	
    // Multi Category Widget
    if ( is_category() )  {
        
        $catID = get_query_var('cat');				
        $multi_widget = PREFIX.'_multi_widget_categories_hidden';
        $count_multi_widget = get_option( $multi_widget );
        
        if( $count_multi_widget > 1 ) {
    
            for($i = 0; $i < $count_multi_widget; $i++)
            {
                $cat_str = get_option( PREFIX.'_multi_widget_categories_'. $i );
                if($cat_str == '0') continue;			
		$catArr = explode("_", $cat_str);
		$cat_id = $catArr[1];
                if ( $cat_id > 0 ) $catIDArr[] = $cat_id; 					
            }
            if (is_array($catIDArr))
                if (in_array($catID, $catIDArr)) { $is_widget = true; dynamic_sidebar("Sidebar Category - ".get_cat_name($catID)); }
        }
    }
    ?>	

    <?php
    if (!$is_widget) {


        if ( !is_home() && !is_page() && !is_single() && !is_category() ){ dynamic_sidebar('General Sidebar');}

        if ( is_home() ) is_active_sidebar('sidebar-homepage') ? dynamic_sidebar('Homepage Sidebar') : dynamic_sidebar('General Sidebar');
        if ( is_page() ) is_active_sidebar('sidebar-page') ? dynamic_sidebar('Sidebar Page') : dynamic_sidebar('General Sidebar');
        if ( is_single() ) is_active_sidebar('sidebar-single-post') ? dynamic_sidebar('Sidebar Single Post') : dynamic_sidebar('General Sidebar');
        if ( is_category() ) is_active_sidebar('sidebar-category') ? dynamic_sidebar('Sidebar Category') : dynamic_sidebar('General Sidebar');
    }
    ?>

</div>