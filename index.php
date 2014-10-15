<?php namespace com\github\mitogh\EasyTabs;
use \com\github\mitogh\EasyTabs\lib as Library;
/**
 * Plugin Name: WP Easy Tabs
 * Plugin URI: https://github.com/mitogh/WP-EasyTabs
 * Description: Allows to insert content in tabs. Use the Easy Tabs Library as base.
 * Version: 0.1
 * Author: Crisoforo Gaspar
 * Author URI: http://www.crisoforo.com
 * License: GPL2
 */
$plugin_directory = plugin_dir_path( __FILE__ );
$plugin_url = plugins_url( '', __FILE__ );
$lib_directory = './lib/';

include_once $plugin_directory . $lib_directory . 'class-wordpress.php';
include_once $plugin_directory . $lib_directory . 'class-assets.php';
include_once $plugin_directory . $lib_directory . 'class-shortcode.php';

$shortcode = new Library\Shortcode();
$assets = new Library\Assets( $plugin_url );
$assets->load();
