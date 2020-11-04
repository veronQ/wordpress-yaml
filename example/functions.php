<?php

use veronq\wordpressYAML\Config;

$RESOURCES_PATH = __DIR__.'/resources/';

Config::menu($RESOURCES_PATH.'/menu.yaml');

Config::editorColor($RESOURCES_PATH.'/editor-color.yaml');

Config::size($RESOURCES_PATH.'/size.yaml');

Config::postType(
  [
    $RESOURCES_PATH.'/post-type/event.yaml',
    $RESOURCES_PATH.'/post-type/vehicle.yaml',
  ]
);

Config::sidebar(
  $RESOURCES_PATH.'sidebar.yaml',
  [
    'description' => __('Add new widgets.', 'gpc'),
  ]
);
