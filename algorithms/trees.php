<?php

function findIndex(array $tree, $element) {

  if (empty($tree)) {
    return null;
  }

  $iter = function($index) use (&$iter, $tree, $element) {
    if ($index >= sizeof($tree)) {
      return null;
    } elseif ($element == $tree[$index]) {
      return $index;
    } else {
      $number = $element > $tree[$index] ? 2 : 1;
      return $iter(2 * $index + $number);
    }
  };

  return $iter(0);
}
