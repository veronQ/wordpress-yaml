<?php

declare(strict_types=1);

namespace VeronQ\WordpressYAML\Traits;

/**
 * Trait DefaultArgsTrait
 * @package VeronQ\WordpressYAML\Traits
 */
trait DefaultArgsTrait
{
  protected array $defaultArgs;

  /**
   * @return array
   */
  public function getDefaultArgs(): array
  {
    return $this->defaultArgs;
  }

  /**
   * @param array ...$arrays
   */
  public function setDefaultArgs(array ...$arrays): void
  {
    $this->defaultArgs = array_replace_recursive(...$arrays);
  }

  /**
   * @param $args
   *
   * @return array
   */
  public function getArgs($args)
  {
    return array_replace_recursive($this->getDefaultArgs(), $args);
  }
}
