<?php
namespace YgkBeanstalkTest;

use PHPUnit_Framework_TestCase;
use Xenprosys\Ygk\Module;

/**
 * @covers Xenprosys\Ygk\Beanstalk\Module
 */
class ModuleTest extends PHPUnit_Framework_TestCase
{
    public function testGetAutoloaderConfig()
    {
        $module = new Module();
        // just testing ZF specification requirements
        $this->assertInternalType('array', $module->getAutoloaderConfig());
    }

    public function testGetConfig()
    {
        $module = new Module();
        // just testing ZF specification requirements
        $this->assertInternalType('array', $module->getConfig());
    }
}
