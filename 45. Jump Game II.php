<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     * @link https://leetcode.com/problems/jump-game-ii/discuss/18014/Concise-O(n)-one-loop-JAVA-solution-based-on-Greedy/
     */
    function jump($nums) {
        $jumps = 0;
        $farest = 0;
        $curEnd = 0;
        for ($i=0; $i < count($nums)-1; $i++) { 
            $farest = max($farest, $i + $nums[$i]);            
            if ($i == $curEnd) {
                $jumps++;
                $curEnd = $farest;
            }
        }

        return $jumps;
    }
}

$test = new Solution();

$nums = [2,3,1,1,4];
$result = $test->jump($nums);
if ($result === 2) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$nums = [2,3,0,1,4];
$result = $test->jump($nums);
if ($result === 2) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}