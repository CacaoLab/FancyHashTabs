<?php namespace com\github\cacaolab\lib;

class Shortcode extends Wordpress{
    public function create( $atts, $content = null){
        return 'Hash Tabs';
    }

    public function register(){
        add_shortcode( 'hashtabs', $this->call_method('create') );
    }
}
