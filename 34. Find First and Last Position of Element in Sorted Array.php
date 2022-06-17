<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     * @link https://leetcode.com/problems/find-first-and-last-position-of-element-in-sorted-array/discuss/14734/Easy-java-O(logn)-solution/
     */
    function searchRange($nums, $target) {
        $result = array(2);
        $result[0] = $this->findFirst($nums, $target);
        $result[1] = $this->findLast($nums, $target);

        return $result;
    }

    private function findFirst($nums, $target) {
        $idx = -1;
        $start = 0;
        $end = count($nums) - 1;
        while ($start <= $end) {
            $mid = (int)(($start + $end) / 2);
            if ($nums[$mid] >= $target) {
                $end = $mid - 1;
            } else {
                $start++;
            }
            if ($nums[$mid] == $target) $idx = $mid;
        }

        return $idx;
    }

    private function findLast($nums, $target) {
        $idx = -1;
        $start = 0;
        $end = count($nums) - 1;
        while ($start <= $end) {
            $mid = (int)(($start + $end) / 2);
            if ($nums[$mid] <= $target) {
                $start = $mid + 1;
            } else {
                $end--;
            }
            if ($nums[$mid] == $target) $idx = $mid;
        }

        return $idx;
    }
}

$test = new Solution();

$nums = [5,7,7,8,8,10];
$target = 8;
$result = $test->searchRange($nums, $target);
if ($result === [3, 4]) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$nums = [5,7,7,8,8,10];
$target = 6;
$result = $test->searchRange($nums, $target);
if ($result === [-1,-1]) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$nums = [];
$target = 0;
$result = $test->searchRange($nums, $target);
if ($result === [-1,-1]) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}
