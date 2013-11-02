<?php

class testimonials_manager_widget extends WP_Widget {

		

        function testimonials_manager_widget()
        {
            $widget_ops = array('classname' => 'ww1231', 'description' => __("Display and rotate your testimonials"));
            $this->WP_Widget(false, __('TFuse - Testimonials'), $widget_ops);
            
            $this->tfuse_testimonial_details();
        } 
        function widget($args, $instance)
        {
            extract($args, EXTR_SKIP);

            $data = $instance;
           
            $instanc = get_option('testimonials_manager');
            
            echo $before_widget;
			echo '<div class="testimonials">';			
			
            if ($data['display'] && $data['display'] < count($instanc['data'])) {
                $testimonialboxValue = $data['display'];
            } else {
                $testimonialboxValue = count($instanc['data']);
            }
			
			
			
            if ($data['title'] != "") {
                echo "<h3>". $data['title'] ."</h3>";
            }


            $result_array = array();
            if(!isset($data['random'])) $data['random'] = '';
            if($data['random'] == 'true') @shuffle($instanc['data']);
            
            $result_array = @array_slice($instanc['data'], 0, $testimonialboxValue);
            // print_r($result_array);
            
            if ($testimonialboxValue == 0) {
                echo '<div class="testimonials_manager_widget" style="text-align:center;">';
                echo '<strong>There are no testimonial yet</strong>';
                echo '</div>';
            } else {
				
						foreach ($result_array as $x) {
							if ($x != - 1) {
								$url = $x['url'];
								if (substr($url, 0, 7) != 'http://') {
									$url = 'http://' . $url;
								}
								$text = stripslashes($x['text']);
		
								if ($x['avatar']) {
									if ($x['avatar'] == "gravatar") {
										echo get_avatar($x['email'], $size = '48');
									} else {
										echo '<img src="' . $x['own_avatar'] . '" class="avatar" alt="avatar" width="48" height="48" />';
									}
								}
								echo '<p class="quote">'.nl2br($text)."</p>";
								
								
								echo '<p class="author"><strong>' . stripslashes($x['name']) . '';
								if ($x['url']) {
									echo ' <a href="' . stripslashes($url) . '">';
								}
								if ($x['company']) {
									echo stripslashes($x['company']);
								}
								if ($x['url']) {
									echo '</a>';
								}
								echo '</strong></p>';
								
							}
						}				
				
				/*
                if ($data['page_link'] != "no_page") {
                    echo '<div style="width:100%;text-align:right; display:block;"><a href="';
                    if ($data['page_link'] == "") {
                        get_permalink($instance['page_id']);
                    } else {
                        echo $data['page_link'];
                    }
                    echo '"> Read more&rsaquo;&rsaquo; </a></div>';
                }*/
				
				echo '</div>';
            }
            echo $after_widget;
        } // End function widget.
        // Updates the settings.
        function update($new_instance, $old_instance)
        {
            return $new_instance;
        } // End function update
        // The admin form.
        function form($instance)
        {
            if (empty($instance['display'])) {
                $instance['display'] = "2";
            }
            if (empty($instance['title'])) {
                $instance['title'] = "Testimonials";
            }
            if (empty($instance['subtitle'])) {
                $instance['subtitle'] = "";
            }
            
            if (empty($instance['icon'])) {
                $instance['icon'] = "";
            }
            
            if (empty($instance['random'])) {
                $instance['random'] = "";
            }
            
            $checked = '';
            if($instance['random'] == 'true') {
            	$checked = 'checked="checked"';
            }

            ?>

		<p><label>Title:<br /><input name="<?php echo $this->get_field_name("title") ?>" type="text" value="<?php echo htmlspecialchars($instance['title'], ENT_QUOTES); ?>" style="width:100%;" /></label></p>
		<p><label>No. of items to show: <input type="text" name="<?php echo $this->get_field_name("display") ?>" value="<?php echo htmlspecialchars($instance['display'], ENT_QUOTES); ?>" style="width:30px;" /></label></p>
		<p><label>Random: <input name="<?php echo $this->get_field_name("random") ?>" type="checkbox" value="true" <?php echo $checked; ?> /></label></p>
		
        <!---
        <p><label>Full testimonials page:<br />
			<select name="<?php echo $this->get_field_name("page_link") ?>" style="width:100%">
				<?php

            add_filter('posts_where', 'filter_testimonial');
            query_posts($query_string);
            // query_posts("post_content LIKE '%[show_testimonial]%'&post_status=publish&post_type=page");
            if (have_posts()) : while (have_posts()) : the_post();

            ?>
					<option value="<?php the_permalink(); ?>" <?php if ($data['page_link'] == "") {
                if (get_permalink($instance['page_id']) == get_permalink()) {
                    echo "selected";
                }
            } else {
                if ($data['page_link'] == get_permalink()) {
                    echo "selected";
                }
            }

            ?>><?php the_title(); ?></option>
				<?php
            endwhile;
            else:
                ?>
						<option value="no_page">No page with testimonial short code</option>
				<?php
                endif;
            // Reset Query
            wp_reset_query();

            ?>
			</select></label></p>-->	<?php
        } // end function form
        
        
        function tfuse_testimonial_details($k = 0) {
	        $option = get_option('testimonials_manager');
	        $this->testimonials_count = count($option['data']);
	        $this->testimonials_details = $option['data'];
	        $this->testimonials_title = $option['data'][$k]['name'];
	        //$this->testimonials_subtitle = $option['data'][$k]['subtitle'];
	        //$this->testimonials_icon = $option['data'][$k]['icon'];
	        $this->testimonials_company = $option['data'][$k]['company'];
	        $this->testimonials_url = $option['data'][$k]['url'];
	        $this->testimonials_text = $option['data'][$k]['text'];  
        }
        
        
        
    } // end class 
    
    // Register the widget.
    register_widget("testimonials_manager_widget");


?>