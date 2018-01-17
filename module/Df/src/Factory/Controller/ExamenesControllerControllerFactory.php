<?php

namespace Df\Factory\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * ExamenesControllerControllerFactory
 *
 *
 *
 * @author
 * @license
 * @link
 */
class ExamenesControllerControllerFactory implements FactoryInterface
{

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        return new \Df\Controller\ExamenesControllerController();
    }


}

