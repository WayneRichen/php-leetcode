<?php
class Solution {

    /**
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome($x) {
        $arr = str_split((string)$x);
        $rev = array_reverse($arr);
        if ($arr != $rev){
            return false;
        } else {
            return true;
        }
    }
}

$test = new Solution();

$x = 121;
$result = $test->isPalindrome($x);
if ($result === true) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$x = -121;
$result = $test->isPalindrome($x);
if ($result === false) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$x = 10;
$result = $test->isPalindrome($x);
if ($result === false) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}