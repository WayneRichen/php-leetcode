<?php
class Solution {

    /**
     * @param Float $x
     * @param Integer $n
     * @return Float
     * @link https://leetcode.com/problems/powx-n/discuss/19546/Short-and-easy-to-understand-solution/
     */
    function myPow($x, $n) {
        if ($n == 0) return 1;
        if ($n < 0) {
            $n = abs($n);
            $x = 1 / $x;
        }

        return ($n % 2 == 0) ? $this->myPow($x * $x, $n / 2) : $x * $this->myPow($x * $x, $n / 2);
        // 2^5 = 2 * 2^2 * 2^2
    }
}

$test = new Solution();

$x = 2.00000;
$n = 10;
$result = $test->myPow($x, $n);
if ($result === 1024.00000) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$x = 2.10000;
$n = 3;
$result = $test->myPow($x, $n);
if ($result === 9.261) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$x = 2.00000;
$n = -2;
$result = $test->myPow($x, $n);
if ($result === 0.25000) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}
