<?php
class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     * @link https://youtu.be/ZI2z5pq0TqA/
     * Dynamic Programming Method 1
     */
    function trap($height) {
        $res = 0;
        $len = count($height);
        $leftMax[0] = $height[0];
        for ($i=1; $i < $len; $i++) { 
            $leftMax[$i] = max($leftMax[$i-1], $height[$i]);
        }

        $rightMax[$len-1] = $height[$len-1];
        for ($i=$len-2; $i >= 0; $i--) { 
            $rightMax[$i] = max($rightMax[$i+1], $height[$i]);
        }

        for ($i=0; $i < $len-1; $i++) { 
            $res += min($leftMax[$i], $rightMax[$i]) - $height[$i];
        }

        return $res;
    }

    /**
     * Dynamic Programming Method 2
     */
    // function trap($height) {
    //     $res = 0;
    //     $left = 0;
    //     $right = count($height) - 1;
    //     $leftMax = $height[$left];
    //     $rightMax = $height[$right];
    //     while ($left < $right) {
    //         if ($height[$left] < $height[$right]) {
    //             $left++;
    //             $leftMax = max($leftMax, $height[$left]);
    //             $res += $leftMax - $height[$left];
    //         } else {
    //             $right--;
    //             $rightMax = max($rightMax, $height[$right]);
    //             $res += $rightMax - $height[$right];
    //         }
    //     }

    //     return $res;
    // }
}

$test = new Solution();

$height = [0,1,0,2,1,0,1,3,2,1,2,1];
$result = $test->trap($height);
if ($result === 6) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$height = [4,2,0,3,2,5];
$result = $test->trap($height);
if ($result === 9) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}