<?php

$array = [1, 3, 2, 9, 1, 4, 3];

$result = array_reduce($array, function($acc, $item) {
  return $item > $acc ? $item : $acc;
}, $array[0]); //[]

print_r($result);

echo "\n\n";

$result = reduce_left($array, function ($item, $index, $collection, $acc) {
  return $item > $acc ? $item : $acc;
}, $array[0]);

print_r($result);

file: Solution.php
Реализуйте функцию wordsCount которая принимает на вход массив слов и возвращает массив в котором ключ это слово, а значение это количество раз которое это слово встречалось в исходном массиве. Пример:

['cat' => 1, 'dog' => 1, 'fish' => 2] == wordsCount(['cat', 'dog', 'fish', 'fish'])

function wordsCount($array) {
    return array_reduce($array, function($item, $acc) {
        return $item > $acc ? $item : $acc;
    }, $array[0]);
}

// BEGIN (write your solution here)
function wordsCount($array) {
    return array_reduce($array, function($acc, $item) {
        if (!array_key_exists($item, $acc)) {
            $acc[$item] = 1;
        } else {
            $acc[$item]++;
        }

        return $acc;
    }, []);
}

print_r(wordsCount(['cat', 'dog', 'fish', 'fish']));
// END
