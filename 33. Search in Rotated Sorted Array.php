<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     * @link https://leetcode.com/problems/search-in-rotated-sorted-array/discuss/14436/Revised-Binary-Search/
     */
    function search($nums, $target) {
        $lo = 0;
        $leng = count($nums);
        $hi = $leng - 1;
        while ($lo < $hi) {
            $mid = (int)(($lo + $hi) / 2);
            if ($nums[$mid] === $target) return $mid;
            if ($nums[$lo] <= $nums[$mid]) {
                if ($nums[$lo] <= $target && $target < $nums[$mid]) {
                    $hi = $mid - 1;
                } else {
                    $lo = $mid + 1;
                }
            } else {
                if ($nums[$mid] < $target && $target <= $nums[$hi]) {
                    $lo = $mid + 1;
                } else {
                    $hi = $mid - 1;
                }
            }
        }

        return $nums[$lo] === $target ? $lo : -1;
    }
}

$test = new Solution();
$nums = [4,5,6,7,0,1,2];
$target = 0;
$result = $test->search($nums, $target);
if ($result === 4) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$test = new Solution();
$nums = [4,5,6,7,0,1,2];
$target = 3;
$result = $test->search($nums, $target);
if ($result === -1) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$test = new Solution();
$nums = [1];
$target = 0;
$result = $test->search($nums, $target);
if ($result === -1) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}