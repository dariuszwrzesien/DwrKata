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
     * 
     * @param string $values
     * @param array $expected
     */
    public function addValues($values, $expected)
    {
        $this->assertSame($expected, $this->stringCalculator->add($values));
    }
    
    /**
     * @test
     * @expectedException Exception
     * @expectedExceptionMessage negatives not allowed: -1,-2
     */
    public function addNegatives()
    {
        $this->stringCalculator->add('1,2,3,-1,4,-2');
    }
    
    /**
     * @return array
     */
    public function valuesProvider()
    {
        return array(
            array('',0),
            array('0',0),
            array('1',1),
            array('0,0',0),
            array('1,1',2),
            array('0,1,2,3',6),
            array('1,1,0,1,0',3),
            array("1\n2,3",6),
            array("//;\n1;2",3),
            array("1001, 2",2),
            array("//[*][%]\n1*2%3", 6),
        );
    }
    
}
