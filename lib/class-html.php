<?php namespace com\github\mitogh\EasyTabs\lib;
class HTML{

    public static function div( $content, $attributes = array() ){
        return '<div' . HTML::attributes( $attributes ) . '>' .  $content . '</div>';
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
        if (is_numeric($key)) $key = $value;

        if ( ! is_null($value) ){
            return $key . '="' . $value .'"';
        }
    }

    public static function get_inside_of($start = '', $end = '', $from = ''){
        $pattern = '/'. $start . '.*?'. $end . '/i';
        $results = [];

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
