<?php get_header(); ?>

	<!-- middle -->
	<div class="middle">
    
	<!-- content -->     
        <div class="wrapper">
          <div class="content">

			<?php if (have_posts()) : $count = 0; ?>
            <?php while (have_posts()) : the_post(); $count++; ?>
            
                <!-- text content -->
                <div class="text">
                
                    <!-- post entry -->   
                    <div class="post"> 
                    
                        <div class="post-title">
                            <h1><?php the_title(); ?></h1>
                        </div>
                        
                        <div class="post-meta"><?php the_time('l') ?>, <span class="blue"><?php the_time('F j, Y') ?></span> // <?php the_category(', ') ?></a></div>
                        
                        <div class="post-entry tfuseslider">
                        
	                        <?php 
							$post_video 	= get_post_meta($post->ID, PREFIX."_post_video", true);
							$large_image 	= get_post_meta($post->ID, PREFIX."_post_image", true);
							$medium_image 	= get_post_meta($post->ID, PREFIX."_post_image_medium", true);
							$small_image 	= get_post_meta($post->ID, PREFIX."_post_image_small", true);
							$disablevideo	= get_post_meta($post->ID, PREFIX."_post_single_video", true);
							$disableimage	= get_post_meta($post->ID, PREFIX."_post_single_image", true);
							$disableprety	= get_option(PREFIX."_disable_lightbox");
							$src_image	= $img_in = '';
							
							if ($post_video!='' && $disablevideo=='true') { $media = $post_video; } elseif ($large_image!='') { $media = $large_image; } elseif ($medium_image!='') { $media = $medium_image; } else { $media = $small_image; }
							
							if ($medium_image!='') { $src_image = $medium_image; } elseif ($large_image!='') { $src_image = $large_image; } elseif ($small_image!='') { $src_image = $small_image; }
							
							if ( $disablevideo != 'true' && $post_video!='' ) { echo tfuse_get_embed(710, 470, PREFIX."_post_video"); if($disableimage!='true') { echo "<br /><br />"; } }
							
							if ($src_image!='') {
								$img_in = '<img src="'.tfuse_get_image(710, 250, 'src', $src_image, '', true).'" alt="'.get_the_title().'" class="blog_img" width="710" height="250" />';
							?>
								
								<?php if($img_in!='' && $disableimage!='true') { ?>
									<?php if ( $disableprety!='true' ) {?>
										<a href="<?php echo $media; ?>" rel="prettyPhoto[gallery1]" title="<?php the_title(); ?>"><?php echo $img_in ?></a>
									<?php } else {?>
										<?php echo $img_in ?>
									<?php } ?>
								<?php } ?>
								
								
								<?php if ( $disablevideo != 'true' ) { ?>
								<div style="display:none;">
								<?php 
									//get image from medial ibrary
									$attachments = get_children( array(
										'post_parent' => $post->ID,
										'numberposts' => -1,
										'post_type' => 'attachment',
										'post_mime_type' => 'image')
									);
							
								    if ( !empty($attachments) ) {
							
									    $size = 'full';
									    foreach ( $attachments as $att_id => $attachment ) {       
									    	$src = wp_get_attachment_image_src($att_id, $size, true);
									    	$image_link_attach = $src[0];
								?>
								<a href="<?php echo $image_link_attach; ?>" rel="prettyPhoto[gallery1]" ><?php echo wp_get_attachment_image( $att_id, $size ); ?></a>
								<?php 
									    }
								    }
								//end attachement
								?>
								</div>
								<?php } ?>

							<?php } ?>

                            <?php the_content(); ?>
                            
                            <div class="clear"></div>
                        </div>

                    </div>
                    <!--/ post entry -->
                
					<?php if ( get_post_meta($post->ID, PREFIX."_post_single_comments", true)!='true' ) { comments_template(); } ?>
                    
                </div>
                
            <?php endwhile; else: ?>
            
                <!-- text content -->
                <div class="text">
                
                    <!-- post entry -->   
                    <div class="post"> 
                    
                        <p><?php _e('Sorry, no posts matched your criteria.', 'tfuse') ?></p>
                        
	                </div>   
                    
                </div>
                                   
            <?php endif; ?>  
					
            </div>
        </div>
            
        <!--/ content -->        
              
        
        <!-- navigation --> 
                
		<?php get_sidebar(); ?>
        
        <!--/ navigation -->
        
        <div class="clear"></div>
    </div>
    <!--/ middle -->

	<script type="text/javascript" charset="utf-8">
		jQuery(document).ready(function(){
			jQuery(".tfuseslider a[rel^='prettyPhoto']").prettyPhoto({theme:'facebook'});
		});
	</script>

<?php get_footer(); ?>
