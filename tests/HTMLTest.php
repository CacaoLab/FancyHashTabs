<?php namespace EasyTabs\Test;
use EasyTabs\lib\HTML;

class HTMLTest extends \PHPUnit_Framework_TestCase{
    public function inputDeleteQuotes(){
        return array(
            array('"""""""""', ''),
            array('"h" "e" "l" "l" "o"', 'h e l l o'),
            array('', ''),
            array('the universe is amazing"', 'the universe is amazing'),
            array('"hi", to this "world"', 'hi, to this world')
        );
    }

    /**
     * @dataProvider inputDeleteQuotes
     */
    public function testDeleteQuotes( $input, $expected ){
        $actual = HTML::delete_quotes($input);
        $this->assertEquals( $expected, $actual );
    }
}
