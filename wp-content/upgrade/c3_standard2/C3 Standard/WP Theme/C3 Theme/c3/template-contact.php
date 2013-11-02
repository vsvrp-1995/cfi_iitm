<?php
/*
Template Name: Contact Form
*/

$error = true; if(isset($_POST['email'])) { include(THEME_FUNCTIONS . '/sendmail.php'); }

get_header(); 

?>

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
                    
                    <div class="contact-form">
                  
                        <form action="" method="post" class="ajax_form">
                            <input type="hidden" name="temp_url" value="<?php bloginfo('template_directory'); ?>" />
                            <input type="hidden" id="tempcode" name="tempcode" value="<?php echo base64_encode(get_option('admin_email')); ?>" />
                            <input type="hidden" id="myblogname" name="myblogname" value="<?php bloginfo('name'); ?>" />
                            <?php if (!isset($error) || $error == true){ ?> 
                                <p id="inputtext" class="<?php if (isset($the_nameclass)) echo $the_nameclass; ?>"><label><?php _e('Name', 'tfuse') ?> *</label> <input name="yourname" value="<?php if (isset($the_name)) echo $the_name?>" id="name" class="text_input input_middle required" size="40" type="text" /></p>
                                <p id="inputtext" class="<?php if (isset($the_emailclass)) echo $the_emailclass; ?>"><label><?php _e('Email', 'tfuse') ?> *</label> <input name="email" value="<?php if (isset($the_email)) echo $the_email ?>" id="email" class="inputtext text_input input_middle required" size="40" type="text" /></p>
                                <p id="inputtext" class=""><label><?php _e('Company', 'tfuse') ?></label> <input name="company" value="" class="inputtext" size="40" type="text" /></p>
                                <p id="inputtext" class=""><label><?php _e('Country', 'tfuse') ?></label> <input name="country" value="" class="inputtext" size="40" type="text" /></p>
                                <div class="clear"></div>
                                <p id="textarea" class="<?php if (isset($the_messageclass)) echo $the_messageclass; ?>"><label><?php _e('Message', 'tfuse') ?> *</label> <textarea id="message" name="message" class="text_area textarea_middle required" cols="40" rows="10"><?php  if (isset($the_message)) echo $the_message ?></textarea></p>
                                <p class="btn-send text-right">
                                    <span class="notice-field"><em><strong>* mandatory fileds</strong></em></span> 
                                    <input value="Send Message" name="Send" title="send" class="contact-submit submit" id="send"  type="submit" /> 
                
                                </p>
                            <?php } else { ?> 
                            
                                <br>
                                <h2 style="width:100%;"><?php _e('Your message has been sent!', 'tfuse') ?></h2>
                                <div class="confirm">
                                    <p class="textconfirm"><br /><?php _e('Thank you for contacting us,', 'tfuse') ?><br/><?php _e('We will get back to you within 2 business days.', 'tfuse') ?></p>
                                </div>
            
                            <?php } ?>
                        </form>
                        <div class="clear"></div>
                        
                    </div>  
    
                <?php endwhile; else: ?>     
            
                    <div class="contact-form">
                
                         <p><?php _e('Sorry, no posts matched your criteria.', 'tfuse') ?></p>
                     
                    </div>
                    <!-- contact_box -->
                     
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