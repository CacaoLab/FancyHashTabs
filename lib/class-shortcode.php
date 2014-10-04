<?php namespace com\github\cacaolab\lib;

class Shortcode extends Wordpress{
    public function hashtabs_shortcode( $atts, $content = null){
        return
            '<div id="Fancy-Hash-Tabs">' .
            \do_shortcode( $content ) .
            '</div>';
    }

    public function tab_title_shortcode( $atts, $content = null ){
        extract( 
            shortcode_atts( array(
                'title' => 'Tab'
            ), $atts )
        );

        return 
            '<li>' .
            $title .
            '</li>';
    }

    public function tab_shortcode( $atts, $content = null ){
        return 
            '<div>' .
            $content .
            '</div>';
    }

    public function register(){
        add_shortcode( 'hashtabs', $this->call_method('hashtabs_shortcode') );
        add_shortcode( 'tabTitle', $this->call_method('tab_title_shortcode') );
        add_shortcode( 'tab', $this->call_method('tab_shortcode') );
    }
}
