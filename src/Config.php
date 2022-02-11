<?php

declare(strict_types=1);

namespace VeronQ\WordpressYAML;

use VeronQ\WordpressYAML\Lib;

/**
 * Class Config
 * @package VeronQ\WordpressYAML
 */
class Config
{
  /**
   * @param string $filename
   * @param int $priority
   *
   * @return void
   */
  public static function menu(string $filename, int $priority = PHP_INT_MAX)
  {
    if (function_exists('wp')) {
      new Lib\Menu($filename, $priority);
    }
  }

  /**
   * @param string $filename
   * @param int $priority
   *
   * @return void
   */
  public static function editorColor(string $filename, int $priority = PHP_INT_MAX)
  {
    if (function_exists('wp')) {
      new Lib\EditorColor($filename, $priority);
    }
  }

  /**
   * @param string $filename
   * @param int $priority
   * @param array $defaultArgs
   *
   * @return void
   */
  public static function sidebar(string $filename, int $priority = PHP_INT_MAX, array $defaultArgs = [])
  {
    if (function_exists('wp')) {
      new Lib\Sidebar($filename, $priority, $defaultArgs);
    }
  }

  /**
   * @param string $filename
   * @param int $priority
   * @param array $defaultArgs
   *
   * @return void
   */
  public static function size(string $filename, int $priority = PHP_INT_MAX, array $defaultArgs = [])
  {
    if (function_exists('wp')) {
      new Lib\Size($filename, $priority, $defaultArgs);
    }
  }

  /**
   * @param $filename
   * @param int $priority
   * @param array $defaultArgs
   *
   * @return void
   */
  public static function postType($filename, int $priority = PHP_INT_MAX, array $defaultArgs = [])
  {
    if (function_exists('wp')) {
      new Lib\PostType($filename, $priority, $defaultArgs);
    }
  }
}
