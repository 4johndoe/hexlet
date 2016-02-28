<?php

$updatedRoute = $route;
if (preg_match_all('/:([^\/]+)/', $route, $matches)) {
  $updatedRoute = array_reduce($matches[1], function ($acc, $value) {
    $group = "(?P<$value>[\w-]+)";
    return str_replace(":{$value}", $group, $acc);
  }, $route);
}
