<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

	<title><?php wp_title() ?></title>

    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option(PREFIX.'_feedburner_url') <> "" ) { echo get_option(PREFIX.'_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    
    <?php $template_directory = get_bloginfo('template_directory'); ?>   
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' );  ?>
    <?php wp_head(); ?>

    <script type="text/javascript">
        jQuery(function() {
            jQuery('#topslider').tabs({ fx: [{opacity:'toggle', duration:'fast'},{opacity:'toggle', duration:'fast'}] }).tabs('rotate', <?php echo get_option(PREFIX.'_homepage_slider_timeout')*1000; ?>);
        });
    </script>
    <!--/ topslider -->

    <?php include( THEME_MODULES . '/count_slider_image.php' ); ?>
    
</head>

<?php global $fullWidth; 
	  if ( is_home() ) { $hid = "homepage"; } 
	  elseif ( $fullWidth==1 ) { $hid = "onecolumn"; } 
	  else { $hid = ""; } ?>
<body <?php body_class() ?>>

    <div class="bodywrap <?php echo $hid; ?>">
        <div class="container">
            
            <!-- header -->
          <div class="header">
                <div class="logo"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('description'); ?>"><img src="<?php if ( get_option(PREFIX.'_logo') <> "" ) { echo get_option(PREFIX.'_logo'); } else { echo $template_directory ?>/images/logo.jpg<?php } ?>" alt="<?php bloginfo('name'); ?>" /></a></div>
				<?php include( THEME_MODULES . '/page-nav.php' ); ?>
             </div>
            <!--/ header -->
