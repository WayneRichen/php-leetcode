<?php
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {
        $max = 0;
        $tmp = [];
        for ($i = 0; $i < strlen($s); $i++) {
            if (in_array($s[$i], $tmp)) {
                $tmp = array_slice($tmp, array_search($s[$i], $tmp) + 1);
            }
            $tmp[] = $s[$i];
            $max = max($max, count($tmp));
        }

        return $max;
    }
}

$test = new Solution();

$s = "abcabcdabcdef";
$result = $test->lengthOfLongestSubstring($s);
if ($result === 6) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$s = "bbbbb";
$result = $test->lengthOfLongestSubstring($s);
if ($result === 1) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$s = "dvdf";
$result = $test->lengthOfLongestSubstring($s);
if ($result === 3) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}