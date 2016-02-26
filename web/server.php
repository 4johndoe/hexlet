<?php
// echo lower("LKJDHL");
function server ($url)
{
  if (preg_match('/^\/about\/?$/i', $url)) {
    return "<h1>about company</h1>";
  }
}

echo server($_SERVER['REQUEST_URI']);
