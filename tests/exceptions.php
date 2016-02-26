<?php

namespace App;

class SolutionTest extends \PHPUnit_Framework_TestCase
{
// 	/*
// 	*	@expectedException \InvalidArgumentException
// 	*/
// 	public function testExceptionUsingAnnotation()
// 	{
// 		$this->assertException(
// 		'InvalidArgumentException', function () {
// 			throw new \InvalidArgumentException('Some Message');
// 		});
// 	}
//
// 	public function testExceptionUsingTry()
// 	{
// 		try {
// 			throw new \InvalidArgumentException("Error Processing Request", 1);
// 			$this->fail("expected exception");
// 		} catch (\InvalidArgumentException $e) {
//
// 		}
// 	}
public function testAccessDenied()
    {
        $acl = new Acl(static::$data);

        // BEGIN (write your solution here)
        try {

        } catch (Acl\AccessDenied $e) {
        }
        // END
    }

    // BEGIN (write your solution here)
    public function testResourceUndefined()
    {
        $acl = new Acl(static::$data);

        try {

        } catch (Acl\ResourceUndefined $e) {
        }
    }

    public function testPrivilegeUndefined()
    {
        $acl = new Acl(static::$data);

        try {

        } catch (Acl\PrivilegeUndefined $e) {
        }
    }
    // END
}
