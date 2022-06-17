<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     * @link https://youtu.be/R-DE9UoYPLc/
     */
    function permute($nums) {
        if (count($nums) <= 1) return [$nums];

        $answer = [];
        foreach ($nums as $index => $num) {
            $newNums = $nums;
            array_splice($newNums, $index, 1);
            $nn = $this->permute($newNums);
            foreach ($nn as $n) {
                $ans = [];
                $ans[] = $num;
                foreach ($n as $nkey => $nvalue) {
                    $ans[] = $nvalue;
                }
                $answer[] = $ans;
            }
        }
        
        return $answer;
    }
}

$test = new Solution();

$nums = [1,2,3];
$result = $test->permute($nums);
if ($result === [[1,2,3],[1,3,2],[2,1,3],[2,3,1],[3,1,2],[3,2,1]]) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$nums = [0,1];
$result = $test->permute($nums);
if ($result === [[0,1],[1,0]]) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$nums = [1];
$result = $test->permute($nums);
if ($result === [[1]]) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}