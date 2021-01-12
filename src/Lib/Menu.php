<?php

declare(strict_types=1);

namespace VeronQ\WordpressYAML\Lib;

use VeronQ\WordpressYAML\Traits\DataGroupTrait;

/**
 * Class Menu
 * @package VeronQ\WordpressYAML
 */
class Menu
{
  use DataGroupTrait;

  /**
   * Menu constructor.
   *
   * @param string|array $filename
   */
  public function __construct($filename)
  {
    $this->getDataYAML($filename);

    add_action('after_setup_theme', [$this, 'registerMenus'], PHP_INT_MAX);
  }

  /**
   * Register all Menus.
   */
  public function registerMenus(): void
  {
    register_nav_menus($this->data);
  }
}
