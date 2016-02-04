<?php

usort($collection, function ($left, $right) {
  return strcmp($left, $right);
});

Реализуйте функцию sortByBinary, которая сортирует переданную коллекцию и возвращает новую коллекцию. Сортировка происходит следующим образом:

Сортируем по количеству единиц в бинарном представлении (порядок следования не важен).
Если количество единиц одинаково, то сортируем на основе десятичного представления.
Пример:

[1, 2, 4, 3] == sortByBinary([3, 4, 2, 1]);

// kir
// BEGIN
function sortByBinary($collection)
{
    $onesCount = function ($number) {
        $binary = decbin($number);
        $bitsArray = str_split(strval($binary));
        return sizeof(array_filter($bitsArray, function ($bit) {
            return $bit == "1";
        }));
    };

    usort($collection, function ($prev, $next) use ($onesCount) {
        $prevCount = $onesCount($prev);
        $nextCount = $onesCount($next);

        if ($prevCount === $nextCount) {
            if ($prev === $next) {
                return 0;
            };

            return ($prev > $next) ? 1 : -1;
        } else if ($prevCount > $nextCount) {
            return 1;
        } else if ($prevCount < $nextCount) {
            return -1;
        }
    });

    return $collection;
}
// END
