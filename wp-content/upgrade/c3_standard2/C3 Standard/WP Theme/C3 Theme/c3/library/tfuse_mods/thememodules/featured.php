<?php 

	if ( !is_front_page() ) {} 
	else { ?>	
	
        <div id="topslider" class="tabs-bottom">
     
			<?php if ( get_option(PREFIX.'_homepage_slider_type')=='posts' || get_option(PREFIX.'_homepage_slider_type')=='categories' ) { ?>

				<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">	
				<?php 
				// $sliders  - we got this data in count_slider_image.php file, included in header.php
				if(!isset($sliders)) $sliders = array();
				$count = 0;
				foreach($sliders as $post) :
					setup_postdata($post);
					$postid = get_the_ID(); 

					$src = get_post_meta($postid, PREFIX."_post_image", true);
					$info = wp_check_filetype($src);
					
					if( !preg_match('/image/',$info['type']) ) continue; 
					$count++;

					if ($count==1) { $classFirst = 'first'; } else { $classFirst = ''; }
					?>
					
					<?php $post_icon_title = tfuse_qtranslate(get_post_meta($postid, PREFIX."_post_icon_title", true)); ?>
                    
                    <li class="<?php echo $classFirst; ?>"><a href="#fragment-<?php echo $count;?>" class="ico-1"><span><?php echo $post_icon_title ?></span><?php if ( get_post_meta($postid, PREFIX."_post_icon", true)!='' ) { ?><em><img src="<?php echo get_post_meta($postid, PREFIX."_post_icon", true); ?>" alt="<?php echo strip_tags($post_icon_title); ?>" border="0" /></em><?php } ?></a></li>
					
				<?php endforeach; ?> 
                </ul>           
				
				<?php 
				// $sliders  - we got this data in count_slider_image.php file, included in header.php
				$count = 0;
				foreach($sliders as $post) :
					setup_postdata($post);
					$postid = get_the_ID();
					
					$src = get_post_meta($postid, PREFIX."_post_image", true);
					$info = wp_check_filetype($src);
					
					if( !preg_match('/image/',$info['type']) ) continue; 
					$count++;
					?>

                     <div id="fragment-<?php echo $count; ?>" class="ui-tabs-panel ui-widget-content ui-corner-bottom">
                        <div class="left-text">
                            <span class="slide-title"><?php the_title(); ?></span>
                            <a href="<?php the_permalink() ?>"><img src="<?php bloginfo('template_directory'); ?>/images/btn_plus.gif" alt="" width="41" height="41" border="0" class="btn-plus" /></a>
                            <?php the_excerpt();?>
                        </div>
                        <div class="right-text"> 
                        	<a href="<?php the_permalink() ?>"><?php tfuse_get_image(483, 325, 'img', PREFIX.'_post_image', '', false, ''); ?></a>
	                    </div>
    	                <div class="clear"></div>
                    </div>
					
				<?php endforeach; ?>            
				
			<?php } else { ?>
            
				<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">	
				<?php 
				$imageCount = get_option(PREFIX.'_homepage_slider_img_count'); 
				if ($imageCount > get_option(PREFIX.'_homepage_slider_entries')) $imageCount = get_option(PREFIX.'_homepage_slider_entries');
				for ( $count = 1; $count <= $imageCount; $count++ ) { ?>
					
					<?php $slideArr = get_option(PREFIX.'_homepage_slider_sliderdata_'.$count); ?>
                
                    <?php if ($count==1) { $classFirst = 'first'; } else { $classFirst = ''; } ?>
					
					<?php $slider_icon_title = tfuse_qtranslate($slideArr["slider_icon_title"]); ?>

                    <li class="<?php echo $classFirst; ?>"><a href="#fragment-<?php echo $count;?>" class="ico-1"><span><?php echo $slider_icon_title; ?></span><?php if ( $slideArr["slider_icon"]!='' ) { ?><em><img src="<?php echo $slideArr["slider_icon"]; ?>" alt="<?php echo strip_tags($slider_icon_title); ?>" border="0" /></em><?php } ?></a></li>		
						
				<?php }  ?>                  
                </ul>	
                                     
						
				<?php 
				$imageCount = get_option(PREFIX.'_homepage_slider_img_count'); 
				if ($imageCount > get_option(PREFIX.'_homepage_slider_entries')) $imageCount = get_option(PREFIX.'_homepage_slider_entries');
				for ( $count = 1; $count <= $imageCount; $count++ ) { ?>
					
					<?php $slideArr = get_option(PREFIX.'_homepage_slider_sliderdata_'.$count); ?>
                
                    <?php if ($count==1) { $classFirst = 'first'; } else { $classFirst = ''; } ?>
                    
                     <div id="fragment-<?php echo $count; ?>" class="ui-tabs-panel ui-widget-content ui-corner-bottom">
                        <div class="left-text">
                            <span class="slide-title"><?php echo tfuse_qtranslate($slideArr['slider_name']); ?></span>
                            <?php if ( $slideArr['slider_link']!='' ) { ?><a href="<?php echo $slideArr['slider_link']; ?>"><img src="<?php bloginfo('template_directory'); ?>/images/btn_plus.gif" alt="" width="41" height="41" border="0" class="btn-plus" /></a><?php } ?>
                            <p><?php echo tfuse_qtranslate($slideArr['slider_description']);?></p>
                        </div>
                        <div class="right-text"> 
                            <?php if ( $slideArr['slider_link']!='' ) { ?><a href="<?php echo $slideArr['slider_link']; ?>"><?php tfuse_get_image(483, 325, 'img', $slideArr['img'], '', false, ''); ?></a><?php } 
                                  else tfuse_get_image(483, 325, 'img', $slideArr['img'], '', false, ''); ?>
                        </div>
                        <div class="clear"></div>
                    </div>
                        
				<?php } ?>                  
			
			<?php } ?>
							 
    		<div class="clear"></div>
        </div>
        <!-- top-slider --> 
		
<?php } ?>
