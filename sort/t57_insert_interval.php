<?php

/**
 * Class T57Solution
 *
 * 给出一个无重叠的 ，按照区间起始端点排序的区间列表。
 * 在列表中插入一个新的区间，你需要确保列表中的区间仍然有序且不重叠（如果有必要的话，可以合并区间）。
 */
class T57Solution
{
    /**
     * @param Integer[][] $intervals
     * @param Integer[] $newInterval
     * @return Integer[][]
     */
    public static function insert($intervals, $newInterval)
    {
        $outIntervals = [$newInterval];
        foreach ($intervals as $interval) {
            $end = array_pop($outIntervals);

            if ($end[1] < $interval[0]) {
                array_push($outIntervals, $end);
                array_push($outIntervals, $interval);
            } elseif ($end[0] > $interval[1]) {
                array_push($outIntervals, $interval);
                array_push($outIntervals, $end);
            } else {
                $start = min($end[0], $interval[0]);
                $last = max($end[1], $interval[1]);
                array_push($outIntervals, [$start, $last]);
            }
        }

        return $outIntervals;
    }
}

$intervals = [[2,6],[7,9]];
$newInterval = [15, 18];

$outIntervals = T57Solution::insert($intervals, $newInterval);
print_r($outIntervals);