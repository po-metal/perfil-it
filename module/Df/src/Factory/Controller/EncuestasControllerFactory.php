<?php

namespace Df\Factory\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * EncuestasControllerFactory
 *
 *
 *
 * @author
 * @license
 * @link
 */
class EncuestasControllerFactory implements FactoryInterface
{

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        return new \Df\Controller\EncuestasController();
    }


}

