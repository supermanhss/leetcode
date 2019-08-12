<?php

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 *
 * 给出两个 非空 的链表用来表示两个非负的整数。其中，它们各自的位数是按照 逆序 的方式存储的，并且它们的每个节点只能存储 一位 数字。
 * 如果，我们将这两个数相加起来，则会返回一个新的链表来表示它们的和。
 * 您可以假设除了数字 0 之外，这两个数都不会以 0 开头。
 */
class T2Solution
{
    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2)
    {
        $obj = null;

        $additional = 0;
        do {
            $value = $l1->val + $l2->val + $additional;
            if ($value < 10) {
                $additional = 0;
            } else {
                $value -= 10;
                $additional = 1;
            }

            $tmp_obj = new ListNode($value);

            if (is_null($obj)) {
                $obj = $tmp_obj;
            } else {
                $next->next = $tmp_obj;
            }
            $next = $tmp_obj;

            $l1 = $l1->next;
            $l2 = $l2->next;

        } while ($l1 || $l2 || $additional);

        return $obj;
    }
}