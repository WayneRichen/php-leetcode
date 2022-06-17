<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function firstMissingPositive($nums) {
        for ($i=0; $i < count($nums); $i++) { 
            while ($nums[$i] > 0 && $nums[$i] <= count($nums) && $nums[$nums[$i]-1] != $nums[$i]) {
                $tmp = $nums[$nums[$i]-1];
                $nums[$nums[$i]-1] = $nums[$i];
                $nums[$i] = $tmp;
            }
        }
        for ($i=0; $i < count($nums); $i++) { 
            if ($nums[$i] != $i+1) {
                break;
            }
        }
        
        return $i + 1;
    }
}

$test = new Solution();

$nums = [1,2,0];
$result = $test->firstMissingPositive($nums);
if ($result === 3) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$nums = [3,4,-1,1];
$result = $test->firstMissingPositive($nums);
if ($result === 2) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$nums = [7,8,9,11,12];
$result = $test->firstMissingPositive($nums);
if ($result === 1) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}