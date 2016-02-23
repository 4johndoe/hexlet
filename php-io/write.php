<?php

$file = __DIR__ . DIRECTORY_SEPARATOR . 'temp';
$data = "my data\n";

file_put_contents($file, $data); // FILE_APPEND

if (is_writable($file)) {
	$handle = fopen($file, "ab"); # a+ c
	if ($handle) {
		try {
			fwrite($handle, $data);
			fwrite($handle, $data);
		} finally {
			fclose($handle);
		}
	}
}
$file = new \SplFileObject($file, 'ab');
$file->fwrite($data);