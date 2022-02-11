<?php

declare(strict_types=1);

namespace VeronQ\WordpressYAML\Lib;

use VeronQ\WordpressYAML\Traits\DataGroupTrait;
use VeronQ\WordpressYAML\Traits\DefaultArgsTrait;

/**
 * Class Size
 * @package VeronQ\WordpressYAML
 */
class Size
{
  use DefaultArgsTrait;
  use DataGroupTrait;

  const FN_BASE_ARGS = [
    'width' => 0,
    'height' => 0,
    'crop' => false,
  ];

  /**
   * Size constructor.
   *
   * @param string|array $filename
   * @param int $priority
   * @param array $defaultArgs
   */
  public function __construct($filename, int $priority, array $defaultArgs = [])
  {
    $this->getDataYAML($filename);
    $this->setDefaultArgs(self::FN_BASE_ARGS, $defaultArgs);

    add_action('after_setup_theme', [$this, 'registerImageSizes'], $priority);
    add_filter('image_size_names_choose', [$this, 'filterImageNames'], $priority);
  }

  /**
   * Register new image sizes.
   */
  public function registerImageSizes(): void
  {
    foreach ($this->data as $args) {
      [
        'name' => $name,
        'width' => $width,
        'height' => $height,
        'crop' => $crop,
      ] = $this->getArgs($args);
      add_image_size($name, $width, $height, $crop);
    }
  }

  /**
   * Filters the names and labels of the default image sizes.
   *
   * @param array $size_names
   *
   * @return array
   */
  public function filterImageNames(array $size_names): array
  {
    foreach ($this->data as $key => $value) {
      $size_names[$key] = $key;
    }

    return $size_names;
  }
}
