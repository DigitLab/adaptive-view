# Adaptive View

[![Latest Stable Version](http://img.shields.io/packagist/v/DigitLab/adaptive-view.svg)](https://packagist.org/packages/digitlab/adaptive-view) [![Total Downloads](http://img.shields.io/packagist/dm/DigitLab/adaptive-view.svg)](https://packagist.org/packages/digitlab/adaptive-view) [![Build Status](http://img.shields.io/travis/DigitLab/adaptive-view.svg)](https://travis-ci.org/DigitLab/adaptive-view)

An adaptive view extension for Laravel.

## Installation

```bash
composer require digitlab/adaptive-view
```

Follow the instructions in setting up [Agent](https://github.com/jenssegers/agent).

Replace the Laravel view service provider in `app/config/app.php`:

```php
// Illuminate\View\ViewServiceProvider::class,
DigitLab\AdaptiveView\AdaptiveViewServiceProvider::class,
```

## Usage

You can create a mobile view with the ```.mobile.blade.php``` extension. Similarly you can create tablet views with
the ```.tablet.blade.php``` extension. Mobile and tablet views will fallback to normal views if they do not exist.

## License

Adaptive View is licensed under [The MIT License (MIT)](LICENSE).
