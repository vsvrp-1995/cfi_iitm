<?php get_header(); ?>
	
	<!-- middle -->
	<div class="middle">

	<!-- content -->     
        <div class="wrapper">
          <div class="content">
            
            <!-- text content -->
            <div class="text">
            
                <h1><?php _e('Search results', 'tfuse') ?> for <?php printf(__('\'%s\''), the_search_query()) ?></h1><hr /><br />


				<?php if (have_posts()) : $count = 0; ?>
                
                    <?php while (have_posts()) : the_post(); $count++; ?>
                    
                        <!-- post entry -->   
                        <div class="post">         	              

                            <div class="post-title">
                                <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                            </div>
                            
                            <div class="post-meta"><?php the_time('l') ?>, <span class="blue"><?php the_time('F j, Y') ?></span> // <?php the_category(', ') ?></div>
                            
                            <div class="post-entry">
                            
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
        
        <!-- navigation -->        
        
                <?php get_sidebar(); ?>
        
        <!--/ navigation -->
        
        <div class="clear"></div>
    </div>
    <!--/ middle -->
            
    </div>
<!--/ container -->    

<?php get_footer(); ?>