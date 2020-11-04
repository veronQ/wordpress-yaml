<?php

declare(strict_types=1);

namespace VeronQ\WordpressYAML\Traits;

use Symfony\Component\Yaml\Yaml;

/**
 * Trait DataGroupTrait
 * @package VeronQ\WordpressYAML\Traits
 */
trait DataGroupTrait
{
  protected array $data = [];

  /**
   * @param string|array $filename
   */
  public function getDataYAML($filename)
  {
    if (is_string($filename)) {
      $filename = [$filename];
    }
    foreach ($filename as $file) {
      $this->data = array_merge($this->data, Yaml::parseFile($file));
    }
  }
}
