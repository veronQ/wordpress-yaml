<?php

declare(strict_types=1);

namespace VeronQ\WordpressYAML\Lib;

use VeronQ\WordpressYAML\Traits\DataGroupTrait;
use VeronQ\WordpressYAML\Traits\DefaultArgsTrait;

/**
 * Class Sidebar
 * @package VeronQ\WordpressYAML
 */
class Sidebar
{
  use DefaultArgsTrait;
  use DataGroupTrait;

  /**
   * Sidebar constructor.
   *
   * @param string|array $filename
   * @param array $defaultArgs
   */
  public function __construct($filename, array $defaultArgs = [])
  {
    $this->getDataYAML($filename);
    $this->setDefaultArgs($defaultArgs);

    add_action('widgets_init', [$this, 'registerSidebars'], Config::$priority);
  }

  /**
   * Register all Sidebars.
   */
  public function registerSidebars(): void
  {
    foreach ($this->data as $args) {
      register_sidebar($this->getArgs($args));
    }
  }
}
