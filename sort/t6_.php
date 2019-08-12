<?php

/**
 * Class T6Solution
 *
 * Z字型变换
 * 将一个给定字符串根据给定的行数，以从上往下、从左到右进行 Z 字形排列。
 */
class T6Solution
{
    /**
     * @param String $s
     * @param Integer $numRows
     * @return String
     */
    function convert($s, $numRows)
    {
        $s_len = strlen($s);
        if ($s_len <= $numRows || $numRows <= 1) {
            return $s;
        }

        $str = '';
        for ($i = 1; $i <= $numRows; $i++) {

            $upperRows = $i - 1;
            $downRows = $numRows - $i;

            $next = $upperRows;

            $j = 0;
            while (isset($s{$next})) {
                $str .= $s{$next};

                if ($j%2 === 0) {
                    if ($downRows == 0) {
                        ++ $j;
                        $next = $next + 2 * $upperRows;
                    } else {
                        $next = $next + 2 * $downRows;
                    }
                } else {
                    if ($upperRows == 0) {
                        ++ $j;
                        $next = $next + 2 * $downRows;
                    } else {
                        $next = $next + 2 * $upperRows;
                    }
                }

                ++$j;
            }
        }

        return $str;
    }
}
