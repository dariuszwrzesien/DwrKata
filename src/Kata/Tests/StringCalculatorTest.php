<?php

namespace Kata;

class StringCalculatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @dataProvider valuesProvider
     * @param string $values
     * @param int $expected
     */
    public function addEmptyStringValue($values, $expected)
    {
        $stringCalculator = new StringCalculator();
        $this->assertSame($expected, $stringCalculator->add($values));
    }
    
    /**
     * @return array
     */
    public function valuesProvider(){
        return array(
            array('', 0),
            array('0', 0),
            array('1', 1),
            array('1,1', 2),
            array('1,2,3', 6),
            array('1,0,0,1', 2),
            array("1\n2,3", 6),
            array("1\n2\n3,0,1\n0,1", 8),
            array("1,\n", 1),
            array("//;\n1;2;1", 4),
        );
    }
    
    /**
     * @test
     * @expectedException Exception
     * @expectedExceptionMessage negatives not allowed -1,-2,-1
     */
    public function negativesThrowException()
    {
        $stringCalculator = new StringCalculator();
        $stringCalculator->add("-1,0\n-2,1,-1");
    }
}