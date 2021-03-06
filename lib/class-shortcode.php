<?php namespace EasyTabs\lib;

class Shortcode extends Wordpress{

    private $assets;

    public function __construct( $assets = null ){
        parent::__construct();
        $this->assets = $assets;
        $this->load_assets();
        $this->register();
    }

    private function load_assets(){
        $this->assets->load();
    }

    private function register(){
        add_shortcode( 'EasyTabs', $this->call_method('easytabs_shortcode') );
        add_shortcode( 'tb', $this->call_method('tab_shortcode') );
    }

    public function easytabs_shortcode( $atts, $content = null){
        $html_content = $this->add_titles( $content );
        $html_content .= $this->add_content( $content );

        $attributes = array(
            'id' => 'tab-container',
            'class' => 'tab-container'
        );
        return HTML::generate_tag('div',  $html_content, $attributes );
    }

    private function add_content( $content ) {
        return do_shortcode( $content );
    }

    public function tab_shortcode( $atts, $content = null ){
        $options = shortcode_atts( array(
            'title' => 'Title',
        ), $atts);

        $attributes = array(
            'id' => HTML::generate_ID( $options['title'] )
        );

        return HTML::generate_tag('div', do_shortcode( $content ) , $attributes);
    }

    private function add_titles( $content ){
        $titles = $this->get_titles( $content );
        $titles = $this->format_titles( $titles );
        $attributes = array(
            'class' => 'etabs'
        );
        return HTML::generate_tag('ul', $this->generate_tab_titles($titles), $attributes );
    }

    private function generate_tab_titles( $titles = array() ){
        $list = '';
        foreach( $titles as $title ){
            $link_options = array(
                'href' => '#' . HTML::generate_ID( $title )
            );
            $link = HTML::generate_tag('a', $title, $link_options);

            $list_options = array(
                'class' => 'tab'
            );
            $list .= HTML::generate_tag('li', $link, $list_options);
        }
        return $list;
    }

    private function get_titles( $content ){
        $start = 'title="';
        $end = '"';
        return HTML::get_inside_of($start, $end, $content);
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
            $title = HTML::delete_quotes( $result[0] );
        }

        return $title;
    }
}
