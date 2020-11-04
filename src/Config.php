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
  public static int $priority = PHP_INT_MAX;

  /**
   * @param string $filename
   */
  public static function menu(string $filename)
  {
    if (function_exists('wp')) {
      new Lib\Menu($filename);
    }
  }

  /**
   * @param string $filename
   */
  public static function editorColor(string $filename)
  {
    if (function_exists('wp')) {
      new Lib\EditorColor($filename);
    }
  }

  /**
   * @param string $filename
   * @param array $defaultArgs
   */
  public static function sidebar(string $filename, array $defaultArgs = [])
  {
    if (function_exists('wp')) {
      new Lib\Sidebar($filename, $defaultArgs);
    }
  }

  /**
   * @param string $filename
   * @param array $defaultArgs
   */
  public static function size(string $filename, array $defaultArgs = [])
  {
    if (function_exists('wp')) {
      new Lib\Size($filename, $defaultArgs);
    }
  }

  /**
   * @param string|array $filename
   * @param array $defaultArgs
   */
  public static function postType($filename, array $defaultArgs = [])
  {
    if (function_exists('wp')) {
      new Lib\PostType($filename, $defaultArgs);
    }
  }
}
