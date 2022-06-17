<?php
/**
 * Definition for a singly-linked list.
 */
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
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    public $tmp = 0;
    function addTwoNumbers($l1, $l2) {
        $node = new ListNode();
        $l1 = $l1 ?? new ListNode(0);
        $l2 = $l2 ?? new ListNode(0);
        if ($this->tmp + $l1->val + $l2->val > 9) {
            $node->val = $this->tmp + $l1->val + $l2->val - 10;
            $this->tmp = 1;
        } else {
            $node->val = $this->tmp + $l1->val + $l2->val;
            $this->tmp = 0;
        }
        
        if ($this->tmp || !is_null($l1->next) || !is_null($l2->next)) {
            $node->next = $this->addTwoNumbers($l1->next, $l2->next);
        }

        return $node;
    }
}

$l1 = new ListNode();
$l1->val = 2;
$node2 = new ListNode();
$node2->val = 4;
$node3 = new ListNode();
$node3->val = 3;
$node2->next = $node3;
$l1->next = $node2;

$l2 = new ListNode();
$l2->val = 5;
$node2 = new ListNode();
$node2->val = 6;
$node3 = new ListNode();
$node3->val = 4;
$node2->next = $node3;
$l2->next = $node2;

$test = new Solution();
$result = $test->addTwoNumbers($l1, $l2);
if ($result->val === 7 && $result->next->val === 0 && $result->next->next->val === 8) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$l1 = new ListNode();
$l1->val = 0;

$l2 = new ListNode();
$l2->val = 0;

$test = new Solution();
$result = $test->addTwoNumbers($l1, $l2);
if ($result->val === 0) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$l1 = new ListNode();
$l1->val = 9;
$node2 = new ListNode();
$node2->val = 9;
$node3 = new ListNode();
$node3->val = 9;
$node4 = new ListNode();
$node4->val = 9;
$node5 = new ListNode();
$node5->val = 9;
$node6 = new ListNode();
$node6->val = 9;
$node7 = new ListNode();
$node7->val = 9;
$node6->next = $node7;
$node5->next = $node6;
$node4->next = $node5;
$node3->next = $node4;
$node2->next = $node3;
$l1->next = $node2;

$l2 = new ListNode();
$l2->val = 9;
$node2 = new ListNode();
$node2->val = 9;
$node3 = new ListNode();
$node3->val = 9;
$node4 = new ListNode();
$node4->val = 9;
$node3->next = $node4;
$node2->next = $node3;
$l2->next = $node2;

$test = new Solution();
$result = $test->addTwoNumbers($l1, $l2);
if ($result->val === 8 && $result->next->val === 9 && $result->next->next->val === 9 && $result->next->next->next->val === 9 && $result->next->next->next->next->val === 0 && $result->next->next->next->next->next->val === 0 && $result->next->next->next->next->next->next->val === 0 && $result->next->next->next->next->next->next->next->val === 1) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}