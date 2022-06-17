<?php
class Solution {

    /**
     * @param String $s
     * @return Integer
     * @link https://youtu.be/39CEPFCl5sE/
     */
    function longestValidParentheses($s) {
        $stack = [-1];
        $length = 0;
        $max_length = 0;
        for ($i=0; $i < strlen($s); $i++) { 
            if ($s[$i] == '(') $stack[] = $i;
            else {
                array_pop($stack);
                if ($stack == []) $stack[] = $i;
                else {
                    $length = $i - $stack[count($stack)-1];
                    $max_length = max($max_length, $length);
                }
            }
        }

        return $max_length;
    }
}

$test = new Solution();

$s = "(()";
$result = $test->longestValidParentheses($s);
if ($result === 2) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$s = ")()())";
$result = $test->longestValidParentheses($s);
if ($result === 4) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$s = "";
$result = $test->longestValidParentheses($s);
if ($result === 0) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}
