<?php

/* error_reporting(E_ALL); */

function cons($x, $y)
{
    return function ($method) use ($x, $y) {
        switch ($method) {
            case "car":
                return $x;
            case "cdr":
                return $y;
        }
    };
}

function car($pair)
{
    return $pair("car");
}

function cdr($pair)
{
    return $pair("cdr");
}

function reverse($list)
{
    $iter = function ($items, $acc) use (&$iter) {
        if ($items === null) {
            return $acc;
        } else {
            return $iter(cdr($items), cons(car($items), $acc));
        }
    };

    return $iter($list, null);
}

function listToString($list)
{
    $arr = [];
    $iter = function ($items) use (&$arr, &$iter) {
        if ($items != null) {
            $arr[] = car($items);
            $iter(cdr($items));
        }

    };
    $iter($list);

    return "(" . implode(", ", $arr) . ")";
}

function makeList()
{
    return array_reduce(array_reverse(func_get_args()), function ($acc, $item) {
        return cons($item, $acc);
    });
}

function accumulate($list, $func, $acc)
{
    $iter = function ($list, $acc) use (&$iter, $func) {
        if ($list === null) {
            return $acc;
        }

        return $iter(cdr($list), $func(car($list), $acc));
    };
    return $iter($list, $acc);
}

function map($list, $func)
{
    $iter = function ($list, $acc) use (&$iter, $func) {
        if ($list === null) {
            return reverse($acc);
        }

        return $iter(cdr($list), cons($func(car($list)), $acc));
    };
    return $iter($list, null);
}

function filter($list, $func)
{
    $iter = function ($list, $acc) use (&$iter, $func) {
        if ($list === null) {
            return reverse($acc);
        }

        $newAcc = $func(car($list)) ? cons(car($list), $acc) : $acc;
        return $iter(cdr($list), $newAcc);
    };
    return $iter($list, null);
}
