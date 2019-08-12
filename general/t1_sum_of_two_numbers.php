<?php

/**
 * Class T1Solution
 * 两数之和
 *
 * 给定一个整数数组 nums 和一个目标值 target，请你在该数组中找出和为目标值的那 两个 整数，并返回他们的数组下标。
 * 你可以假设每种输入只会对应一个答案。但是，你不能重复利用这个数组中同样的元素。
 */
class T1Solution
{
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    public function twoSum($nums, $target)
    {
        $found = [];
        $count = count($nums);

        for ($i = 0; $i < $count; $i++) {
            $diff = $target - $nums[$i];

            if (array_key_exists($diff, $found)) {
                return [$found[$diff], $i];
            }

            $found[$nums[$i]] = $i;
        }

        return [];
    }
}