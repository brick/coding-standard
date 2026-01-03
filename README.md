# Brick Coding Standard

<img src="https://raw.githubusercontent.com/brick/brick/master/logo.png" alt="" align="left" height="64">

Coding standard for Brick libraries.

[![Build Status](https://github.com/brick/coding-standard/workflows/Test/badge.svg)](https://github.com/brick/coding-standard/actions)
[![Latest Stable Version](https://poser.pugx.org/brick/coding-standard/v/stable)](https://packagist.org/packages/brick/coding-standard)
[![Total Downloads](https://poser.pugx.org/brick/coding-standard/downloads)](https://packagist.org/packages/brick/coding-standard)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](http://opensource.org/licenses/MIT)

## Overview

This coding standard is used in Brick libraries, but can also be used in your own projects.

It is based on [PSR-12](https://www.php-fig.org/psr/psr-12/) and uses
[Easy Coding Standard](https://github.com/easy-coding-standard/easy-coding-standard) with
rules cherry-picked from [PHP-CS-Fixer](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer),
[PHP_CodeSniffer](http://github.com/squizlabs/PHP_CodeSniffer), and the
[Slevomat coding standard](https://github.com/slevomat/coding-standard).

## Release process

This project is released with sequential version numbers: `v1`, `v2`, etc.

Each new version should be considered as breaking, as it may update dependency versions, add new rules, or modify
existing ones.

## Usage

### Use locally

To use `brick/coding-standard` locally, install it with Composer:

```bash
composer require --dev brick/coding-standard
```

Then create an `ecs.php` file in the root of your project with the following content:

```php
<?php

declare(strict_types=1);

use Symplify\EasyCodingStandard\Config\ECSConfig;

return static function (ECSConfig $ecsConfig): void {
    $ecsConfig->import(__DIR__ . '/vendor/brick/coding-standard/ecs.php');

    $ecsConfig->paths(
        [
            __DIR__ . '/src',
            __DIR__ . '/tests',
            __FILE__,
        ],
    );
};
```

You can then run Easy Coding Standard with:

```bash
vendor/bin/ecs
```

or, to fix coding standard violations automatically:

```bash
vendor/bin/ecs --fix
```

If you wish to avoid conflicts with your project dependencies, you may also install ECS in a `tools` directory with its
own `composer.json` instead. Here is how your directory may look like:

```
tools/
└── ecs/
    ├── composer.json
    ├── composer.lock
    └── ecs.php
    └── vendor/
        └── ...
```

### Use in GitHub Actions

You can integrate `brick/coding-standard` in your GitHub Actions workflow as follows:

```yaml
name: Coding Standard

on:
  pull_request:
  push:

jobs:
  coding-standard:
    name: Coding Standard
    uses: brick/coding-standard/.github/workflows/coding-standard.yml@v1
```

By default, this workflow will run on PHP 8.2. You can change the PHP version by adding:

```yaml
    with:
      php-version: 8.5
```

Only versions >= `8.2` are supported.

Other options available are:

- `composer-options`
- `working-directory`
- `config-file`
