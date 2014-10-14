<?php namespace com\github\mitogh\FancyHashTabs\lib;

class Shortcode extends Wordpress{

    public function __construct(){
        parent::__construct();

        $this->register();
    }

    private function register(){
        add_shortcode( 'hashtabs', $this->call_method('hashtabs_shortcode') );
        add_shortcode( 'tab', $this->call_method('tab_shortcode') );
    }


    public function hashtabs_shortcode( $atts, $content = null){

        return
            '<div id="tab-container" class="tab-container">' .
            $this->add_titles( $content ) .
            $this->add_content( $content ) .
            '</div>';
    }

    private function add_content( $content ) {
        return do_shortcode( $content );
    }

    public function tab_shortcode( $atts, $content = null ){
        $options = shortcode_atts( array(
            'title' => 'Default title',
        ), $atts);

        $html = '<div id="'. $this->generate_ID( $options['title'] ) .'">';
        $html .= $content; 
        $html .= '</div>';
        return $html;
    }

    private function add_titles( $content ){
        $titles = $this->get_titles( $content );
        $titles = $this->format_titles( $titles );
        $html = '<ul class="etabs">';

        foreach( $titles as $title ){
            $html .= 
                '<li class="tab"><a href="#'. $this->generate_ID($title) .'">' .
                $title .
                '</a></li>';
        }

        $html .= '</ul>';

        return $html;
    }

    private function generate_ID( $name ){
        $name = trim($name);
        $name = strtolower($name);
        return str_replace(" ", "-", $name);
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

    private function delete_quotes( $text = '' ){
        return str_replace( '"', '', $text);
    }

}
