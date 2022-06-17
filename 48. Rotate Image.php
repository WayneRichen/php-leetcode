<?php
class Solution {

    /**
     * @param Integer[][] $matrix
     * @return NULL
     * @link https://leetcode.com/problems/rotate-image/solution/
     */
    function rotate(&$matrix) {
        $n = count($matrix);
        for ($i=0; $i < (floor($n / 2) + $n % 2); $i++) { 
            for ($j=0; $j < floor($n / 2); $j++) { 
                $tmp = $matrix[$n-1-$j][$i];
                $matrix[$n-1-$j][$i] = $matrix[$n-1-$i][$n-$j-1];
                $matrix[$n-1-$i][$n-$j-1] = $matrix[$j][$n-1-$i];
                $matrix[$j][$n-1-$i] = $matrix[$i][$j];
                $matrix[$i][$j] = $tmp;
            }
        }
    }
}

$test = new Solution();

$matrix = [[1,2,3],[4,5,6],[7,8,9]];
$test->rotate($matrix);
if ($matrix === [[7,4,1],[8,5,2],[9,6,3]]) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$matrix = [[5,1,9,11],[2,4,8,10],[13,3,6,7],[15,14,12,16]];
$test->rotate($matrix);
if ($matrix === [[15,13,2,5],[14,3,4,1],[12,6,8,9],[16,7,10,11]]) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}