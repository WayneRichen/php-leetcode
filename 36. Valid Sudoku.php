<?php
class Solution {

    function __construct() {
        $list = [];
        $this->list = $list;
    }

    /**
     * @param String[][] $board
     * @return Boolean
     * @link https://leetcode.com/problems/valid-sudoku/discuss/15472/Short%2BSimple-Java-using-Strings/
     */
    function isValidSudoku($board) {
        for ($i=0; $i < 9; ++$i) { 
            for ($j=0; $j < 9; ++$j) { 
                $num = $board[$i][$j];
                if ($num != ".") {
                    if (!$this->addList($num." in row ".$i) ||
                        !$this->addList($num." in col ".$j) ||
                        !$this->addList($num." in block".(int)($i/3)."-".(int)($j/3))) {
                            return false;
                        }
                }
            }
        }

        return true;
    }

    function addList($key) {
        if (isset($this->list[$key])) {
            return false;
        } else {
            $this->list[$key] = 0;
        }

        return true;
    }
}

$test = new Solution();

$board = 
[["5","3",".",".","7",".",".",".","."]
,["6",".",".","1","9","5",".",".","."]
,[".","9","8",".",".",".",".","6","."]
,["8",".",".",".","6",".",".",".","3"]
,["4",".",".","8",".","3",".",".","1"]
,["7",".",".",".","2",".",".",".","6"]
,[".","6",".",".",".",".","2","8","."]
,[".",".",".","4","1","9",".",".","5"]
,[".",".",".",".","8",".",".","7","9"]];
$result = $test->isValidSudoku($board);
if ($result === true) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$board = 
[["8","3",".",".","7",".",".",".","."]
,["6",".",".","1","9","5",".",".","."]
,[".","9","8",".",".",".",".","6","."]
,["8",".",".",".","6",".",".",".","3"]
,["4",".",".","8",".","3",".",".","1"]
,["7",".",".",".","2",".",".",".","6"]
,[".","6",".",".",".",".","2","8","."]
,[".",".",".","4","1","9",".",".","5"]
,[".",".",".",".","8",".",".","7","9"]];
$result = $test->isValidSudoku($board);
if ($result === false) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}