<?php

$monkeys = [1,2,3,4,5,6,7];
$number = 3;

while (count($monkeys) > 1) {
    for ($i = 1; $i <= $number; $i ++) {
        if ($i == $number) {
            unset($monkeys[key($monkeys)]);
            if (current($monkeys) === false) {
                reset($monkeys);
            }
            continue;
        }

        if (next($monkeys) === false) {
            reset($monkeys);
        }
    }
}

echo current($monkeys);