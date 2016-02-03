<?php

require 'base.php';

function treeMap($list, $func, $acc)
{
	$iter = function ($list, $acc) use (&$iter, $func)
	{
		if ($list === null) {
			return $acc;
		}

		$element = car($list);

		if (isPair($element)) {
			$newAcc = treeMap($element, $func, $acc);
		} else {
			$newAcc = $func($element, $acc);
		}

		return $iter(cdr($list), $newAcc);
	};

	return $iter($list, $acc);
}

$list = l(1, 3, l(1, l(2, 3), 2), 9);

$result = treeMap($list, function ($item, $acc) {
	return $acc + 1;
}, 0);

// <?php

// require 'base.php';

// function reverse($list)
// {
//     $iter = function ($items, $acc) use (&$iter) {
//         if ($items === null) {
//             return $acc;
//         } else {
//             $element = car($items);
//             // BEGIN (write your solution here)
//             if (isPair($element)) {
//     			$result = reverse($element);
//     		} else {
//     			$result = $element;
//     		}
//             // END
//             return $iter(cdr($items), cons($result, $acc));
//         }
//     };

//     return $iter($list, null);
// }
