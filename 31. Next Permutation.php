<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function nextPermutation(&$nums) {
        $length = count($nums);
        for ($i=$length-1; $i > 0; $i--) { 
            if ($nums[$i-1] < $nums[$i]) {
                break;
            }
        }
        if ($i == 0) {
            $this->reverse($nums, 0, $length-1);
        } else {
            for ($j=$length-1; $j > $i-1; $j--) { 
                if ($nums[$j] > $nums[$i-1]) {
                    break;
                }
            }
            $this->swap($nums, $j, $i-1);
            $this->reverse($nums, $i, $length-1);
        }
    }

    function swap(&$nums, $i, $j) {
        $tmp = $nums[$i];
        $nums[$i] = $nums[$j];
        $nums[$j] = $tmp;
    }

    function reverse(&$nums, $start, $end) {
        while ($end > $start) {
            $this->swap($nums, $start, $end);
            $start++;
            $end--;
        }
    }
}

$test = new Solution();
$nums = [1,2,3];
$test->nextPermutation($nums);
if ($nums === [1, 3, 2]) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$nums = [1,3,2];
$test->nextPermutation($nums);
if ($nums === [2,1,3]) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$nums = [5,4,7,5,3,2];
$test->nextPermutation($nums);
if ($nums === [5,5,2,3,4,7]) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}