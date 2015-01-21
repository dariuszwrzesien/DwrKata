<?php

namespace Kata;

class StringCalculator
{
    /**
     * @param string $string
     * @return string
     */
    public function add($string)
    {
        if('' === $string){
            return '0';
        }
        
        $result = 0;
        $values = $this->extract($string);
        foreach($values as $val) {
            $result += $val;
        }
        
        return (string)$result;
    }
    
    /**
     * @param string $string
     * @return array
     */
    private function extract($string)
    {
        if($this->isDelimiter($string)){
            $delimiter = $this->getDelimiter($string);
            $pattern = sprintf('/(\\n|,|%s)/', $delimiter);
        } else {
            $pattern = sprintf('/(\\n|,)/');
        }
        
        return preg_split($pattern, $string);
    }
    
    /**
     * @param string $string
     * @return boolean
     */
    private function isDelimiter($string)
    {
        if(mb_substr($string, 0, 2) === '//'){
            return true;
        }
        
        return false;
    }
    
    private function getDelimiter($string)
    {
        return substr(substr($string, 2), 0, strpos(substr($string, 2), "\n"));
    }
}