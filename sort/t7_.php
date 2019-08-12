<?php

/**
 * Class Solution
 *
 * 整数反转
 * 给出一个 32 位的有符号整数，你需要将这个整数中每位上的数字进行反转。
 */
class T7Solution
{
    const INT_MAX = 2147483647;
    const INT_MIN = -2147483648;

    /**
     * @param Integer $x
     * @return Integer
     */
    function reverse($x)
    {
        $flag = $x < 0 ? '-' : '';

        $rev = $flag . strrev($x);

        if ($rev > self::INT_MAX || $rev < self::INT_MIN) {
            return 0;
        }

        return (int) $rev;
    }
}