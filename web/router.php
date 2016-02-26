<?php

$routes = [
  ['/', function () {
    return '<p>main page</p>';
  }],
  ['/sign_in', function () {
    return 'you signed in';
  }]
];

class Application
{
  private $routes;
  public function __construct($routes) {
    $this->$routes = $routes;
  }

  public function run() {
    // REQUEST METHOD
    $uri = $_SERVER["REQUEST_URI"];
    foreach ($this->routes as $item) {
      list($route, $handler) = $item;
      $preparedRoute = preg_quote($route, '/');
      if (preg_match("/^preparedRoute$/i", $uri)) {
        echo $handler();
        return;
      }
    }
  }
}

$app = new Application($routes);
$app->run();
