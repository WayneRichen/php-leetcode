<?php
class Solution {

    /**
     * @param String[] $strs
     * @return String
     */
    function longestCommonPrefix($strs) {
        if (count($strs) == 0 || array_keys($strs, "")) return "";
        if (count($strs) == 1) return $strs[0];
        $min = min(array_map('strlen', $strs));
        for ($i=1; $i <= $min; $i++) {
            $compare = substr($strs[0], 0, $i);
            for ($j=1; $j < count($strs); $j++) {
                if ($compare != substr($strs[$j], 0, $i)) {
                    break 2;
                }
            }
        }
        return substr($strs[0], 0, $i-1);
    }
}

$test = new Solution();

$strs = ["flower","flow","flight"];
$result = $test->longestCommonPrefix($strs);
if ($result === "fl") {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$strs = ["dog","racecar","car"];
$result = $test->longestCommonPrefix($strs);
if ($result === "") {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$strs = [""];
$result = $test->longestCommonPrefix($strs);
if ($result === "") {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$strs = ["ab","a"];
$result = $test->longestCommonPrefix($strs);
if ($result === "a") {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}