<?php
class Solution {

    /**
     * @param Integer $dividend
     * @param Integer $divisor
     * @return Integer
     * @link https://youtu.be/XKuFGEGt5zo/
     * @link https://youtu.be/0BdG-hLtDZ4/
     */
    function divide($dividend, $divisor) {
        if ($dividend == pow(-2, 31)) {
            if ($divisor == -1) {
                return pow(2, 31) - 1;
            } 
            if ($divisor > 0) {
                return -1 + $this->divide($dividend + $divisor, $divisor);
            } else {
                return 1 + $this->divide($dividend - $divisor, $divisor);
            }
        }
        if ($divisor == pow(-2, 31)) {
            return $dividend == pow(-2, 31) ? 1 : 0;
        }
        $positive = true;
        if (($dividend > 0 && $divisor < 0) || ($dividend < 0 && $divisor > 0)) {
            $positive = false;
        }
        $dividend = abs($dividend);
        $divisor = abs($divisor);

        $res = 0;
        while ($divisor <= $dividend) {
            $temp = $divisor;
            $mul = 1;
            while ($dividend >= ($temp << 1)) {
                $temp <<= 1;
                $mul <<= 1;
            }
            $res += $mul;
            $dividend -= $temp;
        }

        return $positive ? $res : -$res;
    }
}

$test = new Solution();
$dividend = 10;
$divisor = 3;
$result = $test->divide($dividend, $divisor);
if ($result === 3) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$dividend = 7;
$divisor = -3;
$result = $test->divide($dividend, $divisor);
if ($result === -2) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}