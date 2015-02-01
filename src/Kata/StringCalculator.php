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
        $filteredValues = array_filter($values, array($this, 'filter'));
        $this->validate($filteredValues);
        
        return array_sum($filteredValues);
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
            $delimiters = $this->getDifferentDelimiter($string, $delimiters);
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
    private function getDifferentDelimiter($string, $delimiters)
    {
        $differentDelimitersString = mb_substr(
            $string, 2, mb_strpos(mb_substr($string, 2), "\n")
        );
        
        if ("[" === mb_substr($differentDelimitersString, 0 , 1)) {
            preg_match_all('/\[[^\]]*\]/', $differentDelimitersString, $listOfDelimeters);
            return array_merge($delimiters, $listOfDelimeters[0]);
        }
        
        $differentDelimiters = array($differentDelimitersString);
        
        return array_merge($delimiters, $differentDelimiters);
    }
    
    /**
     * @param array $values
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
    }
    
    /**
     * @param int $value
     * @return boolean
     */
    private function filter($value)
    {
        return ($value < 1000);
    }
}
