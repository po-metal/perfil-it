<?php

return array(
    'controllers' => array(
        'factories' => array(
            \PI\Controller\CvController::class => \PI\Factory\Controller\CvControllerFactory::class,
            \PI\Controller\CvPictureController::class => \PI\Factory\Controller\CvPictureControllerFactory::class,
            \PI\Controller\CvPersonalInformationController::class => \PI\Factory\Controller\CvPersonalInformationControllerFactory::class,
            \PI\Controller\CvContactController::class => \PI\Factory\Controller\CvContactControllerFactory::class,
        ),
    ),
);