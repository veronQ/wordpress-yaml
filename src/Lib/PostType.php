<?php

declare(strict_types=1);

namespace VeronQ\WordpressYAML\Lib;

use VeronQ\WordpressYAML\Traits\DataGroupTrait;
use VeronQ\WordpressYAML\Traits\DefaultArgsTrait;

/**
 * Class PostType
 * @package VeronQ\WordpressYAML
 */
class PostType
{
  use DefaultArgsTrait;
  use DataGroupTrait;

  /**
   * PostType constructor.
   *
   * @param string|array $filename
   * @param int $priority
   * @param array $defaultArgs
   */
  public function __construct($filename, int $priority, array $defaultArgs = [])
  {
    $this->getDataYAML($filename);
    $this->setDefaultArgs($defaultArgs);

    add_action('init', [$this, 'registerPostTypes'], $priority);
  }

  /**
   * Register all Post Types.
   */
  public function registerPostTypes(): void
  {
    foreach ($this->data as $key => $value) {
      register_post_type($key, $this->getArgs($value));
    }
  }
}
