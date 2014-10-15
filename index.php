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
include_once $plugin_directory . $lib_directory . 'class-html.php';
include_once $plugin_directory . $lib_directory . 'class-shortcode.php';

$shortcode = new Library\Shortcode();
$assets = new Library\Assets( $plugin_url );
$assets->load();

add_action('admin_menu', __NAMESPACE__ . '\plugin_admin_add_page');

function plugin_admin_add_page() {
    add_options_page('WP Easy Tabs - Options', 'Easy Tabs', 'manage_options', 'wp-easy-tabs', __NAMESPACE__ . '\plugin_options_page');
}

function plugin_options_page() {
    echo "<h2>Easy Tabs</h2>";
}
