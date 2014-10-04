<?php namespace com\github\cacaolab\lib;

class Shortcode extends Wordpress{
    public function hashtabs_shortcode( $atts, $content = null){
        return
            '<div id="Fancy-Hash-Tabs">' .
            $this->add_titles( $content ) .
            '</div>';
    }

    private function add_titles( $content ){
        $titles = $this->get_titles( $content );
        $titles = $this->format_titles( $titles );
        $html = '';
        foreach( $titles as $title ){
            $html .= $title;
        }

        return $html;
    }

    private function get_titles( $content ){
        $pattern = '/title=".*?"/';
        $results = [];

        preg_match_all( $pattern , $content, $results );

        return $results[0];
    }

    private function format_titles( $titles = array() ){
        $result = array();
        foreach( $titles as $title ){
            $result[] = $this->get_title_inside_double_quotes( $title );
        }
        return $result;
    }

    private function get_title_inside_double_quotes( $text ){
        $pattern = '/"[^"]*"/';
        $title = "";

        if ( preg_match( $pattern, $text, $result ) ){
            $title = $this->delete_quotes( $result[0] );
        }

        return $title;
    }

    private function delete_quotes( $text ){
        $start = strpos('"', $text) + 1;
        $text = substr( $text, $start);
        $lengt = strlen( $text );
        $text = substr( $text, 0, $lengt - 1);

        return $text;
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
