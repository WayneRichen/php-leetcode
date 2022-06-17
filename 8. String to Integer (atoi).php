<?php
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function myAtoi($s) {
        $s = trim($s);
        if ($s === "" || ctype_alpha($s[0]) || (isset($s[1]) && ($s[1] === '+' || $s[1] === '-'))) return 0;
        $num = "";
        $max = pow(2, 31) - 1;
        $min = pow(-2, 31);
        $i = 0;
        while ($i < strlen($s)) {
            if (strlen($num) > 0 && (is_numeric($s[$i]) === false)) {
                $num = (int)$num;

                return max($min, min($num, $max));
            }
            $num .= $s[$i];
            $i ++;
        }

        $num = (int)$num;
        
        return max($min, min($num, $max));
    }
}

$test = new Solution();

$s = "  +  413";
$result = $test->myAtoi($s);
if ($result === 0)  {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$s = "   -42";
$result = $test->myAtoi($s);
if ($result === -42)  {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$s = "4193 with words";
$result = $test->myAtoi($s);
if ($result === 4193)  {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$s = "00000-42a1234";
$result = $test->myAtoi($s);
if ($result === 0)  {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$s = "   -115579378e25";
$result = $test->myAtoi($s);
if ($result === -115579378)  {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$s = "words and 987";
$result = $test->myAtoi($s);
if ($result === 0)  {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}