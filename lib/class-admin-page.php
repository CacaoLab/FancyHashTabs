<?php namespace EasyTabs\lib;

class AdminPage extends Wordpress{
    private $template_path;

    public function __construct( $template_path = '' ){
        $this->template_path = $template_path;
        $this->register_actions();
    }

    private function register_actions(){
        add_action('admin_menu', $this->call_method('plugin_admin_add_page') );
        add_action('admin_init', $this->call_method('register_options') );
    }

    public function register_options(){
        add_option( 'easytabs_disable_css', 'off');
        register_setting(
            'easytabs_options', // Option group
            'easytabs_disable_css', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );
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

    public function sanitize( $input ){
        $result;
        if( is_null($input) || empty($input) || strtolower($input) === 'off' ){
            $result = 'off';
        }else if( strtolower($input) === 'on'){
            $result = 'on';
        }
        return $result;
    }

    private function load_function(){
        return $this->call_method( 'plugin_options_page');
    }

    public function plugin_options_page() {
        echo HTML::generate_tag('h2', 'Easy Tabs');
        $this->load_admin_template();
    }

    private function load_admin_template() {
        include_once $this->template_path;
    }
}
