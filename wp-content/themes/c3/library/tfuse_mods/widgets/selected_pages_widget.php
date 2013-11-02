<?php

// =============================== Pages List widget ======================================

class TFuse_pages extends WP_Widget {

	function TFuse_pages() {
		$widget_ops = array('description' => '' );
		parent::WP_Widget(false, __('TFuse - Selected Pages', 'tfuse'),$widget_ops);      
	}

	function widget($args, $instance) {  
		extract( $args );
		(isset($instance['title'])) ? $title = esc_attr($instance['title']) : $title = '';
		(isset($instance['subtitle'])) ? $subtitle = esc_attr($instance['subtitle']) : $subtitle = '';
		(isset($instance['pages'])) ? $pages = $instance['pages'] : $pages = array();
		
		echo $before_widget; ?>
   
            <h3><?php echo $title; ?></h3>
            	<?php 
  				if ( is_array($pages) ) { ?>
                
                        <ul class="third_menu">
					
							<?php 
							$k=0;							
							foreach ($pages as $key=>$val) {
                                
								$k++;
								if ($k==1)             $first = '  class="first" '; else $first = '';
								if ($k==count($pages)) $last  = '  class="last" ';  else $last  = '';
								
								$page = get_post($key);
                                				if(isset($page))
								echo '<li '.$first.$last.'><a href="' . get_page_link($key) . '">' . $page->post_title . '</a></li>';								
								$page = get_post($key);    
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
		(isset($instance['pages'])) ? $pages = $instance['pages'] : $pages = array();
 		?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','tfuse'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('pages'); ?>"><?php _e('Select Pages List','tfuse'); ?></label>
            <?php 
				$tfuse_pages = array();  
				$tfuse_pages_obj = get_pages();
				if (is_array($tfuse_pages_obj)) {
					foreach ($tfuse_pages_obj as $tfuse_page) { ?>
                    	<br /><br />
                        <?php 
                        if ( isset($instance['pages'][$tfuse_page->ID]) ) $checked = ' checked="checked" '; else $checked = '';
						?>
                        
						<input <?php echo $checked; ?> type="checkbox" name="<?php echo $this->get_field_name('pages'); ?>[<?php echo $tfuse_page->ID;?>]" value="1" id="<?php echo $this->get_field_id('pages'); ?>" />&nbsp;&nbsp;<?php echo $tfuse_page->post_title; ?>
                        <?php
 					}
				}
			?>            
        </p>
		<?php
	}
} 
register_widget('TFuse_pages');
 
?>