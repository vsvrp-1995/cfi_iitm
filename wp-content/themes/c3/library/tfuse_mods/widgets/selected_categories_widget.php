<?php

// =============================== Categories List widget ======================================

class TFuse_categories extends WP_Widget {

	function TFuse_categories() {
		$widget_ops = array('description' => '' );
		parent::WP_Widget(false, __('TFuse - Selected Categories', 'tfuse'),$widget_ops);      
	}

	function widget($args, $instance) {  
		extract( $args );
		(isset($instance['title'])) ? $title = esc_attr($instance['title']) : $title = '';
		(isset($instance['subtitle'])) ? $subtitle = esc_attr($instance['subtitle']) : $subtitle = '';
		(isset($instance['categories'])) ? $categories = $instance['categories'] : $categories = array();
		
		echo $before_widget; ?>
   
            <h3><?php echo $title; ?></h3>
            <?php if ( $subtitle!='' ) { ?><p><?php echo $subtitle; ?></p><?php } ?>
            	<?php 
  				if ( is_array($categories) ) { ?>
                
                        <ul>
					
							<?php 
							$k=0;
                            foreach ($categories as $key=>$val) {
                                
								$k++;
								if ($k==1)                  $first = '  class="first" '; else $first = '';
								if ($k==count($categories)) $last  = '  class="last" ';  else $last  = '';
								
								echo '<li '.$first.$last.'><a href="' . get_category_link($key) . '">' . get_cat_name( $key ) . '</a></li>';								
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
		(isset($instance['categories'])) ? $categories = $instance['categories'] : $categories = array();
 		?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','tfuse'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('categories'); ?>"><?php _e('Select Categories List','tfuse'); ?></label>
            <?php 
				$tfuse_categories = array();  
				$tfuse_categories_obj = get_categories('hide_empty=0');
				if (is_array($tfuse_categories_obj)) {
					foreach ($tfuse_categories_obj as $tfuse_cat) { ?>
                    	<br /><br />
                        <?php 
                        if ( isset($instance['categories'][$tfuse_cat->cat_ID]) ) $checked = ' checked="checked" '; else $checked = '';
						?>
                        
						<input <?php echo $checked; ?> type="checkbox" name="<?php echo $this->get_field_name('categories'); ?>[<?php echo $tfuse_cat->cat_ID;?>]" value="1" id="<?php echo $this->get_field_id('categories'); ?>" />&nbsp;&nbsp;<?php echo $tfuse_cat->cat_name; ?>
                        <?php
 					}
				}
			?>            
        </p>
		<?php
	}
} 
register_widget('TFuse_categories');
 
?>