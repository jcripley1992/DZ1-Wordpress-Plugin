<?php
/* Plugin Name: Dezrez Property Search Integration
Plugin URI: http://dezrez.com
Description: This is a plug in to integrate lettings / sales search from dezrez. NEW: Now using Simple XML!
Version: 2.0
Author: Branding Team (Dezrez Services LTD)
Author URI: http://dezrez.com
*/

// 	WELCOME TO THE DEZREZ PLUGIN.
//	DEVELOPED BY THE BRANDING TEAM.
//	FOR HELP AND SUPPORT CONTACT US ON 0845 465 22 22 AND SELECT OPTION 2.


//	TO MODIFY THE LAYOUT OF THE INDIVIDUAL VISUAL ELEMENTS (SEARCH FORM AND RESULTS AND DETAILS ETC, MODIFY THE FILES IN THE TEMPLATES.

//	DONT TOUCH ANYTHING ELSE, IF YOU BREAK IT WE WILL CHARGE TO REPAIR THE FILES. :)

///////////////////////////////////////////////////////////
//	LOAD CORE FUNCTIONS AND BUGFIXES
include 'functions.php';
include 'hooks.php';
include 'shortcodes.php';
///////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////
//	LOAD DEZREZ DASHBOARD, ADMIN PAGE & REGISTER SHORTCODES
//include 'dashboard.php';
add_action( 'admin_menu', 'create_dezrez_admin' );
add_action( 'init', 'register_shortcodes');
register_activation_hook( __FILE__, 'activate' );
register_deactivation_hook( __FILE__, 'deactivate' );
///////////////////////////////////////////////////////////

?>