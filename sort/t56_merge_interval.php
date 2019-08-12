<?php

/**
 * Class T56Solution
 *
 * 给出一个区间的集合，请合并所有重叠的区间。
 */
class T56Solution
{
    /**
     * @param Integer[][] $intervals
     * @return Integer[][]
     */
    public static function merge($intervals)
    {
        $sort = [];
        foreach ($intervals as $interval) {
            $sort[] = $interval[0];
        }

        array_multisort($intervals, $sort, SORT_ASC);

        $newIntervals = [];
        foreach ($intervals as $item) {

            if ($newIntervals === []) {
                $newIntervals[] = $item;
                continue;
            }

            $end = end($newIntervals);
            $key = key($newIntervals);
            if ($item[0] > $end[1]) {
                $newIntervals[] = $item;
                continue;
            }

            if ($item[1] > $newIntervals[$key][1]) {
                $newIntervals[$key][1] = $item[1];
            }
        }

        return $newIntervals;
    }
}

$intervals = [[1,3],[2,6],[8,10],[15,18]];

$newIntervals = T56Solution::merge($intervals);
print_r($newIntervals);