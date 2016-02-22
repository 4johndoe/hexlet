<?php
// '/' == cd('/current/path', '/')
// '/current/anotherpath' == cd('/current/path', '.././anotherpath')
function cd ($current, $move)
{
  if (0 === strpos('/', $move)) {
    return $move;
  }
  $currentParts = explode(DIRECTORY_SEPARATOR, $current); // ['', 'current', 'path']
  $parts = explode(DIRECTORY_SEPARATOR, $move);           // ['..', '.', 'anotherpath']
  // print_r($parts);
  $updatedParts = array_reduce($parts, function ($acc, $item) {
    switch ($item) {
      case '.':
        return $acc;
      case '..':
        return $array_slice($acc, 0, -1);
      case '':
        return $acc;
      default:
        $acc[] = $item;
        return $acc;
    }
  }, $currentParts);
  return implode(DIRECTORY_SEPARATOR, $updatedParts);
}
cd('/current/path', '.././anotherpath');
