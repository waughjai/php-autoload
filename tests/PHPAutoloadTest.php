<?php

declare( strict_types = 1 );

use PHPUnit\Framework\TestCase;
use WaughJ\PHPAutoload\PHPAutoload;

class PHPAutoloadTest extends TestCase
{
	public function testObjectWorks() : void
	{
		$loader = new PHPAutoload( getcwd() . '/tests/load' );
		$loader->loadAll();
		$this->assertEquals( "I Exist", iExist() );
		$this->assertEquals( "I Also Exist", iAlsoExist() );
	}
}
