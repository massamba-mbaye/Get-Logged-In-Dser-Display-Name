<?php

/*
Plugin Name:  Get Logged In User Display Name
Version: 3.0
Description: This plugin allows you to display the logged in user display name or email. If not connected, it will display "Accéder à mon compte". Use this shortcode [show_loggedin_as]
Author: Massamba MBAYE
Author URI: https://www.linkedin.com/in/massamba-mbaye/
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: Get Logged In User Display Name
*/

function show_loggedin_function( $atts ) {

	global $current_user, $user_login;
      	get_currentuserinfo();
	add_filter('widget_text', 'do_shortcode');
	if ($user_login) {
			if (isset($current_user->display_name)) {
				return $current_user->display_name;
			}
			else
				return $current_user->user_email;
		}
	else
		return "Accéder à mon compte";
	
}
add_shortcode( 'show_loggedin_as', 'show_loggedin_function' );

?>