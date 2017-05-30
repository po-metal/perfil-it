<?php

namespace PI\Factory\Controller\Plugin;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * CvFactory
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class CvFactory implements FactoryInterface
{

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {   
        $em = $container->get('doctrine.entitymanager.orm_default');
        return new \PI\Controller\Plugin\Cv($em);
    }


}

