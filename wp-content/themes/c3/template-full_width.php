<?php 
/*
Template Name: Full Width
*/
$fullWidth=1;
global $fullWidth;

get_header(); ?>

	<!-- middle -->
	<div class="middle">    

		<?php if (have_posts()) : $count = 0; ?>
        <?php while (have_posts()) : the_post(); $count++; ?>

                <?php the_content(); ?>
                
            
         <?php endwhile; else: ?>
         
            <!-- text content -->
            <div class="text">            
     
                <p><?php _e('Sorry, no posts matched your criteria.', 'tfuse') ?></p>
                
            </div>
            <!--/ text content -->

        <?php endif; ?>  
            
        <div class="clear"></div>
    </div>
    <!--/ middle -->

<?php get_footer(); ?>