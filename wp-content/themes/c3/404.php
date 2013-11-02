<?php get_header(); ?>
 
    <div class="content">
    	<div class="secondary_pages_content">
        
			<?php if (have_posts()) : $count = 0; ?>
                        
            <div class="contact_box">
                <div class="contact_box_top"></div>
                <div class="contact_box_middle">                                                                 
                <h2 class="title"><?php _e('Error 404 - Page not found!', 'tfuse') ?></h2>
                <p><?php _e('The page you trying to reach does not exist, or has been moved. Please use the menus or the search box to find what you are looking for.', 'tfuse') ?></p>                
                </div>
                <div class="contact_box_bottom"></div>
            </div>
                                                
            <?php else: ?>
            
            <div class="contact_box">
                <div class="contact_box_top"></div>
                <div class="contact_box_middle">
                <div class="post">
                    <p><?php _e('Sorry, no posts matched your criteria.', 'tfuse') ?></p>
                </div><!-- /.post -->
                
                </div> 
                <div class="contact_box_bottom"></div>
            </div>
            <?php endif; ?>  
 
		</div>
        <!-- secondary_pages_content -->
        
        <div class="clear_container"></div>
        <br /><br />
        
    </div>
    <!-- .CONTENT -->

<?php get_footer(); ?>