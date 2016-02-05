<?php

// Реализуйте функцию separateEvenAndOddNumbers, которая принимает на вход массив чисел и возвращает массив, в котором первый элемент это массив четных чисел, а второй элемент это массив нечетных чисел полученных из исходного массива.
//
// BEGIN (write your solution here)
function separateEvenAndOddNumbers($array) {
    $newArray;
    list($even, $odd) = partition($array, function($even) {
        return $even % 2 == 0;
    });
    $newArray[0] = $even;
    $newArray[1] = $odd;
    return $newArray;
}
// END
print_r(separateEvenAndOddNumbers([1, 2, 3, 4]));
