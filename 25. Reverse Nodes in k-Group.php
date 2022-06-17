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
     * @param Integer $k
     * @return ListNode
     * @link https://leetcode.com/problems/reverse-nodes-in-k-group/discuss/11457/20-line-iterative-C%2B%2B-solution/
     */
    function reverseKGroup($head, $k) {
        if ($head === null || $k === 1) return $head;
        $num = 0;
        $preheader = new ListNode(-1);
        $preheader->next = $head;
        $cur = $nex = $pre = $preheader;
        while ($cur = $cur->next) {
            $num++;
        }

        while ($num >= $k) {
            $cur = $pre->next;
            $nex = $cur->next;
            for ($i=1; $i < $k; $i++) {
                $cur->next = $nex->next;
                $nex->next = $pre->next;
                $pre->next = $nex;
                $nex = $cur->next;
            }
            $pre = $cur;
            $num-=$k;
        }
        // $this->debug($preheader->next);
        return $preheader->next;
    }

    function debug($list) {
        echo $list->val.", ";
        while ($list->next != null) {
            echo $list->next->val.", ";
            $list = $list->next;
        }
        echo "\n";
    }
}

$test = new Solution();

$head = new ListNode(1);
$head->next = new ListNode(2);
$head->next->next = new ListNode(3);
$head->next->next->next = new ListNode(4);
$head->next->next->next->next = new ListNode(5);
$k = 2;
$result = $test->reverseKGroup($head, $k);

if ($result->val === 2 && $result->next->val === 1 && $result->next->next->val === 4 && $result->next->next->next->val === 3 && $result->next->next->next->next->val === 5) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$head = new ListNode(1);
$head->next = new ListNode(2);
$head->next->next = new ListNode(3);
$head->next->next->next = new ListNode(4);
$head->next->next->next->next = new ListNode(5);
$k = 3;
$result = $test->reverseKGroup($head, $k);

if ($result->val === 3 && $result->next->val === 2 && $result->next->next->val === 1 && $result->next->next->next->val === 4 && $result->next->next->next->next->val === 5) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}