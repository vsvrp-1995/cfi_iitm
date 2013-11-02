<?php get_header(); ?>

<?php include( THEME_MODULES . '/featured.php' ); ?>

	<?php 
    
    $placeholder[1] = '<h2>LATEST NEWS AND INFO</h2>
                    <h3><a href="#">Technical Support just got better!</a></h3>
					<div class="short-entry">
                        <p> There\'s a voice that keeps on calling me. Down the road, that\'s where I\'ll always be. Every stop I make, I make a new friend. Can\'t stay for long, just turn around and I\'m gone again. Maybe tomorrow, I\'ll want to settle down</p>
                    </div>	
                    <ul>
                    	<li><a href="#">Connect to Remote Support</a></li>
                        <li><a href="#">Via telephone: 800.898.3838</a></li>
                        <li><a href="#">Troubleshooting F.A.Q.</a></li>
                    </ul>';

    $placeholder[2] = '<h2>WANT TO LEARN MORE?</h2>
                    <h3><a href="#">Full comparison of our plans</a></h3>
					<div class="short-entry">
                        <p>One for all and all for one, Muskehounds are always ready. One for all and all for one, helping everybody. One for all and all for one, it\'s a pretty story. Sharing everything with fun, that\'s the way to be. One for all and all for one</p>
                    </div>	
                    <ul class="list-icons">
                    	<li class="ico-pdf"><a href="#">Download the PDF file</a></li>
                        <li class="ico-arr"><a href="#">Sign up for a plan</a></li>
                    </ul>';    
     
    ?>
    
	<!-- middle -->
	<div class="middle">
    

	<!-- content -->     
        <div class="wrapper">
          <div class="content">
            
                <!-- top baner-->
                
                <?php
                    $featposts = 1; // Number of featured entries to be shown
                    $GLOBALS['feat_tags_array'] = explode(',',get_option(PREFIX.'_featured_post')); // Tags to be shown
                    $clean_tags = array();
                    foreach ($GLOBALS['feat_tags_array'] as $tags){ $clean_tags[] = trim($tags); }
                    $new_tags = implode(',',$clean_tags);
                ?>
                
                <?php $saved = $wp_query; query_posts('tag=' . $new_tags . '&showposts=' . $featposts); ?>
                <?php if (have_posts()) : $count = 0; ?>
                     <?php while (have_posts()) : the_post(); $count++; ?>
                         <?php the_content(); ?>                            
                     <?php endwhile; ?> 
                <?php endif; $wp_query = $saved; ?>
                   
                <!--/ top baner-->   
                
                <!-- two-columns -->
                <div class="two-columns">
                
                    <?php 
                        //call class
                        $boxes = new tfuse_display_box(PREFIX.'_home_box', $placeholder, 2);
                        $boxes-> display();
                    ?>
                    <div class="clear"></div>
    
                </div>
                <!--/ two-columns -->
                
            </div>
        </div>
        
<!--/ content -->        

        <!-- navigation --> 
        <?php wp_reset_query(); ?>        
		<?php get_sidebar(); ?>
        
        <!--/ navigation -->
        
        <div class="clear"></div>
    </div>
    <!--/ middle -->

<?php get_footer(); ?>