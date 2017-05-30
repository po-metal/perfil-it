<?php

return array(
    'controller_plugins' => array(
        'factories' => array(
            \PI\Controller\Plugin\Cv::class => \PI\Factory\Controller\Plugin\CvFactory::class,
        ),
        'aliases' => array(
            'pICv' => \PI\Controller\Plugin\Cv::class,
        ),
    ),
);