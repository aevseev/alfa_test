<?php

/**
 * ЗАДАНИЕ:
 *   • Умножить каждое значение массива на два
 *   <?
 *   $a = [ 1, 2, [ [ 9, 10, [ 11 ] ], 7, 8 ], 3, 5 ];
 *   ?>
 */

$a = [1, 2, [[9, 10, [11]], 7, 8], 3, 5];
print_r($a);

/** РЕШЕНИЕ: */
function multiply(array & $array, float $multiplier = 2)
{
    foreach ($array as & $item) {
        if (is_array($item)) {
            multiply($item, $multiplier);
        } else {
            $item = $item * $multiplier;
        }
    }
}

multiply($a, 2);

print_r($a);
