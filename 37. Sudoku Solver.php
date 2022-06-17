<?php
class Solution {

    /**
     * @param String[][] $board
     * @return NULL
     * @link https://leetcode.com/problems/sudoku-solver/discuss/15752/Straight-Forward-Java-Solution-Using-Backtracking/
     */
    function solveSudoku(&$board) {
        $this->solve($board);
    }

    private function solve(&$board) {
        for ($i=0; $i < count($board); $i++) { 
            for ($j=0; $j < count($board[0]); $j++) { 
                if ($board[$i][$j] == '.') {
                    for ($c = 1; $c <= 9; $c++) { 
                        if ($this->isValid($board, $i, $j, (string)$c)) {
                            $board[$i][$j] = (string)$c;
                            if ($this->solve($board)) return true;
                            else $board[$i][$j] = '.';
                        }
                    }

                    return false;
                }
            }
        }

        return true;
    }

    private function isValid($board, $row, $col, $c) {
        for ($i=0; $i < 9; $i++) {
            if ($board[$i][$col] == $c) return false;
            if ($board[$row][$i] == $c) return false;
            if ($board[3 * (int)($row / 3) + $i / 3][3 * (int)($col / 3) + $i % 3] == $c) return false;
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

$test->solveSudoku($board);
if ($board === [["5","3","4","6","7","8","9","1","2"],["6","7","2","1","9","5","3","4","8"],["1","9","8","3","4","2","5","6","7"],["8","5","9","7","6","1","4","2","3"],["4","2","6","8","5","3","7","9","1"],["7","1","3","9","2","4","8","5","6"],["9","6","1","5","3","7","2","8","4"],["2","8","7","4","1","9","6","3","5"],["3","4","5","2","8","6","1","7","9"]]) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}