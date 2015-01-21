<?php

namespace Kata;

/*
The following is a TDD Kata - an exercise in coding, refactoring and test-first, 
that you should apply daily for at least 15 minutes (I do 30).
Before you start: 
    1. Try not to read ahead.
    2. Do one task at a time. The trick is to learn to work incrementally.
    3. Make sure you only test for correct inputs. there is no need to test 
       for invalid inputs for this kata.

String Calculator

    1. Create a simple String calculator with a method int Add(string numbers) (returns INT)
        The method can take 0, 1 or 2 numbers, and will return their sum 
        (for an empty string it will return 0) for example “” or “1” or “1,2”.

        !Start with the simplest test case of an empty string and move to 1 and two numbers.
        !Remember to solve things as simply as possible so that you force yourself 
         to write tests you did not think about
        !Remember to refactor after each passing test


    2. Allow the Add method to handle an unknown amount of numbers.
    3. Allow the Add method to handle new lines between numbers (instead of commas).
        the following input is ok:  “1\n2,3”  (will equal 6)
        the following input is NOT ok:  “1,\n” (not need to prove it - just clarifying)
        
    4. Support different delimiters
        to change a delimiter, the beginning of the string will contain a separate line 
        that looks like this:   “//[delimiter]\n[numbers…]” for example “//;\n1;2” 
        should return three where the default delimiter is ‘;’ .
        !The first line is optional. All existing scenarios should still be supported.

    5. Calling Add with a negative number will throw an exception “negatives not allowed” 
    - and the negative that was passed. If there are multiple negatives, show all of them
    in the exception message.

    [Stop here! if you are a beginner. Continue if you can finish the steps 
    so far in less than 30 minutes.]

    
    6. Numbers bigger than 1000 should be ignored, so adding 2 + 1001  = 2.

    7. Delimiters can be of any length with the following format:  
    "//[delimiter]\n" for example: "//[***]\n1***2***3" should return 6.

    8. Allow multiple delimiters like this:  
    "//[delim1][delim2]\n" for example "//[*][%]\n1*2%3" should return 6.
    
    9. Make sure you can also handle multiple delimiters with length longer than one char
 */
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
        if (mb_substr($string, 0, 2) === '//'){
            return true;
        }
        
        return false;
    }
    
    /**
     * @param string $string
     * @return string
     */
    private function getDelimiter($string)
    {
        return substr(substr($string, 2), 0, strpos(substr($string, 2), "\n"));
    }
}