<?php
class Solution {

    /**
     * @param Integer $num
     * @return String
     */
    // function intToRoman($num) {
    //     $m = ["", "M", "MM", "MMM"];
    //     $c = ["", "C", "CC", "CCC", "CD", "D", "DC", "DCC", "DCCC", "CM"];
    //     $x = ["", "X", "XX", "XXX", "XL", "L", "LX", "LXX", "LXXX", "XC"];
    //     $i = ["", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX"];

    //     return $m[(int)($num/1000)].$c[(int)(($num%1000)/100)].$x[(int)(($num%100)/10)].$i[$num%10];
    // }

    /**
     * @param Integer $num
     * @return String
     * @link https://youtu.be/RzU6tWxpPPg/
     */
    function intToRoman($num) {
        $value = [1000, 900, 500,  400, 100,   90,  50,   40,  10,    9,   5,    4,  1];
        $roman = ['M', 'CM', 'D', 'CD', 'C', 'XC', 'L', 'XL', 'X', 'IX', 'V', 'IV', 'I'];
        $result = '';
        for ($i=0; $i < count($value); $i++) { 
            while ($num >= $value[$i]) {
                $num -= $value[$i];
                $result .= $roman[$i];
            }
        }

        return $result;
    }
}

$test = new Solution();

$num = 1994;
$result = $test->intToRoman($num);
if ($result === "MCMXCIV")  {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$num = 58;
$result = $test->intToRoman($num);
if ($result === "LVIII")  {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}
