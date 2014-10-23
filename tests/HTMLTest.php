<?php namespace EasyTabs\Test;
use EasyTabs\lib\HTML;

class HTMLTest extends \PHPUnit_Framework_TestCase{
    public function inputDeleteQuotes(){
        return [
            ['"""""""""', ''],
            ['"hi", to this "world"', 'hi, to this world']
        ];
    }

    /**
     * @dataProvider inputDeleteQuotes
     */
    public function testDeleteQuotes( $input, $expected ){
        $this->assertEquals( HTML::delete_quotes($input), $expected );
    }
}
