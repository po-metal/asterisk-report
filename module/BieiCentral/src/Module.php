<?php

namespace BieiCentral;

/**
 * Module
 *
 *
 *
 * @author Cristian Icnarnato
 * @license BSD
 * @link -
 */
class Module
{

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }


}

