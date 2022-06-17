<?php
class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     * @link https://leetcode.com/problems/container-with-most-water/discuss/1915172/JavaC++-Easiest-Explanations/
     */
    function maxArea($height) {
        $left = 0;
        $right = count($height) - 1;
        $max = 0;
        while ($left < $right) {
            $w = $right - $left;
            $h = min($height[$left], $height[$right]);
            $max = max($w * $h, $max);
            if ($height[$left] < $height[$right]) $left++;
            elseif ($height[$left] > $height[$right]) $right--;
            else {
                $left++;
                $right--;
            }
        }

        return $max;
    }
}

$test = new Solution();

$height = [1,8,6,2,5,4,8,3,7];
$result = $test->maxArea($height);
if ($result === 49)  {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$height = [1,1];
$result = $test->maxArea($height);
if ($result === 1)  {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}