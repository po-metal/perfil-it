<?php

return array(
    'controllers' => array(
        'factories' => array(
            \PI\Controller\CvController::class => \PI\Factory\Controller\CvControllerFactory::class,
            \PI\Controller\CvPictureController::class => \PI\Factory\Controller\CvPictureControllerFactory::class,
            \PI\Controller\CvPersonalInformationController::class => \PI\Factory\Controller\CvPersonalInformationControllerFactory::class,
            \PI\Controller\CvContactController::class => \PI\Factory\Controller\CvContactControllerFactory::class,
            \PI\Controller\CvSkillController::class => \PI\Factory\Controller\CvSkillControllerFactory::class,
            \PI\Controller\SkillCategoryController::class => \PI\Factory\Controller\SkillCategoryControllerFactory::class,
            \PI\Controller\SkillController::class => \PI\Factory\Controller\SkillControllerFactory::class,
            \PI\Controller\EductaionController::class => \PI\Factory\Controller\EductaionControllerFactory::class,
            \PI\Controller\EducationController::class => \PI\Factory\Controller\EducationControllerFactory::class,
            \PI\Controller\EducationStateController::class => \PI\Factory\Controller\EducationStateControllerFactory::class,
            \PI\Controller\CvEducationController::class => \PI\Factory\Controller\CvEducationControllerFactory::class,
        ),
    ),
);