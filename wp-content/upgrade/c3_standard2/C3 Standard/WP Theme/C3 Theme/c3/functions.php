<?php
/* Load the tfuse class. */
require_once( TEMPLATEPATH . '/library/tfuse.php' );

/* Initialize the tfuse framework. */
$tfuse = new tfuse();
$tfuse->init();

define( 'PREFIX', $tfuse->prefix );

add_theme_support( 'post-thumbnails' );

// Disable Admin Bar for all users
add_filter('show_admin_bar', '__return_false');
?>