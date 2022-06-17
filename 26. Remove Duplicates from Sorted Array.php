<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums) {
        $nums = array_unique($nums);
        
        return count($nums);
    }
}

$test = new Solution();

$nums = [1, 1, 2];
$result = $test->removeDuplicates($nums);
if (array_slice($nums, 0, $result) === [1, 2]) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$nums = [0, 0, 1, 1, 1, 2, 2, 3, 3, 4];
$result = $test->removeDuplicates($nums);
if (array_slice($nums, 0, $result) === [0, 1, 2, 3, 4]) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}