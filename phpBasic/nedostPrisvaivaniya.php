<?php

function makeDecrement($balance) {
  return function ($amount) use ($balance) {
    return $balance - $amount;
  };
}

function makeWithdraw($balance) {
  return function ($amount) use (&$balance) {
    $balance -= $amount;
    return $balance;
  };
}

function factorial($n)
{
  $product = 1;
  $counter = 1;
  $iter = function () use ($n, &$iter, &$product, &$counter) {
    if ($counter > $n) {
      return $product;
    } else {
      $product *= $counter;
      $counter += 1;
      return $iter();
    }
  };
  return $iter();
}

function fib($num) {
  // $tmp;
  $fib1 = 0;
  $fib2 = 1;
  $i = 0;

  $iter = function () use ($num, &$i, &$fib1, &$fib2, &$iter) {
    if ($i < $num) {
      $tmp = $fib1;
      $fib1 = $fib2;
      $fib2 = $tmp + $fib2;
      $i ++;
      $iter();
    }
  };
  $iter();
  return $fib1;
}
#############################
// Реализуйте функцию fib находящую числа Фибоначчи используя рекурсивно-итеративный процесс, но вместо аккумулятора параметров для вложенной функции $iter используйте переменные.
//
// Формула:
//
// f(0) = 0
// f(1) = 1
// f(n) = f(n-1) + f(n-2)
// Пример:
//
// 2 == fib(3)
// 5 == fib(5)
// 55 == fib(10)
