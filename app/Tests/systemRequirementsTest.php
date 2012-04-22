<?php

use PHPUnit_Framework_TestCase as TestCase;

class systemRequirementsTest extends TestCase
{
    private $_extensions = null;

    public function setUp()
    {
	$this->_extensions = array('curl', 'memcache','pdo_mysql','intl');
    }

    /**
      * @group system
      */
    public function testPhpExtensions()
    {
	foreach ($this->_extensions as $ext) {
		$this->assertTrue(extension_loaded($ext), "$ext not loaded!");
	}
    }

    /**
      * @group system
      */
    public function testJavaShizzle()
    {
	$this->assertTrue(file_exists('/usr/bin/java'));
 	$this->assertTrue(file_exists('/usr/bin/node'));
    }
}
