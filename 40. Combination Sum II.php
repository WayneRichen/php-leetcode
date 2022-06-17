<?php
class Solution {

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     * @link https://youtu.be/2Olq077uuP8/
     */
    function combinationSum2($candidates, $target) {
        sort($candidates);
        $res = array();
        $this->helper($candidates, $res, $target, [], 0);
        return $res;
    }

    function helper($candidates, &$res, $target, $temp, $start) {
        if ($target < 0) return;
        if ($target == 0) {
            $res[] = $temp;
            return;
        }

        for ($i=$start; $i < count($candidates); $i++) { 
            if ($i != $start && $candidates[$i] == $candidates[$i-1]) continue;
            $temp[] = $candidates[$i];
            $this->helper($candidates, $res, $target - $candidates[$i], $temp, $i+1);
            array_pop($temp);
        }
    }
}

$test = new Solution();

$candidates = [10,1,2,7,6,1,5];
$target = 8;
$result = $test->combinationSum2($candidates, $target);
if ($result === [[1,1,6],[1,2,5],[1,7],[2,6]]) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$candidates = [2,5,2,1,2];
$target = 5;
$result = $test->combinationSum2($candidates, $target);
if ($result === [[1,2,2],[5]]) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}
