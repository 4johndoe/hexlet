<?php 

class SolutionTest extends PHPUnit_Framework_TestCase
{
	function testCube()
	{
		$this->assertEquals(1, cube(1));
		$this->assertEquals(8, cube(2));
		$this->assertEquals(27, cube(3));
		$this->assertEquals(1000, cube(10));
	}
}
##########################
class Solution2Test extends PHPUnit_Framework_TestCase
{
	/**
	* @dataProvider additionProvider
	*/
	function testCubeDataSet($expected, $args)
	{
		$this->assertEquals($expected, cube($args));
	}

	function additionProvider()
	{
		return [
			[1, 1],
			[8, 2],
			[27, 3],
			[-1, -1]
		];
	}
}
#
/**
     * @dataProvider additionProvider
     */
    public function testHasEqualOnesCount($actual, $first, $second)
    {
        $this->assertEquals($actual, hasEqualOnesCount($first, $second));
    }

    public function additionProvider()
    {
        return [
            [true, 1, 1],
            [false, -1, 1],
            [false, 5, 2],
            [true, 5, 3],
        ];
    }