kata/php
========

PHP skeleton for doing coding katas
-----------------------------------

*Code Kata* is a term coined by Dave Thomas, co-author of the book
The Pragmatic Programmer, in a bow to the Japanese concept of kata
in the martial arts. A code kata is an exercise in programming which
helps a programmer hone their skills through practice and repetition.
As of October 2011, Dave Thomas has published 21 different katas.

You can find some to start practicing [here](http://codingdojo.org/cgi-bin/index.pl?KataCatalogue).

When you do programming katas, you use TDD. That's why I have included
PHPUnit, Mockery, PHPSpec and Prophecy as composer dependencies. Choose
the testing framework you feel more comfortable (or play with both).

Practicing a kata
=================

Let's imagine you want to practice "Bowling game kata". Details about
this kata can be found [here](http://codingdojo.org/cgi-bin/wiki.pl?KataBowling).

You will need composer.

    curl -sS https://getcomposer.org/installer | php

Then, use "create-project" command to clone this project as a template
and create a new one in your computer.

    php composer.phar create-project kata/php bowling-kata dev-master

Then add your classes to 'src/Kata' and your test cases to
'src/Kata/Tests' and run 'php bin/phpunit' to run your tests.

    php bin/phpunit

TestCase examples
=================

If you run 'php bin/phpunit' you will see the following output.

    PHPUnit 3.8-gc4f2bcd by Sebastian Bergmann.
    
    Configuration read from /Users/carlosbuenosvinos/Documents/Web/bowling/phpunit.xml
    
    ...
    
    Time: 91 ms, Memory: 1.75Mb
    OK (3 tests, 3 assertions)

That's because you will find one class and its TestCase in the project
in order to help you. You can delete them.

Adder is a class that adds two numbers and AdderTest tests that.

String Calculator
=================

String Calculator
The following is a TDD Kata- an exercise in coding, refactoring and test-first, that you should apply daily for at least 15 minutes (I do 30).
Before you start: 
Try not to read ahead. 
Do one task at a time. The trick is to learn to work incrementally. 
Make sure you only test for correct inputs. there is no need to test for invalid inputs for this kata 
String Calculator
1. Create a simple String calculator with a method int Add(string numbers) 
A. The method can take 0, 1 or 2 numbers, and will return their sum (for an empty string it will return 0) for example “” or “1” or “1,2” 
B. Start with the simplest test case of an empty string and move to 1 and two numbers 
C. Remember to solve things as simply as possible so that you force yourself to write tests you did not think about 
D. Remember to refactor after each passing test 
2. Allow the Add method to handle an unknown amount of numbers 
3. Allow the Add method to handle new lines between numbers (instead of commas). 
A. the following input is ok:  “1\n2,3”  (will equal 6) 
B. the following input is NOT ok:  “1,\n” (not need to prove it - just clarifying) 
Support different delimiters 
C. to change a delimiter, the beginning of the string will contain a separate line that looks like this:   “//[delimiter]\n[numbers…]” for example “//;\n1;2” should return three where the default delimiter is ‘;’ . 
D. the first line is optional. all existing scenarios should still be supported 
4. Calling Add with a negative number will throw an exception “negatives not allowed” - and the negative that was passed.if there are multiple negatives, show all of them in the exception message 

stop here if you are a beginner. Continue if you can finish the steps so far in less than 30 minutes. 

5. Numbers bigger than 1000 should be ignored, so adding 2 + 1001  = 2 
6. Delimiters can be of any length with the following format:  “//[delimiter]\n” for example: “//[***]\n1***2***3” should return 6 
7. Allow multiple delimiters like this:  “//[delim1][delim2]\n” for example “//[*][%]\n1*2%3” should return 6. 
8. make sure you can also handle multiple delimiters with length longer than one char 
