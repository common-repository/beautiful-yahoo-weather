<?php 
/*
Plugin Name: Beautiful Yahoo Weather
Plugin URI: http://www.wp-book.ir/
Description: A simple plugin that enables you to add Yahoo Weather to add your site.
Version: 1.4.2
Author: Mohammad Pishdar
Author URI: http://www.wp-book.ir/
License: GPLv2

Copyright 2013 Beautiful Yahoo Weather admin@simplesharebuttons.com

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
*/ 
register_uninstall_hook(__FILE__,"byw_uninstall");
// uninstall byw
function byw_uninstall() {
delete_option('byw_lang');
delete_option('byw_name_city');
delete_option('byw_woeid');
delete_option('byw_image_set');
delete_option('byw_unit');
delete_option('byw_bgcolor');
delete_option('byw_css');
delete_option('byw_mylang');
delete_option('byw_smylang');
delete_option('byw_fontsize'); }

include_once (plugin_dir_path(__FILE__) . 'inc/options-page.php');
include_once (plugin_dir_path(__FILE__) . 'inc/shortcode.php');
include_once (plugin_dir_path(__FILE__) . 'inc/widget.php'); 
?>
