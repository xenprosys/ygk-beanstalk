<?php

namespace Xenprosys\Ygk\Beanstalk\Controller;

use Zend\Console\Request as ConsoleRequest;

class WorkerController extends AbstractActionController
{
    public function executeAction()
    {
        $request = $this->getRequest();
        if (!$request instanceof ConsoleRequest) {
            throw new \RuntimeException('You can not call this action from webspace');
        }

        $workerName = $this->getRequest()->getParam('workerid');
        $bs = $this->getServiceLocator()->get('Xenprosys\Ygk\Beanstalk\Service\BeanstalkService');

        $workers = $bs->getOption('workers');

        if (in_array($workerName, array_keys($workers)) && in_array(
            'Xenprosys\Wtgnrm\Worker\WorkerInterface',
            class_implements($worker[$workerName])
        )) {
            $worker = new $workers[$workerName];
            $sm = $this->getServiceLocator();

            $bs->add(
                $workerName,
                function ($job) use ($worker, $sm) {
                    $worker->execute($job, $sm);
                }
            );

            while ($bs->dispatch()) {
            }
        }
    }
}
