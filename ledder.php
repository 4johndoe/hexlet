<?php

$b = 1;

function ledder($reps, $stairs) {
  $amount_reps = 0;
  for ($i=1; $i <= $stairs; $i++) {
    $amount_reps += $reps*$i;
  }
  return $amount_reps;
}

echo ledder($b, 30) . "\n";
// $reps = 1;
// echo $reps . "\n";
// $reps *= 2;
// echo $reps . "\n";
// $reps *= 2;
// echo $reps . "\n";
