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
        $options = array(
            'page_title' => 'WP Easy Tabs - Options',
            'menu_title' => 'Easy Tabs',
            'capability' => 'manage_options',
            'slug' => 'wp-easy-tabs',
        );

        add_options_page( $options['page_title'], $options['menu_title'], $options['capability'], $options['slug'], $this->load_function() );
    }

    private function load_function(){
        return $this->call_method( 'plugin_options_page');
    }

    public function plugin_options_page() {
        echo HTML::generate_tag('h2', 'Easy Tabs');
        $this->theme_front_page_settings();
    }

    private function theme_front_page_settings() {
        include_once $this->template_path;
    }
}
