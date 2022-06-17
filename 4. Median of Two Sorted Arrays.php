<?php
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2) {
        foreach ($nums2 as $value) {
            $nums1[] = $value;
        }
        sort($nums1);
        $length = count($nums1);
        if ($length % 2 === 0) {
            $mid = $length / 2;
            $avg = ($nums1[$mid] + $nums1[$mid - 1]) / 2;
            return $avg;
        } else {
            $mid = floor($length / 2);
            return $nums1[$mid];
        }
    }
}

$test = new Solution();

$nums1 = [1, 3];
$nums2 = [2];
$result = $test->findMedianSortedArrays($nums1, $nums2);
if ($result === 2) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$haystack = [1, 2];
$needle = [3, 4];
$result = $test->findMedianSortedArrays($haystack, $needle);
if ($result === 2.5) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}