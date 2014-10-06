<?php namespace com\github\mitogh\FancyHashTabs\lib;

class Wordpress {
    public function __construct(){
        $this->apply_filters();
    }

    /**
     * Filters to avoid HTML tags like: <p>, <br> when output the
     * shortcode
     */
    private function apply_filters(){
        remove_filter( 'the_content', 'wpautop' );
        add_filter( 'the_content', 'wpautop' , 99);
        add_filter( 'the_content', 'shortcode_unautop',100 );
    }

    /**
     * Array to call the method from the class in the action as is required, more info:
     * http://codex.wordpress.org/Function_Reference/add_action#Using_with_a_Class
     */
    protected function call_method( $method_name ){
        return array( $this, $method_name );
    }
}
