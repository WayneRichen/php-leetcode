<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function strStr($haystack, $needle) {
        $haystackLength = strlen($haystack);
        $needleLength = strlen($needle);
        for ($i=0; $i < $haystackLength; $i++) {
            if ($haystack[$i] === $needle[0]) {
                $find = "";
                for ($j=0; $j < $needleLength; $j++) { 
                   $find .= $haystack[$i + $j];
                }
                if ($find === $needle) {
                    return $i;
                }
            }
        }
        return -1;
    }
}

$test = new Solution();

$haystack = "hello";
$needle = "ll";
$result = $test->strStr($haystack, $needle);
if ($result === 2) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$haystack = "aaaaa";
$needle = "bba";
$result = $test->strStr($haystack, $needle);
if ($result === -1) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$haystack = "a";
$needle = "a";
$result = $test->strStr($haystack, $needle);
if ($result === 0) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}