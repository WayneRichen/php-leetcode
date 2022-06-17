<?php
/**
 * Definition for a singly-linked list.
 **/
class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     * @link https://github.com/wuqinqiang/leetcode-php/blob/master/0-50/24.md/
     */
    function swapPairs($head) {     
        $init = new ListNode(-1);
        $init->next = $head;
        $tmp = $init;
        while ($tmp->next != null && $tmp->next->next != null) {
            $start = $tmp->next;
            $end = $tmp->next->next;
            $tmp->next = $end;
            $start->next = $end->next;
            $end->next = $start;
            $tmp = $start;
        }
        
        return $init->next;
     }
}

$test = new Solution();

$node1 = new ListNode(1);
$node1->next = new ListNode(2);
$node1->next->next = new ListNode(3);
$node1->next->next->next = new ListNode(4);
$result = $test->swapPairs($node1);

if ($result->val === 2 && $result->next->val === 1 && $result->next->next->val === 4 && $result->next->next->next->val === 3) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}