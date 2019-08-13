<?php

class ListNode
{
    /* @var int $val */
    public $val = 0;

    /* @var ListNode $next */
    public $next = null;

    public function __construct($val)
    {
        $this->val = $val;
    }
}

/**
 * 对链表进行插入排序
 * 
 */
class T147Solution
{
    /**
     * @param ListNode $head
     * @return ListNode
     */
    public static function insertionSortList($head)
    {
        $length = 0;
        self::getLength($head, $length);

        for ($i = 1; $i <= $length; $i ++) {
            $times = $length - $i;
            self::bubbleSort($head, $times);
        }

        return $head;
    }

    public static function bubbleSort(ListNode $head, &$times)
    {
        if ($head->next && $head->next->val < $head->val) {
            $temp_val = $head->val;
            $head->val = $head->next->val;
            $head->next->val = $temp_val;
        }

        if (--$times > 0) {
            self::bubbleSort($head->next, $times);
        }
    }

    public static function getLength($head, &$length)
    {
        if ($head) {
            ++ $length;
            if ($head->next) {
                self::getLength($head->next, $length);
            }
        }
    }
}

$d = new ListNode(1);
$d->next = null;
$c = new ListNode(4);
$c->next = $d;
$b = new ListNode(3);
$b->next = $c;
$a = new ListNode(5);
$a->next = $b;
$y = new ListNode(-1);
$y->next = $a;
$x = new ListNode(-1);
$x->next = $y;
$z = new ListNode(-2);
$z->next = $x;

$newList = T147Solution::insertionSortList($z);
print_r($newList);