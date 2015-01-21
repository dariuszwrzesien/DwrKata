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
        if ('' === $string) {
           return 0; 
        }
        
        $result = 0;
        $values = $this->getValues($string);
        
        foreach ($values as $val) {          
            $result += $val;
        }
        
        return (int)$result;
        
    }
    
    /**
     * @param string $string
     * @return array
     */
    private function getValues($string)
    {
        $delimiters = array(',', '\n');
        
        if ($this->isDifferentDelimiter($string)) {
            $delimiters[] = $this->getDelimiter($string);
        }
        
        $values = preg_split(sprintf("/(%s)/", $delimiters), $string);
        
        return $this->validate($values);
    }
    
    /**
     * @param string $string
     * @return boolean
     */
    private function isDifferentDelimiter($string)
    {
        return ('//' === mb_substr($string, 0, 2));
    }
    
    /**
     * @param string $string
     * @return string
     */
    private function getDelimiter($string)
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
            if($val < 0){
                $errValues[] = $val;
            }
        }
        
        if ( ! empty($errValues)) {
            throw new Exception(sprintf("negatives not allowed %s", implode(',', $errValues)));
        }
        
        return $values;
    }
}