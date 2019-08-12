<?php

/**
 * Class Solution
 *
 * 字符串转换整数
 */
class T8Solution
{
    const INT_MAX = 2147483647;
    const INT_MIN = -2147483648;

    /**
     * @param String $str
     * @return Integer
     */
    function myAtoi($str)
    {
        $str = ltrim($str, ' ');
        if (! $str) {
            return 0;
        }

        $less = false;
        if (strpos($str, '-') === 0) {
            $less = true;
            $str = substr($str, 1);
        } elseif (strpos($str, '+') === 0) {
            $str = substr($str, 1);
        }

        $int = 0;
        $i = 0;
        while (isset($str{$i})) {
            if (! is_numeric($str{$i})) {
                return $int;
            }

            if ($less) {
                $int = $int * 10 - $str{$i};
            } else {
                $int = $int * 10 + $str{$i};
            }

            if ($int > self::INT_MAX) {
                return self::INT_MAX;
            }

            if ($int < self::INT_MIN) {
                return self::INT_MIN;
            }

            $i++;
        }

        return $int;
    }
}