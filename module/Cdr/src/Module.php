<?php

namespace Cdr;

/**
 * Module
 *
 *
 *
 * @author Cristian Incarnato
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

