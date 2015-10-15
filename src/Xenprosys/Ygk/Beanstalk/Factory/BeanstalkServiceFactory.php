<?php
namespace Xenprosys\Ygk\Beanstalk\Factory;

use Xenprosys\Ygk\Factory\AbstractServiceFactory;
use Xenprosys\Ygk\Beanstalk\Service\BeanstalkService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class BeanstalkServiceFactory extends AbstractServiceFactory implements FactoryInterface
{
    protected $configuration_key = 'beanstalk-adapter';

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        parent::createService($serviceLocator);

        $beanstalk = $serviceLocator->get('Xenprosys\Ygk\Beanstalk\Client\BeanstalkClient');
        $options = isset($this->config[$this->configuration_key]) ? $this->config[$this->configuration_key] : array();

        return new BeanstalkService($beanstalk, $options);

    }
}
