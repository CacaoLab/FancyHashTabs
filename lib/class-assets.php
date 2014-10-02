<?php namespace com\github\cacaolab\lib;

class Assets extends Wordpress {

    private $path = '';

    private $assets_path = '';

    public function __construct( $path ) {
        $this->path = $path;
        $this->assets_path = $this->path . '/assets';
        $this->register();
    }

    private function register(){
        wp_register_script('jquery-hash-tabs', $this->get_path_from_JS_asset( 'jquery.hash-tabs.min.js' ), array('jquery'), null, true );
    }

    private function get_path_from_JS_asset( $file_name ){
        return ( ( $this->get_JS_directory() ) . '/' . $file_name ); 
    }

    private function get_JS_directory(){
        return ($this->assets_path . '/js');
    }

    public function load(){
        add_action('init', $this->call_method( 'enqueue_scripts' ) );
    }
    
    public function enqueue_scripts(){
        wp_enqueue_script('jquery-hash-tabs');
    }
}
