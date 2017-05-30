<?php

namespace PI;

/**
 * Module
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class Module
{

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }


}

