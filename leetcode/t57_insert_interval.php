<?php

class Solution
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

$outIntervals = Solution::insert($intervals, $newInterval);
print_r($outIntervals);