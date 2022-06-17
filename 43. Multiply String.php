<?php
class Solution {

    /**
     * @param String $num1
     * @param String $num2
     * @return String
     * @link https://leetcode.com/problems/multiply-strings/discuss/17605/Easiest-JAVA-Solution-with-Graph-Explanation/
     */
    function multiply($num1, $num2) {
        $m = strlen($num1);
        $n = strlen($num2);
        $pos = array_fill(0, $m+$n, 0);

        for ($i=$m-1; $i >= 0; $i--) {
            for ($j=$n-1; $j >= 0; $j--) {
                $mul = $num1[$i] * $num2[$j];
                $p1 = $i + $j;
                $p2 = $p1 + 1;
                $sum = $mul + $pos[$p2];

                $pos[$p1] += (int)($sum / 10);
                $pos[$p2] = $sum % 10;
            }
        }

        $result = "";
        foreach ($pos as $value) {
            $result .= strlen($result) === 0 && $value === 0 ? "" : $value ;
        }

        return strlen($result) === 0 ? "0" : $result;
    }
}

$test = new Solution();

$num1 = "2";
$num2 = "3";
$result = $test->multiply($num1, $num2);
if ($result === "6") {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$num1 = "123";
$num2 = "456";
$result = $test->multiply($num1, $num2);
if ($result === "56088") {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}