<!-- Реализуйте функцию merge, которая принимает на вход два отсортированных массива и возвращает отсортированный массив, полученный слиянием первых двух массивов.

Простейшая реализация основана на использовании вложенного цикла, и в худшем случае ее сложность — О(n*m). Существует возможность реализовать алгоритм со сложностью О(n+m). Для этого нужно воспользоваться тем фактом, что массивы приходят уже отсортированными.

Пример:

[1, 2] == merge([], [1, 2]);
[1, 5, 5, 6, 10, 15, 100] == merge([1, 5, 10], [5, 6, 15, 100]);

function merge($first, $second) {
  $a = sizeof($first);
  $b = sizeof($second);


}

//http://www.algolist.net/Algorithms/Merge/Sorted_arrays
<?php

function merge($first, $second)
{
    // BEGIN (write your solution here)
    $result = [];
    $i = 0;
    $j = 0;
    $k = 0;
    $f = sizeof($first);
    $s = sizeof($second);

    while($i < $f && $j < $s) {
        if ($first[$i] <= $second[$j]) {
            $result[$k] = $first[$i];
            $i++;
        } else {
            $result[$k] = $second[$j];
            $j++;
        }
        $k++;
    }

    if ($i < $f) {
        for ($p = $i; $p < $f; $p++) {
            $result[$k] = $first[$p];
            $k++;
        }
    }

    if ($j < $s) {
        for ($p = $j; $p < $s; $p++) {
            $result[$k] = $second[$p];
            $k++;
        }
    }

    return $result;
    // END

}
print_r(merge([1, 2, 3], [7, 8, 9, 10]));
