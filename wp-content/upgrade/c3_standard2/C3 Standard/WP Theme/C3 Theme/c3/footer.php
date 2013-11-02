            
    </div>
<!--/ container -->    

	
<!-- footer -->
	<div class="footer">
    	<div class="container">
     		
            <div class="cols fcol-1">          
            	<?php dynamic_sidebar('Footer 1'); ?>
            </div>
            
            <div class="cols fcol-2">
            	<?php dynamic_sidebar('Footer 2'); ?>
            </div>
            
            <div class="cols fcol-3">
            	<?php dynamic_sidebar('Footer 3'); ?>
            </div>
            
            <div class="cols fcol-4">
            	<?php dynamic_sidebar('Footer 4'); ?>
            </div>
            
			<div class="cols fcol-5">         
            	<?php dynamic_sidebar('Footer 5'); ?>         
			</div>
            
            <div class="clear"></div>
        </div>
    </div>
<!--/ footer -->
    
</div>

<?php wp_footer(); ?>
<?php if ( get_option(PREFIX."_google_analytics") <> "" ) { echo html_entity_decode(get_option(PREFIX."_google_analytics"),ENT_QUOTES, 'UTF-8'); } ?>

</body>
</html>