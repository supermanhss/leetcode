<?php

/**
 * Class Solution
 *
 * 给定一个包含红色、白色和蓝色，一共 n 个元素的数组，原地对它们进行排序，使得相同颜色的元素相邻，并按照红色、白色、蓝色顺序排列。
 * 此题中，我们使用整数 0、 1 和 2 分别表示红色、白色和蓝色。
 */
class T75Solution
{
    /**
     * @param Integer[] $colors
     */
    public static function sortColors(&$colors)
    {
        $p0 = 0;
        $curr = 0;
        $p2 = count($colors) - 1;

        while ($curr <= $p2) {
            if ($colors[$curr] == 0) {
                $tmp             = $colors[$p0];
                $colors[$p0++]   = 0;
                $colors[$curr++] = $tmp;
            } else if ($colors[$curr] == 2) {
                $tmp = 2;
                $colors[$curr] = $colors[$p2];
                $colors[$p2--] = $tmp;
            } else {
                $curr++;
            }
        }
    }
}

$colors = [2,0,2,1,1,0];
T75Solution::sortColors($colors);
print_r($colors);

