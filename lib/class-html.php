<?php namespace EasyTabs\lib;
class HTML{

    public static function generate_tag( $tag = '', $content = '', $attributes = array() ){
        return '<' . $tag . HTML::attributes( $attributes ) . '>' . $content . '</' . $tag . '>';
    }

    /**
     * Methods extracted from the Laravel: HtmlBuilder class
     * and modify for this purpose
     */
    public function attributes( $attributes = array() ){
        $html = array();
        foreach ( $attributes as $key => $value ) {
            $element = HTML::attribute_element($key, $value);

            if ( ! is_null( $element ) ){
                $html[] = $element;
            }
        }

        return count($html) > 0 ? ' ' . implode( ' ', $html ) : '';
    }

    public function attribute_element($key, $value){
        if ( is_numeric($key) ) $key = $value;

        if ( ! is_null($value) ){
            return $key . '="' . $value .'"';
        }
    }

    public static function is_enabled( $field = '' ){
        return (strtolower( $field ) === 'on');
    }

    public static function checked(){
        echo 'checked';
    }

    /**
     * Returns the text "Content [start end] end of my sentence"
     * [start end] from a sentence, returns an array with all the
     * results. 
     *
     * @return array
     */
    public static function get_inside_of($start = '', $end = '', $from = ''){
        $pattern = '/'. $start . '.*?'. $end . '/i';
        $results = array();

        preg_match_all( $pattern , $from, $results );

        return $results[0];
    }

    public static function generate_ID( $name = '' ){
        $name = trim($name);
        $name = strtolower($name);
        return str_replace(" ", "-", $name);
    }

    public static function delete_quotes( $content = ''){
        $double_quotes = '"';
        $empty_string = '';
        return str_replace( $double_quotes, $empty_string, $content);
    }
}
