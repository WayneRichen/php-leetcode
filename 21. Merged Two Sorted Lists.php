<?php
/**
 * Definition for a singly-linked list.
**/
class ListNode {
    public $val = null;
    public $next = null;
    function __construct($val = null, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

class Solution {

    /**
     * @param ListNode $list1
     * @param ListNode $list2
     * @return ListNode
     */
    function mergeTwoLists($list1, $list2) {
        if (empty($list1)) return $list2;
        if (empty($list2)) return $list1;
        if ($list1->val < $list2->val) {
            $list1->next = $this->mergeTwoLists($list1->next, $list2);
            return $list1;
        } else {
            $list2->next = $this->mergeTwoLists($list1, $list2->next);
            return $list2;
        }
    }
}

$list1 = new ListNode();
$list1->val = 1;

$node2 = new ListNode();
$node2->val = 2;

$node3 = new ListNode();
$node3->val = 4;
$node2->next = $node3;
$list1->next = $node2;

$list2 = new ListNode();
$list2->val = 1;

$node2 = new ListNode();
$node2->val = 3;

$node3 = new ListNode();
$node3->val = 4;
$node2->next = $node3;
$list2->next = $node2;

$test = new Solution();
$result = $test->mergeTwoLists($list1, $list2);
if ($result->val === 1 && $result->next->val === 1 && $result->next->next->val === 2 && $result->next->next->next->val === 3 && $result->next->next->next->next->next->val === 4 && $result->next->next->next->next->next->val === 4) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$list1 = null;
$list2 = null;

$test = new Solution();
$result = $test->mergeTwoLists($list1, $list2);
if ($result === null) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$list1 = new ListNode();
$list1->val = 0;
$list2 = null;

$test = new Solution();
$result = $test->mergeTwoLists($list1, $list2);
if ($result->val === 0) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}