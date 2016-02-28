<?php

namespace App;

require_once 'Application.php';

$app = new Application();

$data = [
    ['id' => 4, 'age' => 15],
    ['id' => 3, 'age' => 28],
    ['id' => 8, 'age' => 3],
    ['id' => 1, 'age' => 23]
];

// BEGIN (write your solution here)
$app->get('/', function ($params) use ($data) {
  if (array_key_exists('sort', $params)) {
    list($key, $order) = split(' ', $params['sort']);

    usort($data, function ($prev, $next) use ($key, $order) {
      $prevVal = $prev[$key];
      $nextVal = $next[$key];

      if ($prevVal == $nextVal) {
        return 0;
      }

      if ($order == 'desc') {
        return $prevVal < $nextVal ? 1 : -1;
      } else if ($order == 'asc') {
        return $prevVal > $nextVal ? 1 : -1;
      }
    });
  }
  return json_encode($data);
});
// END

$app->run();
