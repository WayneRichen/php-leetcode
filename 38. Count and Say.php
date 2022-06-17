<?php
class Solution {

    /**
     * @param Integer $n
     * @return String
     * @link https://youtu.be/zOOKD2OBIUY/
     */
    function countAndSay($n) {
        $result = "1";
        for ($i=1; $i < $n; $i++) { 
            $result = $this->getNext($result);
        }

        return $result;
    }

    function getNext($seq) {
        $next = "";
        for ($i=0; $i < strlen($seq); $i++) { 
            $count = 1;
            while ($i < strlen($seq)-1 && $seq[$i] == $seq[$i+1]) {
                $count++;
                $i++;
            }
            $next .= $count.$seq[$i];
        }

        return $next;
    }
}

$test = new Solution();

$n = 1;
$result = $test->countAndSay($n);
if ($result === "1"){
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$n = 4;
$result = $test->countAndSay($n);
if ($result === "1211"){
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}