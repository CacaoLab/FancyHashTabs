<?php namespace com\github\mitogh\EasyTabs\lib;
class HTML{
    public static function delete_quotes( $content = ''){
        $double_quotes = '"';
        $empty_string = '';
        return str_replace( $double_quotes, $empty_string, $content);
    }
}
