<?php 

if ( $post->ID == get_option(PREFIX.'_contact_page') ) include( TEMPLATEPATH . '/template-contact.php' ); 
else { 

get_header(); ?>


	<!-- middle -->
	<div class="middle">    

        <!-- content -->     
        <div class="wrapper">
          <div class="content">
            
            <!-- text content -->
            <div class="text">            
            

				<?php if (have_posts()) : $count = 0; ?>
                <?php while (have_posts()) : the_post(); $count++; ?>
     
					<?php the_content(); ?>
                    
                 <?php endwhile; else: ?>
                
                    <p><?php _e('Sorry, no posts matched your criteria.', 'tfuse') ?></p>
                                       
                <?php endif; ?>  
                
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

<?php } ?>