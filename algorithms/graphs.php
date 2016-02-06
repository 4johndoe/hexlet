<?php

function sortGraph (array $graph) {
  // 0 - if empty
  if (empty($graph)) {
    return [];
  }
  // 3.1 - lookup
  $lookup = function($current, $apexes, $processed, $result) use (&$lookup, $graph) {
    if (array_key_exists($current, $processed)) {
      if (empty($apexes)) {
        return [$processed, $result];
      } else {
        $newCurrent = array_shift($apexes); // take 1st element from array
        return $lookup($newCurrent, $apexes, $processed, $result);
      }
    }

    $subApexes = $graph[$current];

    list($processed, $result) = array_reduce($subApexes, function($acc, $subApex) use ($graph, &$lookup, $apexes) {
      list($processed, $result) = $acc;
      if (!array_key_exists($subApex, $graph)) {
        if (!array_key_exists($subApex, $processed)) {
          $result [] = $subApex;
          $processed[$subApex] = true;
          return [$processed, $result];
        }
      } else {
        if (!array_key_exists($subApex, $processed)) {
          return $lookup($subApex, [], $processed, $result);
        }
      }

      return $acc;
    }, [$processed, $result]);

    if (!array_key_exists($current, $processed)) {
      $result [] = $current;
      $processed [$current] = true;
    }

    if (empty($apexes)) {
      return [$processed, $result];
    }

    return $lookup($apexes[0], $apexes, $processed, $result);
  };
  // 1 - apexes($graph)
  $apexes = array_keys($graph);
  // 2 - enter
  list($processed, $result) = $lookup($apexes[0], $apexes, [], []);
  // 3 - exit
  return $result;
};

// $graph = [];
$graph = [
    'mongo' => [],
    'tzinfo' => ['thread_safe'],
    'uglifier' => ['execjs'],
    'execjs' => ['thread_safe', 'json'],
    'redis' => []
];
print_r(sortGraph($graph));
