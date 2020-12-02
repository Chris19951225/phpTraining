<?php

    class Palindrome
    {
        public static function isPalindrome($word)
        {
            $word = strtolower($word);
            $Array = explode($word,true);
            $reverseArray = array_reverse($Array);
            if($reverseArray === $Array)
            {
                return true;
            }
            return false;
        }
    }

    if (Palindrome::isPalindrome('Never Odd Or Even'))
        echo 'Palindrome';
    else
        echo 'Not palindrome';

