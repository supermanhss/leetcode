<?php

/**
 * Class T3Solution
 *
 * 无重复字符的最长子串
 * 给定一个字符串，请你找出其中不含有重复字符的 最长子串 的长度。
 */
class T3Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s)
    {
        $i      = 0;
        $flag   = 0;
        $length = 0;
        $result = 0;

        $s_length = strlen($s);

        while ($i < $s_length) {

            $pos = strpos($s, $s{$i}, $flag);
            if ($pos < $i) {
                if ($length > $result) {
                    $result = $length;
                }
                if ($result >= $s_length - $pos - 1) {
                    return $result;
                }
                $length = $i - $pos - 1;
                $flag = $pos + 1;
            }

            $i ++;
            $length ++;
        }
        return $length;
    }
}