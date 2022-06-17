<?php
class Solution {

    /**
     * @param String[] $strs
     * @return String[][]
     * @link https://youtu.be/BHC0vgpsl5k/
     */
    function groupAnagrams($strs) {                
        $dic = [];
        foreach ($strs as $str) {
            $strsor = $this->strsort($str);
            $dic[$strsor][] = $str;
        }
        
        return array_values($dic);
    }

    function strsort($str) {
        $strArr = str_split($str);
        sort($strArr);
        
        return implode($strArr);
    }
}

$test = new Solution();

$strs = ["eat","tea","tan","ate","nat","bat"];
$result = $test->groupAnagrams($strs);
foreach ($result as &$subArr) {
    sort($subArr);
}
sort($result);
if ($result === [["bat"],["nat","tan"],["ate","eat","tea"]]) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$strs = [""];
$result = $test->groupAnagrams($strs);
foreach ($result as &$subArr) {
    sort($subArr);
}
sort($result);
if ($result === [[""]]) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$strs = ["a"];
$result = $test->groupAnagrams($strs);
foreach ($result as &$subArr) {
    sort($subArr);
}
sort($result);
if ($result === [["a"]]) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}
