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








 ?>