<?php 
/*
Template Name: Take The Tour
*/

get_header(); ?>


	<!-- middle -->
	<div class="middle">    

        <!-- content -->     
        <div class="wrapper">
          <div class="content">

			<?php if (have_posts()) : $count = 0; ?>
            <?php while (have_posts()) : the_post(); $count++; ?>
 
                <!-- top box-->
                <div class="topbox">
                    <?php if ( get_post_meta($post->ID, PREFIX.'_page_image', true)!='' ) { ?><div class="topbox-image"><?php tfuse_get_image(483, 325, 'img', get_post_meta($post->ID, PREFIX.'_page_image', true), '', false, ''); ?></div><?php } ?>
                    <div class="topbox-right">
                        <div class="topbox-text">
						<?php
							$title = tfuse_qtranslate( get_post_meta($post->ID, PREFIX.'_page_title', true) );
							$subtitle = tfuse_qtranslate( get_post_meta($post->ID, PREFIX.'_page_subtitle', true) );
						?>
                        <div class="topbox-title"><strong><?php if ( $title!='' ) { echo $title; } ?></strong></div>
                        <p><?php if ( $subtitle!='' ) { echo $subtitle; } ?></p>
                        </div>
                        <?php if ( get_post_meta($post->ID, PREFIX.'_page_button_link', true)!='' ) { ?><p><a rel="prettyPhoto[topbox1]" title="<?php echo strip_tags($title) ?>" href="<?php echo get_post_meta($post->ID, PREFIX.'_page_button_link', true); ?>" class="btn-video"><?php echo tfuse_qtranslate(get_post_meta($post->ID, PREFIX.'_page_button_name', true)); ?></a></p><?php } ?>
                    </div>
                    <div class="clear"></div>
                </div>
                <!--/ top box-->   
                
                <!-- text content -->
                <div class="text">            
         
                    <?php the_content(); ?>
                    
                </div>
                <!--/ text content -->
                
             <?php endwhile; else: ?>
             
                <!-- text content -->
                <div class="text">            
         
                    <p><?php _e('Sorry, no posts matched your criteria.', 'tfuse') ?></p>
                    
                </div>
                <!--/ text content -->

            <?php endif; ?> 
             
			<script type="text/javascript" charset="utf-8">
                jQuery(document).ready(function(){
                    jQuery(".topbox a[rel^='prettyPhoto']").prettyPhoto({theme:'facebook'});
                });
            </script>
                    
            </div>
        </div>
            
        <!--/ content -->        
        
        <!-- navigation --> 
                
		<?php get_sidebar(); ?>
        
        <!--/ navigation -->
        
        <div class="clear"></div>
    </div>
    <!--/ middle -->

<?php get_footer(); ?>