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
            \PI\Controller\CvExperienceController::class => \PI\Factory\Controller\CvExperienceControllerFactory::class,
            \PI\Controller\JobController::class => \PI\Factory\Controller\JobControllerFactory::class,
            \PI\Controller\SoftSkillController::class => \PI\Factory\Controller\SoftSkillControllerFactory::class,
            \PI\Controller\SoftSkillCategoryController::class => \PI\Factory\Controller\SoftSkillCategoryControllerFactory::class,
            \PI\Controller\CvVueController::class => \PI\Factory\Controller\CvVueControllerFactory::class,
            \PI\Controller\CountriesController::class => \PI\Factory\Controller\CountriesControllerFactory::class,
            \PI\Controller\CountryController::class => \PI\Factory\Controller\CountryControllerFactory::class,
            \PI\Controller\CountryApiController::class => \PI\Factory\Controller\CountryApiControllerFactory::class,
            \PI\Controller\JobAcController::class => \PI\Factory\Controller\JobAcControllerFactory::class,
            \PI\Controller\CompanyController::class => \PI\Factory\Controller\CompanyControllerFactory::class,
            \PI\Controller\UserCompanyController::class => \PI\Factory\Controller\UserCompanyControllerFactory::class,
        ),
    ),
);