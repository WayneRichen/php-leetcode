<?php
class Solution {

    /**
     * @param String $s
     * @param String[] $words
     * @return Integer[]
     * @link https://youtu.be/L6NLra-rZoU/
     */
    function findSubstring($s, $words) {
        $res = array();
        $n = count($words);
        $m = strlen($words[0]);
        $map = array();
        foreach ($words as $word) {
            if (isset($map[$word])) $map[$word] = $map[$word] + 1;
            else $map[$word] = 1;
        }
        
        for ($i=0; $i <= strlen($s) - $n * $m; $i++) { 
            $copy = $map;
            $k = $n;
            $j = $i;
            while ($k > 0) {
                $str = substr($s, $j, $m);
                if (!isset($copy[$str]) || $copy[$str] < 1) {
                    break;
                }
                $copy[$str] = $copy[$str] - 1;
                $k--;
                $j += $m;
            }
            if ($k == 0) $res[] = $i;
        }

        return $res;
    }
}

$test = new Solution();

$s = "barfoothefoobarman";
$words = ["foo","bar"];
$result = $test->findSubstring($s, $words);
if ($result === [0,9]) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$s = "wordgoodgoodgoodbestword";
$words = ["word","good","best","word"];
$result = $test->findSubstring($s, $words);
if ($result === []) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$s = "barfoofoobarthefoobarman";
$words = ["bar","foo","the"];
$result = $test->findSubstring($s, $words);
if ($result === [6,9,12]) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}
