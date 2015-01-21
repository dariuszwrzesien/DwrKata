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
     */
    public function addingEmptyString()
    {
        $this->assertSame(0, $this->stringCalculator->add(''));
    }
    
    /**
     * @test
     * @dataProvider oneValueProvider
     * @param string $string
     * @param string $expected
     */
    public function addingOneValue($string, $expected)
    {
        $this->assertSame($expected, $this->stringCalculator->add($string));
    }
    
    /**
     * @return array
     */
    public function oneValueProvider()
    {
        return array(
            array('0', '0'),
            array('1', '1'),
            array('2', '2')
        );
    }
    
    /**
     * @test
     * @dataProvider twoValueProvider
     * @param string $values
     * @param string $expected
     */
    public function addingTwoValues($values, $expected)
    {
        $this->assertSame($expected, $this->stringCalculator->add($values));
    }
    
    /**
     * @return array
     */
    public function twoValueProvider()
    {
        return array(
            array('0, 1', '1'),
            array('1, 1', '2'),
            array('2, 0', '2')
        );
    }
    
    /**
     * @test
     * @dataProvider multipleValuesProvider
     * @param string $values
     * @param string $expected
     */
    public function addingMultipleValues($values, $expected)
    {
        $this->assertSame($expected, $this->stringCalculator->add($values));
    }
    
    public function multipleValuesProvider()
    {
        return array(
            array('1,2,3', '6'),
            array('0,1,2,4', '7'),
            array('0,2,0,1,0', '3'),
        );
    }
    
    /**
     * @test
     * @dataProvider multipleValuesWithNewLineProvider
     * @param string $values
     * @param string $expected
     */
    public function addingMultipleValuesWithNewLineDelimiter($values, $expected)
    {
        $this->assertSame($expected, $this->stringCalculator->add($values));
    }
    
    /**
     * @return array
     */
    public function multipleValuesWithNewLineProvider()
    {
        return array(
            array("1\n2,3", '6'),
            array("1,2\n3", '6'),
            array("0\n1\n1", '2')
        );
    }
    
    /**
     * @test
     * @dataProvider multipleValuesWithDifferentDelimetersProvider
     * @param string $values
     * @param string $expected
     */
    public function addingMultipleValuesWithDifferentDelimetersDelimiter($values, $expected)
    {
        $this->assertSame($expected, $this->stringCalculator->add($values));
    }
    
    /**
     * @return array
     */
    public function multipleValuesWithDifferentDelimetersProvider()
    {
        return array(
            array("//;\n1;2;3", '6'),
            array("//dupa\n1dupa2dupa3", '6'),
        );
    }
}