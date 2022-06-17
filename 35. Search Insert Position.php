<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function searchInsert($nums, $target) {
        $start = 0;
        $end = count($nums) - 1;
        $mid = (int)ceil(count($nums) / 2);
        if ($target <= $nums[0]) return 0;
        if ($target === $nums[$end]) return count($nums) - 1;
        if ($target > $nums[$end]) return count($nums);
        while ($start < $end) {
            if ($nums[$mid] > $target) {
                if ($nums[$mid] === $target) return $mid;
                if ($nums[$end] === $target) return $end;
                $end = $mid;
                $mid = (int)ceil(($end - $start) / 2);
                if ($end === $mid) return $mid;
            } else {
                if ($nums[$mid] === $target) return $mid;
                if ($nums[$start] === $target) return $start;
                if ($nums[$end] < $target) return $end + 1;
                $start = $mid;
                $mid = (int)ceil(($end + $start) / 2);
                if ($end === $mid) return $mid;
            }
        }
    }
}

$test = new Solution();

$nums = [1, 3, 5, 6];
$target = 5;
$result = $test->searchInsert($nums, $target);
if ($result === 2) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$nums = [1, 3, 5, 6];
$target = 2;
$result = $test->searchInsert($nums, $target);
if ($result === 1) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$nums = [1, 3, 5, 6];
$target = 7;
$result = $test->searchInsert($nums, $target);
if ($result === 4) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$nums = [3];
$target = 3;
$result = $test->searchInsert($nums, $target);
if ($result === 0) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}