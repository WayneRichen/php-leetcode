<?php
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function romanToInt($s) {
        $rom_arr = array('I'=>1, 'V'=>5, 'X'=>10, 'L'=>50, 'C'=>100, 'D'=>500, 'M'=>1000);
        $result = 0;
        for ($i=0; $i < strlen($s); $i++) {
            if (isset($s[$i+1]) && $rom_arr[$s[$i+1]] > $rom_arr[$s[$i]]) {
                $result += $rom_arr[$s[$i+1]] - $rom_arr[$s[$i]];
                $i++;
            } else {
                $result += $rom_arr[$s[$i]];
            }
        }

        return $result;
    }
}

$test = new Solution();

$s = "III";
$result = $test->romanToInt($s);
if ($result === 3){
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$s = "LVIII";
$result = $test->romanToInt($s);
if ($result === 58){
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$s = "MCMXCIV";
$result = $test->romanToInt($s);
if ($result === 1994){
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}