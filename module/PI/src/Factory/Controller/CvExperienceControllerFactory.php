<?php

namespace PI\Factory\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * CvExperienceControllerFactory
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class CvExperienceControllerFactory implements FactoryInterface
{

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        /* @var $em \Doctrine\ORM\EntityManager */
        $em = $container->get("doctrine.entitymanager.orm_default");
        $renderer = $container->get('ViewRenderer');

        return new \PI\Controller\CvExperienceController($em,$renderer);
    }


}

