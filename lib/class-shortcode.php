<?php namespace com\github\cacaolab\lib;

class Shortcode extends Wordpress{

    public function register(){
        add_shortcode( 'hashtabs', $this->call_method('hashtabs_shortcode') );
        add_shortcode( 'tab', $this->call_method('tab_shortcode') );
    }

    public function tab_shortcode( $atts, $content = null ){
        $html = '<section>';
        $html .= $content; 
        $html .= '</section>';

        return $html;
    }

    public function hashtabs_shortcode( $atts, $content = null){
        return
            '<div id="Fancy-Hash-Tabs">' .
            $this->add_titles( $content ) .
            $this->add_content( $content ) .
            '</div>';
    }

    private function add_content( $content ) {
        return 
            '<div class="tab-pane-container">' .
            do_shortcode( $content ) .
            '</div>';
    }

    private function add_titles( $content ){
        $titles = $this->get_titles( $content );
        $titles = $this->format_titles( $titles );
        $html = '<nav class="tab-nav" role="tablist">';
        foreach( $titles as $title ){
            $html .= 
                '<li><a href="#">' .
                $title .
                '</a></li>';
        }

        $html .= '</nav>';

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
        $text = str_replace( '"', '', $text);
        return $text;
    }

    public function apply_filters(){
        remove_filter( 'the_content', 'wpautop' );
        add_filter( 'the_content', 'wpautop' , 99);
        add_filter( 'the_content', 'shortcode_unautop',100 );
    }
}
