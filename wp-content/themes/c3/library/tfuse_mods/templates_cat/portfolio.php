<?php get_header(); ?>
    
	<!-- middle -->
	<div class="middle">
    

	<!-- content -->     
        <div class="wrapper">
          <div class="content">
            
            <!-- text content -->
            <div class="text">
            
			<?php 
                $cat_ID     = get_query_var('cat');		
                $desc_html  = tfuse_qtranslate(get_option(PREFIX.'_category_description_html_'.$cat_ID ));
            ?>
			<?php echo $desc_html; ?>
            
            <div class="works">
                <ul class="gallery clearfix">

				<?php global $post; if (have_posts()) : $count = 0; $k = 0; ?>
                <?php while (have_posts()) : the_post(); $count++; $k++; ?>
                 
					<?php if (get_post_meta($post->ID, PREFIX."_post_video", true)!='') { $media = get_post_meta($post->ID, PREFIX."_post_video", true); } else { $media = get_post_meta($post->ID, PREFIX."_post_image", true); } ?>                 
					<?php 
                    if ( get_post_meta($post->ID, PREFIX."_post_image_small", true)!='' ) { 
                        $img_in = '<img src="'. get_post_meta($post->ID, PREFIX."_post_image_small", true) . '" alt="'.get_the_title().'" width="276" height="131" />';

					} else $img_in = tfuse_get_image(276, 131, 'img', PREFIX.'_post_image', '', true, ''); 
                    ?>                

                    <li>
                        <div class="gallery-img">
						<?php if ( get_option(PREFIX.'_disable_lightbox')!='true' ) { ?>
                            <a href="<?php echo $media; ?>" rel="prettyPhoto[gallery1]" title="<?php echo get_the_excerpt(); ?>"><span class="icohover">&nbsp;</span><?php echo $img_in; ?></a>
                        <?php } else { ?>
                            <a class="project_hover" href="<?php the_permalink() ?>" title="<?php echo get_the_excerpt(); ?>"><?php echo $img_in; ?></a>
                        <?php } ?>
                        </div>

                        <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                        <?php the_excerpt(); ?>
                    </li>
                    <!-- .work_project -->
                    
                <?php endwhile; else: ?>
                    <div class="work_project">
                        <p><?php _e('Sorry, no posts matched your criteria.', 'tfuse') ?></p>
                    </div>
                <?php endif; ?>  
                </ul>

                <div class="clear"></div>

                <div class="other_articles">
                    <div class="newer_articles"><?php previous_posts_link(__('Newer articles', 'tfuse')) ?></div>
                    <div class="older_articles"><?php next_posts_link(__('Older articles', 'tfuse')) ?></div>
                </div>
                
				<script type="text/javascript" charset="utf-8">
                    jQuery(document).ready(function(){
                        jQuery(".gallery a[rel^='prettyPhoto']").prettyPhoto({theme:'facebook'});
                    });
                </script>
                    
                </div>
                
			</div>
            <!--/ text content -->
                
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