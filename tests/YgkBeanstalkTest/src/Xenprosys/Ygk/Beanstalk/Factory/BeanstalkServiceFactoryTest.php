<?php
namespace Xenprosys\Ygk\Beanstalk\Factory;

/**
 * Generated by PHPUnit_SkeletonGenerator
 */
class BeanstalkServiceFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var BeanstalkServiceFactory
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
       $servers = array('servers' =>
                        array('client' =>
                            array(
                               array('host' => '127.0.0.1', 1111)
                           )
                       )
                   );
       $beanstalk = array(
           'beanstalk-adapter' => $servers
       );
       $this->config = array('ygk' => $beanstalk);

       $this->object = new BeanstalkServiceFactory;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Xenprosys\Ygk\Beanstalk\Factory\BeanstalkServiceFactory::createService
     */
    public function testCreateService()
    {

        $sm = $this->getMockBuilder('Zend\ServiceManager\ServiceLocatorInterface', array('get', 'has'))
                    ->getMock();

        $beanstalkMock = $this->getMockBuilder('BeanstalkClient', array('addServers'))->getMock();
        $beanstalkMock->expects($this->any())
            ->method('addServers')
            ->will($this->returnValue(true));

        $map = array(
            array('Config', $this->config),
            array('Xenprosys\Ygk\Beanstalk\Client\BeanstalkClient', $beanstalkMock)
        );

        $sm->expects($this->any())
            ->method('get')
            ->will($this->returnValueMap($map));

        $obj = $this->object->createService($sm);

        $this->
            assertInstanceOf('Xenprosys\Ygk\Beanstalk\Service\BeanstalkService', $obj);

    }

    /**
     * @covers Xenprosys\Ygk\Beanstalk\Factory\BeanstalkServiceFactory::createService
     */
    public function testCreateServiceOptions()
    {

        $sm = $this->getMockBuilder('Zend\ServiceManager\ServiceLocatorInterface', array('get', 'has'))
                    ->getMock();

        $beanstalk = $this->getMockBuilder('BeanstalkClient', array('addServers'))->getMock();
        $beanstalk->expects($this->any())
            ->method('addServer')
            ->will($this->returnValue(true));

        $map = array(
            array('Config', $this->config),
            array('Xenprosys\Ygk\Beanstalk\Client\BeanstalkClient', $beanstalk)
        );

        $sm->expects($this->any())
            ->method('get')
            ->will($this->returnValueMap($map));

        $obj = $this->object->createService($sm);

        $this->assertEquals($this->config['ygk']['beanstalk-adapter']['servers'], $obj->servers);

    }
}
