<?php
class Solution {

    /**
     * @param String $digits
     * @return String[]
     * @link https://youtu.be/KAJnbsikSC8/
     */
    function letterCombinations($digits) {
        if (strlen($digits) === 0) return [];
        $map = ["", "", "abc", "def", "ghi", "jkl", "mno", "pqrs", "tuv", "wxyz"];
        $result = [""];
        for ($i=0; $i < strlen($digits); $i++) {
            $tmp = [];
            for ($j=0; $j < strlen($map[$digits[$i]]); $j++) {
                foreach ($result as $value) {
                    $tmp[] = $value.$map[$digits[$i]][$j];
                }
            }
            $result = $tmp;
        }
        return $result;
    }
}

$test = new Solution();

$digits = "23";
$result = $test->letterCombinations($digits);
sort($result);
if ($result == ["ad","ae","af","bd","be","bf","cd","ce","cf"]) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$digits = "";
$result = $test->letterCombinations($digits);
sort($result);
if ($result == []) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$digits = "2";
$result = $test->letterCombinations($digits);
sort($result);
if ($result == ["a","b","c"]) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}