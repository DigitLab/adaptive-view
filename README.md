# Adaptive View

[![StyleCI](https://styleci.io/repos/53059276/shield?style=flat)](https://styleci.io/repos/7548986)
[![Build Status](https://travis-ci.org/DigitLab/adaptive-view.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/digitlab/adaptive-view/downloads)](https://packagist.org/packages/digitlab/adaptive-view)
[![Latest Stable Version](https://poser.pugx.org/digitlab/adaptive-view/v/stable)](https://packagist.org/packages/digitlab/adaptive-view)
[![License](https://poser.pugx.org/digitlab/adaptive-view/license)](https://packagist.org/packages/digitlab/adaptive-view)

An adaptive view extension for Laravel.

## Installation

Install using composer:

```bash
composer require digitlab/adaptive-view
```

Follow the instructions in setting up [Agent](https://github.com/jenssegers/agent).

Add the service provider in app/config/app.php:

```php
DigitLab\AdaptiveView\AdaptiveViewServiceProvider::class,
```

## Usage

You can create a mobile view with the ```.mobile.blade.php``` extension. Similarly you can create tablet views with
the ```.tablet.blade.php``` extension. Mobile and tablet views will fallback to normal views if they do not exist.

## License

Adaptive View is licensed under [The MIT License (MIT)](LICENSE).
