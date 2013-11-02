<?php
	
// Do not delete these lines

if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');

if ( post_password_required() ) { ?>
	<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'tfuse') ?></p>

<?php return; } ?>

<?php $comments_by_type = &separate_comments($comments); ?>    

<!-- You can start editing here. -->

<!-- comments -->
<div class="comment-list"> 
	<a href="<?php comments_link(); ?>" class="btn-more alignright">Add comment</a>
    <h2><?php _e('Comments', 'tfuse') ?></h2>

<?php if ( have_comments() ) : ?>

	<?php if ( ! empty($comments_by_type['comment']) ) : ?>        

    <ol class="commentlist">

        <?php wp_list_comments('avatar_size=40&callback=custom_comment&type=comment'); ?>
    
    </ol>    

    <div class="navigation">
        <div class="fl"><?php previous_comments_link() ?></div>
        <div class="fr"><?php next_comments_link() ?></div>
        <div class="fix"></div>
    </div><!-- /.navigation -->
	<?php endif; ?>
		    
	<?php /* if ( ! empty($comments_by_type['pings']) ) : ?>
    		
        <h5 id="pings"><?php _e('Trackbacks/Pingbacks', 'tfuse') ?></h5>
    
        <ol class="pinglist">
            <?php wp_list_comments('type=pings&callback=list_pings'); ?>
        </ol>
    	
	<?php endif; */ ?>
    	
<?php else : // this is displayed if there are no comments so far ?>

		<?php if ('open' == $post->comment_status) : ?>
			<!-- If comments are open, but there are no comments. -->
			<p class="nocomments"><?php _e('No comments yet.', 'tfuse') ?></p>

		<?php else : // comments are closed ?>
			<!-- If comments are closed. -->
			<p class="nocomments"><?php _e('Comments are closed.', 'tfuse') ?></p>

		<?php endif; ?>

<?php endif; ?>

</div> <!-- /#comments_wrap -->

<?php if ('open' == $post->comment_status) : ?>

<div id="respond">
<!-- comment form -->
<div class="comment-form" id="addcomment">
	
     <h2><?php _e('Add Comment', 'tfuse') ?>:</h2>
    
    <div class="cancel-comment-reply">
        <small><?php cancel_comment_reply_link(); ?></small>
    </div><!-- /.cancel-comment-reply -->
    

	<?php if ( get_option('comment_registration') && !$user_ID ) : //If registration required & not logged in. ?>

            <p><?php _e('You must be', 'tfuse') ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"><?php _e('logged in', 'tfuse') ?></a> <?php _e('to post a comment.', 'tfuse') ?></p>

	<?php else : //No registration required ?>
		
        <a name="comments"></a>
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

		<?php if ( $user_ID ) : //If user is logged in ?>

			<p><?php _e('Logged in as', 'tfuse') ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(); ?>" title="<?php _e('Log out of this account', 'tfuse') ?>"><?php _e('Logout', 'tfuse') ?> &raquo;</a></p>

		<?php else : //If user is not logged in ?>

            <p id="inputtext">
              <input name="author" size="40" type="text"  id="author"  value="enter your name" onfocus="if (this.value == 'enter your name') {this.value = '';}" onblur="if (this.value == '') {this.value = 'enter your name';}" />
            </p>
            
            <p id="inputtext">
              <input name="email" class="inputtext" size="40" type="text" id="email" value="enter your email" onfocus="if (this.value == 'enter your email') {this.value = '';}" onblur="if (this.value == '') {this.value = 'enter your email';}" />
            </p>
            
            <p id="inputtext">
              <input name="url" class="inputtext" size="40" type="text" id="url" value="enter your website" onfocus="if (this.value == 'enter your website') {this.value = '';}" onblur="if (this.value == '') {this.value = 'enter your website';}" />
            </p>
            <div class="clear"></div>
             
		<?php endif; // End if logged in ?>

		<!--<p><strong>XHTML:</strong> <?php _e('You can use these tags', 'tfuse'); ?>: <?php echo allowed_tags(); ?></p>-->
                     
            <p id="textarea">
              <textarea name="comment" id="comment" cols="40" rows="10"></textarea>
            </p>
            
            <p class="btn-send">
              <input value="Send Message" name="submit" id="submit"  type="submit" />
            </p>
           
            <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
		
		<?php comment_id_fields(); ?>
		<?php do_action('comment_form', $post->ID); ?>
        
        </form>

	<?php endif; // If registration required ?>

      <div class="clear"></div>
    </div>
    <!--/ comment form -->
</div>

<?php endif; // if you delete this the sky will fall on your head ?>
