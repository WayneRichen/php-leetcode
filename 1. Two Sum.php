<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $result = [];
        foreach ($nums as $numKey => $numValue) {
            if (in_array($target - $numValue, $nums)) {
                foreach (array_keys($nums, $target - $numValue) as $value){
                    if ($value != $numKey) {
                        $result[] = $value;
                    }
                }
            }
        }
        
        return $result;
    }
}

$test = new Solution();

$nums = [2,7,11,15];
$target = 9;
$result = $test->twoSum($nums, $target);
if ($nums[$result[0]] + $nums[$result[1]] === $target){
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$nums = [3,2,4];
$target = 6;
$result = $test->twoSum($nums, $target);
if ($nums[$result[0]] + $nums[$result[1]] === $target){
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$nums = [3,3];
$target = 6;
$result = $test->twoSum($nums, $target);
if ($nums[$result[0]] + $nums[$result[1]] === $target){
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}