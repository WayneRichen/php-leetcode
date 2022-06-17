<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[][]
     * @link https://github.com/wuqinqiang/leetcode-php/blob/master/0-50/18.md/
     */
    function fourSum($nums, $target) {
        $result = [];
        if (count($nums) < 4) return $result;
        sort($nums);
        $len = count($nums);
        for ($i=0; $i < $len-3; $i++) {
            if ($i > 0 && $nums[$i] === $nums[$i-1]) continue;
            for ($j=$i+1; $j < $len-2; $j++) { 
                if ($j > $i + 1 && $nums[$j] === $nums[$j-1]) continue;
                $new_target = $target - $nums[$i] - $nums[$j];
                $start = $j+1;
                $end = $len-1;
                while ($start < $end) {
                    if ($nums[$start] + $nums[$end] === $new_target) {
                        $result[] = [$nums[$i], $nums[$j], $nums[$start], $nums[$end]];
                        while ($start+1 < $len && $nums[$start+1] === $nums[$start] && $start < $end) $start++;
                        $start++;
                        while ($nums[$end-1] === $nums[$end] && $start < $end) $end--;
                        $end--;
                    }
                    elseif ($nums[$start] + $nums[$end] < $new_target) $start++;
                    else $end--;
                }
            }
        }
        
        return $result;
    }
}

$test = new Solution();

$nums = [1,0,-1,0,-2,2];
$target = 0;
$result = $test->fourSum($nums, $target);
if ($result === [[-2,-1,1,2],[-2,0,0,2],[-1,0,0,1]]) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$nums = [2,2,2,2,2];
$target = 8;
$result = $test->fourSum($nums, $target);
if ($result === [[2,2,2,2]]) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$nums = [-2,-1,-1,1,1,2,2];
$target = 0;
$result = $test->fourSum($nums, $target);
if ($result === [[-2,-1,1,2],[-1,-1,1,1]]) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}