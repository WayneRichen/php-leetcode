<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     * @link https://youtu.be/CW6G30xQCbw/
     */
    function threeSum($nums) {
        $len = count($nums);
        $result = [];
        if ($len < 3) return $result;
        sort($nums);
        for ($i=0; $i < $len; $i++) { 
            if ($i > 0 && $nums[$i] === $nums[$i-1]) continue;
            if ($nums[$i] + $nums[$i+1] + $nums[$i+2] > 0) break;
            if ($nums[$i] + $nums[$len-1] + $nums[$len-2] < 0) continue;
            $l = $i + 1;
            $r = $len - 1;
            while ($l < $r) {
                $tmp = $nums[$i] + $nums[$l] + $nums[$r];
                if ($tmp === 0) {
                    $result[] = [$nums[$i], $nums[$l], $nums[$r]];
                    while ($l < $r && $nums[$l] === $nums[$r]) $l++;
                    while ($l < $r && $nums[$r] === $nums[$r-1]) $r--;
                    $l++;
                    $r--;
                } elseif ($tmp > 0) {
                    $r--;
                } else {
                    $l++;
                }
            }
        }
        
        return $result;
    }
}

$test = new Solution();

$nums = [-1,0,1,2,-1,-4];
$result = $test->threeSum($nums);
if ($result === [[-1,-1,2],[-1,0,1]])  {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$nums = [];
$result = $test->threeSum($nums);
if ($result === [])  {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$nums = [0];
$result = $test->threeSum($nums);
if ($result === [])  {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$nums = [0, 0];
$result = $test->threeSum($nums);
if ($result === [])  {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$nums = [0, 0, 0, 0];
$result = $test->threeSum($nums);
if ($result === [[0, 0, 0]])  {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}