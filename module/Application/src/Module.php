<?php

namespace Application;

use Zend\ModuleManager\Feature\ConfigProviderInterface;


class Module implements ConfigProviderInterface {

    const VERSION = '3.0.2dev';

    public function getConfig() {
        return include __DIR__ . '/../config/module.config.php';
    }

}
