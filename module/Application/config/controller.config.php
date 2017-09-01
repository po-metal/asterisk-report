<?php

namespace Application;

use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'factories' => [
        \Application\Controller\IndexController::class => InvokableFactory::class,
    ],
];

