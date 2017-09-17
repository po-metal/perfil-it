<?php

namespace PI\Factory\Helper\View;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * SkillCategoriesFactory
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class SkillCategoriesFactory implements FactoryInterface
{

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
           $em = $container->get('doctrine.entitymanager.orm_default');
    
        return new \PI\Helper\View\SkillCategories($em);
    }


}

