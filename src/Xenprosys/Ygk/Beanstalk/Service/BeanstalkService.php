<?php
namespace Xenprosys\Ygk\Beanstalk\Service;
use Xenprosys\Ygk\Service as Ygk;

class BeanstalkService extends Ygk\AbstractService {
    protected $instance = null;

    public function __construct($instance, $options) {
        $this->setOptions($options);
        $this->instance = $instance;
    }

    public function dispatch() {
        foreach ($this->jobs as $job) {
            $this->instance
                  ->useTube($job->getId())
                  ->put(json_encode($job->serialize()));
        }
    }
}
