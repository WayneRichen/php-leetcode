<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     * @link https://leetcode.com/problems/3sum-closest/discuss/7883/C%2B%2B-solution-O(n2)-using-sort/
     */
    function threeSumClosest($nums, $target) {
        if (count($nums) < 3) return 0;
        sort($nums);
        $init = $nums[0] + $nums[1] + $nums[2];
        for ($first=0; $first < count($nums) - 2; $first++) { 
            $second = $first + 1;
            $third = count($nums) - 1;
            while ($second < $third) {
                $sum = $nums[$first] + $nums[$second] + $nums[$third];
                $init = abs($target - $init) > abs($target - $sum) ? $sum : $init;
                if ($sum > $target) $third--;
                else $second++;
            }
        }

        return $init;
    }
}

$test = new Solution();


$nums = [-1,2,1,-4];
$target = 1;
$result = $test->threeSumClosest($nums, $target);
if ($result === 2) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$nums = [0,0,0];
$target = 1;
$result = $test->threeSumClosest($nums, $target);
if ($result === 0) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}