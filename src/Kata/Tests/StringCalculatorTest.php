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
    
    public function testAdderWithoutValue()
    {
        $this->assertSame(0, $this->stringCalculator->add());
    }
    
    /**
     * @dataProvider oneValueProvider
     * @param int $a
     * @param int $expected
     */
    public function testAdderWithObeValue($a, $expected)
    {
        $this->assertSame($expected, $this->stringCalculator->add($a));
    }
    
    /**
     * @dataProvider twoValueProvider
     * @param type $a
     * @param type $b
     * @param type $expected
     */
    public function testAdderWithTwoValues($a, $b, $expected)
    {
        $this->assertSame($expected, $this->stringCalculator->add($a, $b));
    }
    
    /**
     * @return array
     */
    public function oneValueProvider()
    {
        return array(
          array(0,0),  
          array(1,1),  
          array(9,9)
        );
    }
    
    /**
     * @return array
     */
    public function twoValueProvider()
    {
        return array(
          array(0,0,0),  
          array(1,1,2),  
          array(0,1,1),
          array(1,2,3),
          array(1,0,1),
          array(2,1,3)
        );
    }
}