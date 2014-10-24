<?php namespace EasyTabs\Test;
use EasyTabs\lib\HTML;

class HTMLTest extends \PHPUnit_Framework_TestCase{

    /**
     * @dataProvider inputIsEnabled
     */
    public function testIsEnabled( $on_input, $off_input ){
        $condition_result = HTML::is_enabled( $on_input );
        $this->assertTrue( $condition_result );
        
        $condition_result = HTML::is_enabled( $off_input );
        $this->assertFalse( $condition_result );
    }

    public function inputIsEnabled(){
        return array(
            array('on', ''),
            array('oN', 'off'),
            array('On', null),
            array('ON', 'OFf')
        );
    }

    
    public function testChecked(){
        $expected = 'checked';
        $this->expectOutputString( $expected );
        echo HTML::checked();
    }

    /**
     * @dataProvider inputGenerateID
     */
    public function testGenerateID( $input, $expected ){
        $actual = HTML::generate_ID($input);
        $this->assertEquals( $expected, $actual );
    }

    public function inputGenerateID(){
        return array(
            array('This is a long title', 'this-is-a-long-title'),
            array('    long title with spaces    ', 'long-title-with-spaces'),
            array('Title with 123121 numbers', 'title-with-123121-numbers'),
            array('------', '------'),
            array('LONDON', 'london'),
            array('', '')
        );
    }
    /**
     * @dataProvider inputDeleteQuotes
     */
    public function testDeleteQuotes( $input, $expected ){
        $actual = HTML::delete_quotes($input);
        $this->assertEquals( $expected, $actual );
    }

    public function inputDeleteQuotes(){
        return array(
            array('"""""""""', ''),
            array('"h" "e" "l" "l" "o"', 'h e l l o'),
            array('', ''),
            array('the universe is amazing"', 'the universe is amazing'),
            array('"hi", to this "world"', 'hi, to this world')
        );
    }
}
