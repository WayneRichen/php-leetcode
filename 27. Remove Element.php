<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $val
     * @return Integer
     */
    function removeElement(&$nums, $val) {
        if (($keys = array_keys($nums, $val)) !== false) {
            foreach ($keys as $key) {
                unset($nums[$key]);
            }
        }

        return count($nums);
    }
}

$test = new Solution();

$nums = [3, 2, 2, 3];
$val = 3;
$result = $test->removeElement($nums, $val);
if (array_slice($nums, 0, $result) === [2, 2]) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$nums = [0, 1, 2, 2, 3, 0, 4, 2];
$val = 2;
$result = $test->removeElement($nums, $val);
if (array_slice($nums, 0, $result) === [0, 1, 3, 0, 4]) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}