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

/**
 * Solution1 runtime: 35 ms
 */
class Solution {

    /**
     * @param ListNode[] $lists
     * @return ListNode
     */
    function mergeKLists($lists) {
        $arr = [];
        for ($i=0; $i<count($lists); $i++) {
            while ($lists[$i] != null) {
                $arr[] = $lists[$i]->val;
                $lists[$i] = $lists[$i]->next;
            }
        }
        sort($arr);
        $result = $list = new ListNode();
        foreach($arr as $value) {
            $list->next = new ListNode($value);
            $list = $list->next;
        }
        
        return $result->next;
    }
}

/**
 * Solution2 runtime: 1796 ms
 */
// class Solution {

//     /**
//      * @param ListNode[] $lists
//      * @return ListNode
//      */
//     function mergeKLists($lists) {
//         $result = null;
//         for ($i=0; $i < count($lists); $i++) { 
//             $result = $this->mergeTwoLists($result, $lists[$i]);
//         }
        
//         return $result;
//     }

//     function mergeTwoLists($list1, $list2) {
//         if (empty($list1)) return $list2;
//         if (empty($list2)) return $list1;
//         if ($list1->val < $list2->val) {
//             $list1->next = $this->mergeTwoLists($list1->next, $list2);
//             return $list1;
//         } else {
//             $list2->next = $this->mergeTwoLists($list1, $list2->next);
//             return $list2;
//         }
//     }

//     function debug($node) {
//         while ($node->next != null) {
//             echo $node->val." ";
//             $node = $node->next;
//         }
//     }
// }

$test = new Solution();

$node1 = new ListNode(1);
$node1->next = new ListNode(4);
$node1->next->next = new ListNode(5);
$node2 = new ListNode(1);
$node2->next = new ListNode(3);
$node2->next->next = new ListNode(4);
$node3 = new ListNode(2);
$node3->next = new ListNode(6);
$lists = [$node1, $node2, $node3];
$result = $test->mergeKLists($lists);

if ($result->val === 1 && $result->next->val === 1 && $result->next->next->val === 2 && $result->next->next->next->val === 3 && $result->next->next->next->next->val === 4 && $result->next->next->next->next->next->val === 4 && $result->next->next->next->next->next->next->val === 5 && $result->next->next->next->next->next->next->next->val === 6) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$lists = [];
$result = $test->mergeKLists($lists);
if ($result === null) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}

$lists = [[]];
$result = $test->mergeKLists($lists);
if ($result === null) {
    echo "\e[1;32mTests Passed!\e[0m\n";
} else {
    echo "\e[0;31mFailed!\e[0m\n";
}