<?php

$foo = function ($a) {
  return function ($b) use ($a) {
    return $a - $b;
  };
};
Реализуйте функцию mapWithPower, которая принимает на вход массив и степень, и возвращает новый массив, в котором каждое значение возведено в переданную степень.

Пример:

[1, 1, 9, 100, 0] == mapWithPower([-1, 1, 3, 10, 0], 2)
Подсказки:
Возведение в произвольную степень - pow.

function mapWithPower($array, $power) {
    $func = partial_any('pow', …, $power);
    return map($array, $func);
}
