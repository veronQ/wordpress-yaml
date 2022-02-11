<?php

declare(strict_types=1);

namespace VeronQ\WordpressYAML\Lib;

use VeronQ\WordpressYAML\Traits\DataGroupTrait;

/**
 * Class EditorColor
 * @package VeronQ\WordpressYAML
 */
class EditorColor
{
  use DataGroupTrait;

  /**
   * EditorColor constructor.
   *
   * @param string|array $filename
   * @param int $priority
   */
  public function __construct($filename, int $priority = PHP_INT_MAX)
  {
    $this->getDataYAML($filename);

    add_action('after_setup_theme', [$this, 'registerColorPalette'], $priority);
  }

  /**
   * Register all Editor Colors.
   */
  public function registerColorPalette(): void
  {
    add_theme_support(
      'editor-color-palette',
      array_reduce(
        $this->data,
        static function ($carry, $item) {
          $carry[] = $item;

          return $carry;
        },
        []
      )
    );
  }
}
