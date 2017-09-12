<?php

namespace PI\Factory\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * SkillCategoryControllerFactory
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class SkillCategoryControllerFactory implements FactoryInterface
{

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        /* @var $em \Doctrine\ORM\EntityManager */
        $em = $container->get("doctrine.entitymanager.orm_default");
        /* @var $grid \ZfMetal\Datagrid\Grid */
        $grid = $container->build("zf-metal-datagrid", ["customKey" => "pi-entity-skillcategory"]);
        return new \PI\Controller\SkillCategoryController($em,$grid);
    }


}

