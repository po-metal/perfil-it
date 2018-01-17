<?php

return array(
    'controllers' => array(
        'factories' => array(
            'Df\\Controller\\EncuestasControllerController' => \Df\Factory\Controller\EncuestasControllerControllerFactory::class,
            'Df\\Controller\\ExamenesControllerController' => \Df\Factory\Controller\ExamenesControllerControllerFactory::class,
            \Df\Controller\EncuestasController::class => \Df\Factory\Controller\EncuestasControllerFactory::class,
            \Df\Controller\ExamenesController::class => \Df\Factory\Controller\ExamenesControllerFactory::class,
        ),
    ),
);