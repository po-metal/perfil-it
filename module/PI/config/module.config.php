<?php

$setting = array_merge_recursive(
include "controller.config.php",
include "doctrine.config.php",
include "navigation.config.php",
include "plugins.config.php",
include "route.config.php",
include "view.config.php"
);

return $setting;
