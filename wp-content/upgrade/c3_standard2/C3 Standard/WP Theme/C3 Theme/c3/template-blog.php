<?php 
/*
Template Name: Blog
*/

get_header();

$paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;  
	
$cat = get_post_meta($post->ID,PREFIX."_blog_page_cat",true);

query_posts("cat=".$cat."&paged=$paged");
?>
	
	<!-- middle -->
	<div class="middle">

	<!-- content -->     
        <div class="wrapper">
          <div class="content">
            
            <!-- text content -->
            <div class="text">

				<?php if (have_posts()) : $count = 0; ?>
              
                    <?php while (have_posts()) : the_post(); $count++; ?>
                    <?php
                        $large_image = get_post_meta($post->ID, PREFIX . '_post_image', true);
                        $medium_image = get_post_meta($post->ID, PREFIX . '_post_image_medium', true);
                        $small_image = get_post_meta($post->ID, PREFIX . '_post_image_small', true);
                        $src_image = $img_in = '';
                        if($large_image != '') $src_image = $large_image;
                        elseif($medium_image != '') $src_image = $medium_image;
                        if($src_image != '')
                        {
                            $tufse_image_options = tfuse_image_post_align();
                            $img_in = '<img src="' . tfuse_get_image($tufse_image_options['thumb_width'], $tufse_image_options['thumb_height'], 'src', $src_image, '', true) . '" alt="' . get_the_title() . '" class="'.$tufse_image_options['thumb_align'].'" width="'.$tufse_image_options['thumb_width'].'" height="'.$tufse_image_options['thumb_height'].'" />';
                        }
                    ?>
                        <!-- post entry -->   
                        <div class="post">         	              

                            <div class="post-title">
                                <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                            </div>
                            
                            <div class="post-meta"><?php the_time('l') ?>, <span class="blue"><?php the_time('F j, Y') ?></span> // <?php the_category(', ') ?></div>
                            
                            <div class="post-entry">
                                <?php if ( $img_in!='' && $post->post_excerpt=='' ) echo $img_in; ?>
                                <?php the_excerpt(); ?>
                                <div class="clear"></div>
                            </div>
                            
                            <div class="post-meta-bot">
                                <a href="<?php the_permalink() ?>" class="btn-more"><?php _e('Read more', 'tfuse'); ?></a>
                                <a href="<?php comments_link(); ?>" class="link-comments"><?php comments_number('0 comments', '1 comment', '% comments') ?></a>
                            </div>
                        </div>
                        
                        <br />
                        
                    <?php endwhile; else: ?>
                        <div class="post">      
                            <p><?php _e('Sorry, no posts matched your criteria.', 'tfuse') ?></p>
                        </div>
                    <?php endif; ?>  
                
                        <div class="other_articles">
                            <div class="newer_articles"><?php previous_posts_link(__('Newer articles', 'tfuse')) ?></div>
                            <div class="older_articles"><?php next_posts_link(__('Older articles', 'tfuse')) ?></div>
                        </div>
                    
                
			</div>
            <!--/ text content -->
                
            </div>
        </div>
        
        <!--/ content -->        
        <?php wp_reset_query();?>
        <!-- navigation -->        
        
                <?php get_sidebar(); ?>
        
        <!--/ navigation -->
        
        <div class="clear"></div>
    </div>
    <!--/ middle -->
            
    </div>
<!--/ container -->    

<?php get_footer(); ?>