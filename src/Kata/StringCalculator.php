<?php

namespace Kata;

use Exception;

class StringCalculator
{
    /**
     * @param string $string
     * @return int
     */
    public function add($string)
    {   
        $values = $this->getValues($string);
        $this->validate($values);
        
        return array_sum($values);
    }
    
    /**
     * @param string $string
     * @return array
     */
    private function getValues($string)
    {
        $delimiters = $this->getDelimiter($string);
        
        return preg_split(sprintf('/(%s)/', implode('|', $delimiters)), $string);
    }
    
    /**
     * @param string $string
     * @return array
     */
    private function getDelimiter($string)
    {
        $delimiters = array(',','\n');
        if ($this->isDifferentDelimiters($string)) {
            $delimiters[] = $this->getDifferentDelimiter($string);
        }
        
        return $delimiters;
    }
    
    /**
     * @param string $string
     * @return boolean
     */
    private function isDifferentDelimiters($string)
    {
        return ('//' === mb_substr($string, 0, 2));
    }
    
    /**
     * @param string $string
     * @return string
     */
    private function getDifferentDelimiter($string)
    {
        return mb_substr($string, 2, mb_strpos(mb_substr($string, 2), "\n"));
    }
    
    /**
     * @param array $values
     * @return array
     * @throws Exception
     */
    private function validate($values)
    {
        $errValues = array();
        foreach ($values as $val) {
            if ($val < 0) {
                $errValues[] = $val;
            }
        }
        
        if ( ! empty($errValues)) {
            throw new Exception(sprintf('negatives not allowed: %s', implode(',', $errValues)));
        }
                
        return $values;
    }
    
    
}
