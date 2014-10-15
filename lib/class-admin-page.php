<?php namespace EasyTabs\lib;

class AdminPage extends Wordpress{
    private $template_path;

    public function __construct( $template_path = '' ){
        $this->template_path = $template_path;
        $this->register_actions();
    }

    private function register_actions(){
        add_action('admin_menu', $this->call_method('plugin_admin_add_page') );
    }

    public function plugin_admin_add_page() {
        add_options_page('WP Easy Tabs - Options', 'Easy Tabs', 'manage_options', 'wp-easy-tabs', $this->call_method('plugin_options_page') );
    }

    public function plugin_options_page() {
        echo HTML::generate_tag('h2', 'Easy Tabs');
        $this->theme_front_page_settings();
    }

    private function theme_front_page_settings() {
        include_once $this->template_path;
    }
}
