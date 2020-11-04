# Wordpress YAML

> Fast WordPress configuration using YAML Syntax

[![MIT license](https://img.shields.io/badge/License-MIT-blue.svg)](https://github.com/veronq/wordpress-yaml/blob/main/LICENSE)
[![Latest Stable Version](https://poser.pugx.org/veronq/wordpress-yaml/v)](//packagist.org/packages/veronq/wordpress-yaml)

## Requirements

* `PHP` >= 7.4
* `WordPress` >= 5.0

## Installation

The recommended way to install **wordpress-yaml** is through [Composer](https://getcomposer.org/).

```sh
$ composer require veronq/wordpress-yaml
```

## Usage

See [example](https://github.com/veronq/wordpress-yaml/tree/main/example) folder for a complete usage demo.

*functions.php*
```php
use veronq\wordpressYAML\Config;

// Path of YAML file.
Config::menu(__DIR__.'/menu.yaml');

// Accept default config as second parameter.
Config::size(__DIR__.'/size.yaml', ['crop' => true]);
```

---

Register two new menus.

*menu.yaml*

```yaml
header_menu: "Menu 1"
footer_menu: "Menu 2"
```

---

Add two new custom image sizes.

*size.yaml*
```yaml
-
  name: "580x720"
  width: 580
  height: 720
  crop: false
-
  name: "720x360"
  width: 720
  height: 360
```

## API

### Config::$priority

Type:  `int`  
Default: `PHP_INT_MAX`

```php
Config::$priority = 100;
```

Set the priority value used for internal configuration hooks.

### Config::EditorColor($filename)

#### $filename (required)

Type: `string|array` 

Path of file(s) to be used for defining new color palette. 

---

```php
Config::editorColor('editor-color.yaml');
```

```yaml
-
  slug: "success"
  name: "Success"
  color: "#48bb78"
-
  slug: "error"
  name: "Error"
  color: "#f56565"
```

### Config::Menu($filename)

#### $filename (required)

Type: `string|array` 

Path of file(s) to be used for defining new menus. 

---

```php
Config::Menu('menu.yaml');
```

```yaml
header_menu: "Menu 1"
footer_menu: "Menu 2"
```

### Config::PostType($filename, ?$defaultArgs)

#### $filename (required)

Type: `string|array` 

Path of file(s) to be used for defining new post types. 

#### $defaultArgs

Type: `array`  
Default: `[]` 

Default [arguments](https://developer.wordpress.org/reference/functions/register_post_type/#parameters) to be used for every new post type.

---

```php
Config::PostType('post-type.yaml',
[
  'taxonomies' =>
    'category',
    'post_tag',
  ]
);
```

```yaml
event:
  labels:
    name: "Event"
  public: true
  show_in_rest: true
  supports:
    - "title"
    - "thumbnail"
    - "editor"
    - "excerpt"
```

### Config::Sidebar($filename, ?$defaultArgs)

#### $filename (required)

Type: `string|array` 

Path of file(s) to be used for defining new sidebars. 

#### $defaultArgs

Type: `array`  
Default: `[]` 

Default [arguments](https://developer.wordpress.org/reference/functions/register_sidebar/#parameters) to be used for every new sidebar.

---

```php
Config::Sidebar('sidebar.yaml');
```

```yaml
-
  id: "sidebar-default"
  name: "Default Sidebar"
-
  id: "sidebar-blog"
  name: "Sidebar for blogging"
```

### Config::Size($filename, ?$defaultArgs)

#### $filename (required)

Type: `string|array` 

Path of file(s) to be used for defining new image sizes. 

#### $defaultArgs

Type: `array`  
Default: `[]` 

Default [arguments](https://developer.wordpress.org/reference/functions/add_image_size/#parameters) to be used for every new image size.

---

```php
Config::Sidebar('sidebar.yaml');
```

```yaml
-
  name: "580x720"
  width: 580
  height: 720
  crop: false
```

## License

The Wordpress YAML library is open-sourced software licensed under the [MIT License](https://github.com/veronq/wordpress-yaml/blob/main/LICENSE).
