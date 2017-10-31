<?php

$setting = array_merge_recursive(
include "controller.config.php",
include "doctrine.config.php",
include "navigation.config.php",
include "plugins.config.php",
include "route.config.php",
include "view-helper.config.php",
include "view.config.php",
include "zfm-datagrid.country.config.php",
include "zfm-datagrid.education-state.config.php",
include "zfm-datagrid.education.config.php",
include "zfm-datagrid.job.config.php",
include "zfm-datagrid.skill-category.config.php",
include "zfm-datagrid.skill.config.php",
include "zfm-datagrid.soft-skill-category.config.php",
include "zfm-datagrid.soft-skill.config.php"
);

return $setting;
