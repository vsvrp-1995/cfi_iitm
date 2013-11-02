<?php

// =============================== Posts List widget ======================================

class TFuse_posts extends WP_Widget {

	function TFuse_posts() {
		$widget_ops = array('description' => '' );
		parent::WP_Widget(false, __('TFuse - Selected Posts', 'tfuse'),$widget_ops);      
	}

	function widget($args, $instance) {  
		extract( $args );
		(isset($instance['title'])) ? $title = esc_attr($instance['title']) : $title = '';
		(isset($instance['subtitle'])) ? $subtitle = esc_attr($instance['subtitle']) : $subtitle = '';
		(isset($instance['posts'])) ? $posts = $instance['posts'] : $posts = array();

		echo $before_widget; ?>
   
            <h3><?php echo $title; ?></h3>
            	<?php 
  				if ( is_array($posts) ) { ?>
                
                        <ul>
					
							<?php 
							$k=0;							
							foreach ($posts as $key=>$val) {
                                
								$k++;
								if ($k==1)             $first = '  class="first" '; else $first = '';
								if ($k==count($posts)) $last  = '  class="last" ';  else $last  = '';
								
								$page = get_post($key);
								if(isset($page))   
								echo '<li '.$first.$last.'><a href="' . get_permalink($key) . '">' . $page->post_title . '</a></li>';								
                            } ?>
                            
                        </ul>
                <?php 
				}
				?>
	   <?php			
	   echo $after_widget;
   }

   function update($new_instance, $old_instance) {                
       return $new_instance;
   }

   function form($instance) {        
		(isset($instance['title'])) ? $title = esc_attr($instance['title']) : $title = '';
		(isset($instance['subtitle'])) ? $subtitle = esc_attr($instance['subtitle']) : $subtitle = '';
		(isset($instance['posts'])) ? $posts = $instance['posts'] : $posts = array();
 		?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','tfuse'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('posts'); ?>"><?php _e('Select Posts List','tfuse'); ?></label>
            <?php 
				$tfuse_posts = array();  
				$tfuse_posts_obj = get_posts('numberposts=-1');
				if (is_array($tfuse_posts_obj)) {
					foreach ($tfuse_posts_obj as $tfuse_post) { ?>
                    	<br /><br />
                        <?php 
                        if ( isset($instance['posts'][$tfuse_post->ID]) ) $checked = ' checked="checked" '; else $checked = '';
						?>
                        
						<input <?php echo $checked; ?> type="checkbox" name="<?php echo $this->get_field_name('posts'); ?>[<?php echo $tfuse_post->ID;?>]" value="1" id="<?php echo $this->get_field_id('posts'); ?>" />&nbsp;&nbsp;<?php echo $tfuse_post->post_title; ?>
                        <?php
 					}
				}
			?>            
        </p>
		<?php
	}
} 
register_widget('TFuse_posts');
 
?>