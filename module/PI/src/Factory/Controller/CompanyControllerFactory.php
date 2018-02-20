<?php

namespace PI\Factory\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * CompanyControllerFactory
 *
 *
 *
 * @author Cristian Incarnato
 * @license -
 * @link -
 */
class CompanyControllerFactory implements FactoryInterface
{

    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        /* @var $em \Doctrine\ORM\EntityManager */
        $em = $container->get("doctrine.entitymanager.orm_default");
        /* @var $grid \ZfMetal\Datagrid\Grid */
        $grid = $container->build("zf-metal-datagrid", ["customKey" => "pi-entity-company"]);
        return new \PI\Controller\CompanyController($em,$grid);
    }


}

