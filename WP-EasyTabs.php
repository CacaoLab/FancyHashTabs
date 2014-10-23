<?php namespace EasyTabs;
use EasyTabs\lib as Library;
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
include_once $plugin_directory . $lib_directory . 'class-html.php';
include_once $plugin_directory . $lib_directory . 'class-assets.php';
include_once $plugin_directory . $lib_directory . 'class-shortcode.php';
include_once $plugin_directory . $lib_directory . 'class-admin-page.php';

$assets = new Library\Assets( $plugin_url );
$shortcode = new Library\Shortcode( $assets );

$template_admin_path = $plugin_directory . $lib_directory . 'admin-template.php';

$admin_page = new Library\AdminPage( $template_admin_path );
