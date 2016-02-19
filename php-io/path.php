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
function cd($current, $move)
{
    // BEGIN (write your solution here)
    $cParsed = explode('/', $current);    // ['', 'current', 'path']
    $mParsed = explode('/', $move);       // ['', '']
    $a = split('/', $move);
    print_r($a);
    // END
}

echo cd('/current/path', '/') . PHP_EOL;
