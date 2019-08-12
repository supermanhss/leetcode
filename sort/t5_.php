<?php

/**
 * Class Solution
 *
 * 最长回文子串
 * 给定一个字符串 s，找到 s 中最长的回文子串。你可以假设 s 的最大长度为 1000。
 */
class T5Solution
{
    /**
     * @param String $s
     * @return String
     */
    function longestPalindrome($s)
    {
        $s_len = strlen($s);
        if ($s_len < 1) {
            return '';
        } elseif ($s_len <= 2) {
            return $s{0} == $s{1} ? $s : $s{0};
        }

        $symbol = '#';

        $s_with_symbol = "\$" . $symbol;
        for ($i = 0; $i < $s_len; $i ++) {
            $sub_s = $s{$i} . $symbol;
            $s_with_symbol .= $sub_s;
        }

        $p = [];
        $mx = 0;
        $id = 0;
        $resLen = 0;
        $resCenter = 0;
        $s_with_symbol_len = strlen($s_with_symbol);

        for ($i = 1; $i < $s_with_symbol_len; $i ++) {
            $p[$i] = $mx > $i ? min($p[2 * $id - $i], $mx - $i) : 1;

            while ($s_with_symbol{$i + $p[$i]} == $s_with_symbol{$i - $p[$i]}) {
                ++ $p[$i];

                if ($mx < $p[$i] + $i) {
                    $mx = $p[$i] + $i;
                    $id = $i;
                }

                if ($resLen < $p[$i]) {
                    $resLen = $p[$i];
                    $resCenter = $i;
                }
            }
        }

        return substr($s, ($resCenter - $resLen)/2, $resLen - 1);
    }
}