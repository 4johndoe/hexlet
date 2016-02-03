<?php

function random($seed)
{
  $mem = $seed;
  return function ($reset = null) use (&$seed, $mem) {
    $a = 45;
    $c = 21;
    $m = 67;
    switch ($reset) {
      case 'reset':
        $seed = $mem;
        break;

      default:
        $seed = ($a * $seed + $c) % $m;
        break;
    }

    return $seed;
  };
}

// Измените функцию random из видео так, чтобы можно было обнулять сгенерированную последовательность.
//
// Пример:
//
// $seq = random(3);
// $result = $seq(); // 22
// $seq(); // 6
// $seq(); // 23
//
// $seq("reset");
//
// $result == $seq(); // 22
