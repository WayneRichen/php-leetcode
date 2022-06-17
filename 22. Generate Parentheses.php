<?php
class Solution {

    /**
     * @param Integer $n
     * @return String[]
     * @link https://youtu.be/XF0wh8M2A6E/
     */
    function generateParenthesis($n) {
        if ($n === 0) return [];
        $result = [];
        $this->helper($n, $n, "", $result);

        return $result;
    }

    function helper($l, $r, $item, &$result) {
        if ($r < $l) return;
        if ($l === 0 && $r === 0) $result[] = $item;
        if ($l > 0) $this->helper($l-1, $r, $item."(", $result);
        if ($r > 0) $this->helper($l, $r-1, $item.")", $result);
    }
}

$test = new Solution();

$n = 3;
$result = $test->generateParenthesis($n);
sort($result);
if ($result === ["((()))","(()())","(())()","()(())","()()()"]) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$n = 1;
$result = $test->generateParenthesis($n);
sort($result);
if ($result === ["()"]) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}