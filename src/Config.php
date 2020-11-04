<?php

declare(strict_types=1);

namespace VeronQ\WordpressYAML;

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
      new Menu($filename);
    }
  }

  /**
   * @param string $filename
   */
  public static function editorColor(string $filename)
  {
    if (function_exists('wp')) {
      new EditorColor($filename);
    }
  }

  /**
   * @param string $filename
   * @param array $defaultArgs
   */
  public static function sidebar(string $filename, array $defaultArgs = [])
  {
    if (function_exists('wp')) {
      new Sidebar($filename, $defaultArgs);
    }
  }

  /**
   * @param string $filename
   * @param array $defaultArgs
   */
  public static function size(string $filename, array $defaultArgs = [])
  {
    if (function_exists('wp')) {
      new Size($filename, $defaultArgs);
    }
  }

  /**
   * @param string|array $filename
   * @param array $defaultArgs
   */
  public static function postType($filename, array $defaultArgs = [])
  {
    if (function_exists('wp')) {
      new PostType($filename, $defaultArgs);
    }
  }
}
