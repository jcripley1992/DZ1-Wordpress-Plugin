<?php

//	REGISTER VARIOUS HOOKS
//	ACTIVATION HOOK
register_activation_hook( __FILE__, 'activate' );
//	DEACTIVATION HOOK
register_deactivation_hook( __FILE__, 'deactivate' );

// %SITEURL% fix for xslt - Legacy Fix - No Longer Needed Unless XSLT used.
add_filter('the_content','replace_content');

// HOOK PAGINATION FIX
add_action( 'parse_query', 'pagifix' );

// ALLOW SHORTCODES IN WIDGETS

add_filter('widget_text', 'do_shortcode');

?>