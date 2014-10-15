<?php namespace com\github\mitogh\EasyTabs\lib;
class HTML{
    public static function get_inside_of($start = '', $end = '', $from = ''){
        $pattern = '/'. $start . '.*?'. $end . '/i';
        $results = [];

        preg_match_all( $pattern , $from, $results );

        return $results[0];
    }

    public static function delete_quotes( $content = ''){
        $double_quotes = '"';
        $empty_string = '';
        return str_replace( $double_quotes, $empty_string, $content);
    }
}
