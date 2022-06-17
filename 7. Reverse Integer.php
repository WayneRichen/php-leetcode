<?php
class Solution {

    /**
     * @param Integer $x
     * @return Integer
     */
    function reverse($x) {
        if ($x <= pow(-2, 31) || $x > pow(2, 31) || $x == 0) return 0;
        $num = 0;
        $positive = abs($x);
        while ($positive != 0) {
            $num = $num * 10 + $positive % 10;
            $positive = (int)($positive / 10);
        }
        if ($x > 0 && $num < pow(2, 31) ) return $num;
        elseif ($x < 0 && -$num > pow(-2, 31)) return -$num;
        else return 0;
    }
}

$test = new Solution();

$x = -1563847412;
$result = $test->reverse($x);
if ($result === 0)  {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$x = -123;
$result = $test->reverse($x);
if ($result === -321)  {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$x = 120;
$result = $test->reverse($x);
if ($result === 21)  {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$x = -1563847412;
$result = $test->reverse($x);
if ($result === 0)  {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}