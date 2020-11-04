<?php

declare(strict_types=1);

namespace VeronQ\WordpressYAML\Lib;

use VeronQ\WordpressYAML\Traits\DataGroupTrait;
use VeronQ\WordpressYAML\Traits\DefaultArgsTrait;
use VeronQ\WordPressYAML\Config;

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
   * @param array $defaultArgs
   */
  public function __construct($filename, array $defaultArgs)
  {
    $this->getDataYAML($filename);
    $this->setDefaultArgs($defaultArgs);

    add_action('init', [$this, 'registerPostTypes']);
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
