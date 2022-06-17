<?php
class Solution {

    /**
     * @param String $s
     * @param String $p
     * @return Boolean
     * @link https://youtu.be/wtQLdKOatrk/
     */
    function isMatch($s, $p) {
        $dp = [];
        $dp[0][0] = true;
        for ($i=1; $i <= strlen($s); $i++) { 
            $dp[$i][0] = false;
        }
        $s = " ".$s;
        $p = " ".$p;
        for ($i=0; $i < strlen($s); $i++) { 
            for ($j=1; $j < strlen($p); $j++) {
                if ($p[$j] === $s[$i] || $p[$j] === ".") {
                    if ($i === 0) {
                        $dp[$i][$j] = false;
                    } else {
                        $dp[$i][$j] = $dp[$i-1][$j-1];
                    }
                } elseif ($p[$j] === '*') {
                    if ($dp[$i][$j-2] === true) {
                        $dp[$i][$j] = true;
                    } elseif ($p[$j-1] === $s[$i] || $p[$j-1] === ".") {
                        $dp[$i][$j] = $dp[$i-1][$j-1];
                    } else {
                        $dp[$i][$j] = false;
                    }
                } else {
                    $dp[$i][$j] = false;
                }
            }
        }
        // $this->debug($dp, $s, $p);
        return $dp[strlen($s)-1][strlen($p)-1];
    }
    
    function debug($dp, $s, $p) {
        echo "  ";
        for ($i=0; $i < strlen($p); $i++) { 
            echo $p[$i]." ";
        }
        echo "\n";
        foreach ($dp as $key => $value) {
            echo $s[$key]." ";
            foreach ($value as $v) {
                echo $v ? "1 " : "0 " ;
            }
            echo "\n";
        }

    }
}

$test = new Solution();

$s = "aa";
$p = "a";
$result = $test->isMatch($s, $p);
if ($result === false)  {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$s = "aa";
$p = "a*";
$result = $test->isMatch($s, $p);
if ($result === true)  {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$s = "ab";
$p = ".*";
$result = $test->isMatch($s, $p);
if ($result === true)  {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}