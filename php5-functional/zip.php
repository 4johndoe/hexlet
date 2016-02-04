<?php

// array_map
$result = array_map(null, range(1, 3), range(11, 13));
print_r($result);
[1, 2] zip with [3, 4] [[1, 3], [2]]
// zip
$result = zip(range(1, 3), range(11, 13));
print_r($result);

// array_map
$result = array_map(function($a, $b) {
  return [$a, $b];
}, range(1, 3), range(11, 13));
print_r($result);

#########################################################################
Один из способов определения победителя в футболе это пенальти. Процесс идет так: В каждой попытке бьет игрок каждой из команд и определяется команда победитель этой попытки. Процесс продолжается до 5 попыток, хотя победитель может быть выявлен и раньше. Если после пяти попыток победитель не выявлен, то процесс продолжается до первой выигранной попытки.

file: Solution.php
Реализуйте функцию bestAttempt которая принимает на вход результаты попыток и возвращает массив со списком имен футбольных клубов. Имя в текущем индексе массива это имя того клуба, чья попытка была лучше. Если результат попытки одинаков, то в результирующем массиве она не фигурирует (потому что никто не победил).

Пример:

$firstClubAttempts = [['name' => 'milan', 'scored' => 1], ['name' => 'milan', 'scored' => 0]];
$secondClubAttempts = [['name' => 'porto', 'scored' => 1], ['name' => 'porto', 'scored' => 1]];

['porto'] = bestAttempt($firstClubAttempts, $secondClubAttempts);


function bestAttempt($first, $second)
{
    $result = zip($first, $second, function ($result1, $result2) {
        if ($result1['scored'] > $result2['scored']) {
            return $result1['name'];
        } else if ($result1['scored'] < $result2['scored']) {
            return $result2['name'];
        } else if ($result1['scored'] == $result2['scored']) {
            return null;
        }
    });

    $result2 = array_filter($result, function ($var) {
        return !is_null($var);
    });

    return array_values($result2);
}

// BEGIN (write your solution here)
function bestAttempt($a, $b) {
    return array_values(array_filter(zip($a, $b, function($x, $y) {
        if ($x['scored'] > $y['scored']) {
            return $x['name'];
        } elseif ($x['scored'] < $y['scored']) {
            return $y['name'];
        } else {
            return null;
        }
    }), function($result) {
        return !is_null($result);
    }));
}
// END
