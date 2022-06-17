<?php
class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s) {
        $regularExpression = '/\(\)|\[\]|\{\}/';
        while (preg_match($regularExpression, $s)){
            $s = preg_replace($regularExpression, "", $s);
        }
        if ($s === "") {
            return true;
        } else {
            return false;
        }
    }
}

$test = new Solution();

$s = "()[]{}";
$result = $test->isValid($s);
if ($result === true) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$s = "([]{}";
$result = $test->isValid($s);
if ($result === false) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$s = "(]";
$result = $test->isValid($s);
if ($result === false) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}