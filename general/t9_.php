<?php

/**
 * Class T9Solution
 *
 * 回文数
 * 判断一个整数是否是回文数。回文数是指正序（从左向右）和倒序（从右向左）读都是一样的整数。
 */
class T9Solution
{
    /**
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome($x)
    {
        if ($x < 0) return false;
        $s = (string) $x;

        $len = floor(strlen($s) / 2);
        for ($i = 0; $i < $len; $i++) {
            if ($s{$i} != $x % 10) return false;
            $x /= 10;
        }

        return true;
    }
}