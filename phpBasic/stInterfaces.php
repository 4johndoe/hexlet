<?php 

require 'bace.php';

$list = l(1, 4, 5, 8, 9, 100);

function sumOfDoubleOdds($list) {
	return accumulate($list, function ($item, $acc) {
		if ($item % 2 === 1) {
			return $item * 2 + $acc;
		} else {
			return $acc;
		}
	}, 0);
}


// <?php

// require 'base.php';

// // BEGIN (write your solution here)
// function solution ($list) {
//     $acc = 0;
    
//     return accumulate(map(filter($list, function($item) { 
//         return $item % 3 == 0; 
//     }), function($item) {
//         return $item ** 2;
//     }), function($item, $acc) {
//         return ($item + $acc) / length($item);
//     }, $acc);
// }
// END
