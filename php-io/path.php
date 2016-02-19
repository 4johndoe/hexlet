<?php

// echo __FILE__ . PHP_EOF;
// echo __DIR__;
// echo basename(__FILE__);
// print_r(pathinfo());
// echo getcwd();
//
// $pathParts = ['var', 'tmp', 'hexlet'];
// $path = implode(DIRECTORY_SEPARATOR, $pathParts);
// // echo DIRECTORY_SEPARATOR . $path;
//
// $file = new SplFileInfo(__FILE__);
// echo $file->getPathInfo();
// echo $file->getFileName();;
// echo $file->getExtension();
//
// '/' == cd('/current/path', '/')
// '/current/anotherpath' == cd('/current/path', '.././anotherpath')
function cd ($curDir, $needDir)
{
  // $moved = '';
  $parse = explode('/', $needDir);
  if ($parse[0] == '') {                              // /usr/local
    return $needDir . PHP_EOL;
  } else if ($parse[0] == '.' || $parse[0] == '') {   // ./local
    return $curDir . $needDir . PHP_EOL;
  } else if ($parse[0] == '..') {                     // ../bin
    $curDirParsed = explode('/', $curDir);            // []
    $needDirParsed = explode('/', $needDir);            // []
    array_pop($curDirParsed);                          // pop last item
    array_shift($needDirParsed);
    $needDir = implode('/', $needDirParsed);
    $curDirParsed[] = $needDir;
    $curDirParsed = implode('/', $curDirParsed);
    return $curDirParsed;
  } else {
    return 'nope' . PHP_EOL;
  }
  // print_r($parse);
}
echo cd('/home/me', '../usr/local/bin');
