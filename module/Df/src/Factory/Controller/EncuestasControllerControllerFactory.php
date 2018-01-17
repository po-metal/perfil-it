<?php

namespace Df\Factory\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * EncuestasControllerControllerFactory
 *
 *
 *
 * @author
 * @license
 * @link
 */
class EncuestasControllerControllerFactory implements FactoryInterface
{

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        return new \Df\Controller\EncuestasControllerController();
    }


}

