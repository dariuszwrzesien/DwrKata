<?php
namespace Kata;

class StringCalculator
{
    public function add($a = null, $b = null)
    {
        
        if ($a === null && $b === null) {
            return 0;
        }
        if ($a !== null && $b !== null) {
            return $a + $b;
        }
        if ($a !== null && $b === null) {
            return $a;
        }
        if ($a === null && $b !== null) {
            return $b;
        }
        
    }
}