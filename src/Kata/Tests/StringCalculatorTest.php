<?php

namespace Kata;

class StringCalculatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var StringCalculator
     */
    private $stringCalculator;
    
    public function setUp() {
        parent::setUp();
        $this->stringCalculator = new StringCalculator();
    }
    
    /**
     * @test
     * @dataProvider valuesProvider
     * @param string $string
     * @param string $expected
     */
    public function addStrings($string, $expected)
    {
        $this->assertSame($expected, $this->stringCalculator->add($string));
    }
    
    /**
     * @return array
     */
    public function valuesProvider()
    {
        return array(
            array('', '0'),
            array('0', '0'),
            array('1', '1'),
            array('2', '2'),
            array('0,1', '1'),
            array('1,1', '2'),
            array('2,0', '2'),
            array('1,2,3', '6'),
            array('0,1,2,4', '7'),
            array('0,2,0,1,0', '3'),
            array("1\n2,3", '6'),
            array("1,2\n3", '6'),
            array("0\n1\n1", '2'),
            array("//;\n1;2;3", '6'),
            array("//dupa\n1dupa2dupa3", '6'),
        );
    }
}