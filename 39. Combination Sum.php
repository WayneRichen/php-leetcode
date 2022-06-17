<?php
class Solution {

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     * @link https://youtu.be/6BmmaS3n-Q8/
     */
    function combinationSum($candidates, $target) {
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
            $temp[] = $candidates[$i];
            $this->helper($candidates, $res, $target - $candidates[$i], $temp, $i);
            array_pop($temp);
        }
    }
}

$test = new Solution();

$candidates = [2,3,6,7];
$target = 7;
$result = $test->combinationSum($candidates, $target);
if ($result === [[2,2,3],[7]]) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$candidates = [2,3,5];
$target = 8;
$result = $test->combinationSum($candidates, $target);
if ($result === [[2,2,2,2],[2,3,3],[3,5]]) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$candidates = [2];
$target = 1;
$result = $test->combinationSum($candidates, $target);
if ($result === []) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}
