<?php 

require 'base.php';

function accumulate($list, $func, $acc)
{
	$iter = function ($list, $acc) use (&$iter, $func)
	{
		if ($list == null) 
		{
			return $acc;
		}

		return $iter(cdr($list), $func(car($list), $acc));
	};

	return $iter($list, $acc);
}



function solution($list)
{
    $acc = 1;
    $func = function($item, $acc) 
    {
        return $acc * $item;
    };

    $cellItAll = map($list, function($item) { 					//map
    	return ceil($item);
    });

    $leaveJustEven = filter($cellItAll, function($item) { 		//filter
    	return $item % 2 == 0; 
    });

    $multiplyKill = accumulate($leaveJustEven, $func, $acc);	//reduce

    ######################################################		// one line solution
    // return accumulate(filter(map($list, function($item) { 
    // 	return ceil($item); 
    // }), function($item) { 
    // 	return $item % 2 == 0; 
    // }), function($item, $acc) { 
    // 	return $acc * $item; 
    // }, $acc);

    return $multiplyKill;
}

    // return accumulate(filter(map($list, function($item) { return ceil($item); }), function($item) { return $item % 2 == 0; }), function($item, $acc) { return $acc * $item; }, $acc);



 ?>$