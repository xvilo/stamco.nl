<?php
/*
Plugin Name: Advanced Custom Fields: Gallery Field
Plugin URI: http://www.advancedcustomfields.com/
Description: This premium Add-on adds a gallery field type for the Advanced Custom Fields plugin
Version: 1.1.1
Author: Elliot Condon
Author URI: http://www.elliotcondon.com/
License: GPL
Copyright: Elliot Condon
*/

add_action('acf/register_fields', 'acfgp_register_fields');

function acfgp_register_fields()
{
	include_once('gallery.php');
}
?>
