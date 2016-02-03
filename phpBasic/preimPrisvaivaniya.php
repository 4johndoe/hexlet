<?php

function random($seed)
{
  return function () use (&$seed) {
    $a = 45;
    $c = 21;
    $m = 67;
    $seed = ($a * $seed + $c) % $m;

    return $seed;
  };
}
