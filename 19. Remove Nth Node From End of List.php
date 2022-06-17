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
     * @param ListNode $head
     * @param Integer $n
     * @return ListNode
     * @link https://youtu.be/F5kFspTdW1I/
     * @link https://stackoverflow.com/questions/48903013/php-object-both-copy-getting-affected-by-change-in-one/
     */
    function removeNthFromEnd($head, $n) {
        $dummy = new ListNode(-1);
        $dummy->next = $head;
        $slow = $dummy;
        $fast = $dummy;
        for ($i=0; $i < $n; $i++) { 
            $fast = $fast->next;
        }
        while ($fast->next != null) {
            $slow = $slow->next;
            $fast = $fast->next;
        }
        $slow->next = $slow->next->next;

        return $dummy->next;
    }

    function debug($node) {
        echo "[ $node->val ";
        while ($node->next != null) {
            echo $node->next->val." ";
            $node = $node->next;
        }
        echo "]\n";
    }
}

$test = new Solution();

$head = new ListNode(1);
$head->next = new ListNode(2);
$head->next->next = new ListNode(3);
$head->next->next->next = new ListNode(4);
$head->next->next->next->next = new ListNode(5);
$n = 2;
$result = $test->removeNthFromEnd($head, $n);
if ($result->val === 1 && $result->next->val === 2 && $result->next->next->val === 3 && $result->next->next->next->val === 5 && $result->next->next->next->next === null) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$head = new ListNode(1);
$n = 1;
$result = $test->removeNthFromEnd($head, $n);
if ($result === null) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$head = new ListNode(1);
$head->next = new ListNode(2);
$n = 1;
$result = $test->removeNthFromEnd($head, $n);
if ($result->val === 1 && $result->next === null) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}