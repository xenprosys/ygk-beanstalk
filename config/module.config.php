<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Xenprosys\Ygk\Beanstalk\Controller\Worker' => 'Xenprosys\Ygk\Beanstalk\Controller\WorkerController'
        )
    ),
    'console' => array(
        'router' => array(
            'routes' => array(
                'gearman_worker_route' => array(
                    'options' => array(
                        'route' => 'beanstalk worker execute <workerid>',
                        'defaults' => array(
                            '__NAMESPACE__' => 'Xenprosys\Ygk\Beanstalk\Controller',
                            'controller' => 'Worker',
                            'action' => 'execute'
                        )
                    )
                )
            )
        )
    )
);
