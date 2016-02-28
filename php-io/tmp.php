<?php

// $dir = sys_get_temp_dir();
// // echo $dir . PHP_EOL;
// $tmpfname = tempnam($dir, "HEXLET");
//
// $temp = tmpfile();
// try {
//   fwrite($temp, "my data");
//   fseek($temp, 0);
//   echo fread($temp, 1024);
// } finally {
//   fclose($temp);
// }
// $temp = new \SplTempFileObject();
function tmpdir($func) {
  $dir = sys_get_temp_dir() . DIRECTORY_SEPARATOR . uniqid();
  mkdir($dir);
  try {
    return $func($dir);
  } finally {
    rmdir($dir);
  }
};

$dirname = tmpdir(function ($dir) {
  return tempnam($dir, 'hexlet123');
});

if (file_exists($dirname)) {
  echo $dirname . " exists\n";
} else {
  echo "failed";
}
