<?php 

function grep($string, $path)
{
    // BEGIN (write your solution here)
    $iterator = new \GlobIterator($path);
    $lines = [];
    foreach ($iterator as $path => $info) { 
    	if (!$info->isFile()) {				// list all files in $path
    		continue;						//
    	}									//
    	$content = file($path);
    	foreach ($content as $line) {
    		if (false !== strpos($line, $string)) {
    			$lines[] = $line;
    		}
    	}
    }

    return $lines;
    // END
}
// $file = '';
// ######################################
// is_readable($file); //boo
// ######################################
// file($file); // array of lines
// ######################################
// file_get_contents($file); // string
// ######################################
// $handle = fopen($file, "rb"); //read_binary, fileDescriptor
// 	fread($handle, filesize($file)); // content wrap by try; (size, amount of bites)
// 	fclose($handle); //finaly(<here>)
// ######################################
// !feof($handle);
// fgets($handle, 1024); // + finally fclose
// ######################################
// $userinfo = fscanf($handle, "%s\t%s\t%s\n");
// list($name, $profession, $countrycode) = $userinfo; // + finally fclose
// ######################################
// $f = new SplFileObject($file);
// $f->eof();
// $f->fgets();
// foreach ($f as $lineNumber => $content) {
// 	printf("Line %d: %s", $lineNumber, $content);
// }
// ######################################
// $lines = new LimitIterator(
// 	$file, 
// 	9, // start at line 9
// 	10 // iterate 10 lines
// );
// foreach ($lines as $line) {
// 	echo $line; // out lines 10 to 20
// }
