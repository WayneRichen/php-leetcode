<?php
class Solution {

    /**
     * @param String $s
     * @param Integer $numRows
     * @return String
     * @link https://youtu.be/re-WQ14s-Kg/
     */
    function convert($s, $numRows) {
        if ($numRows === 1 || $numRows >= strlen($s)) return $s;
        $arr = [];
        $row = 0;
        $step = 1;
        for ($i=0; $i < strlen($s); $i++) { 
            $arr[$row] = isset($arr[$row]) ? $arr[$row].$s[$i] : $s[$i];
            if ($row == 0) $step = 1;
            elseif ($row === $numRows - 1) $step = -1;
            $row += $step;
        }

        return implode('', $arr);
    }
}

$test = new Solution();

$s = "PAYPALISHIRING";
$numRows = 3;
$result = $test->convert($s, $numRows);
if ($result === "PAHNAPLSIIGYIR")  {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$s = "PAYPALISHIRING";
$numRows = 4;
$result = $test->convert($s, $numRows);
if ($result === "PINALSIGYAHRPI")  {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$s = "A";
$numRows = 1;
$result = $test->convert($s, $numRows);
if ($result === "A")  {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}