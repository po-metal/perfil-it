<?php

namespace PI\Factory\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * SkillControllerFactory
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class SkillControllerFactory implements FactoryInterface
{

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        /* @var $em \Doctrine\ORM\EntityManager */
        $em = $container->get("doctrine.entitymanager.orm_default");
        /* @var $grid \ZfMetal\Datagrid\Grid */
        $grid = $container->build("zf-metal-datagrid", ["customKey" => "pi-entity-skill"]);
        return new \PI\Controller\SkillController($em,$grid);
    }


}

