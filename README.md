## Laravel Exception Notify  (Current: Support only TELEGRAM) ([by k_tith](https://k-tith.web.app))

[![Latest Stable Version](https://poser.pugx.org/rappasoft/laravel-boilerplate/v/stable)](https://packagist.org/packages/rappasoft/laravel-boilerplate)
[![Latest Unstable Version](https://poser.pugx.org/rappasoft/laravel-boilerplate/v/unstable)](https://packagist.org/packages/rappasoft/laravel-boilerplate) 
<br/>
[![StyleCI](https://styleci.io/repos/30171828/shield?style=plastic)](https://github.styleci.io/repos/30171828)
![Tests](https://github.com/rappasoft/laravel-boilerplate/workflows/Tests/badge.svg?branch=master)
<br/>
![GitHub contributors](https://img.shields.io/github/contributors/rappasoft/laravel-boilerplate.svg)
![GitHub stars](https://img.shields.io/github/stars/rappasoft/laravel-boilerplate.svg?style=social)

### DEMO 

![Demo Page](https://i.imgur.com/zAgKgUd.jpeg)

### Enjoying this tool? [Buy me a beer 🍺](https://k-tith.web.app)

## Installation

### Library

```bash
git clone https://github.com/ktith/laravel-exception-notifier.git
```

### Composer

[Install PHP Composer](https://getcomposer.org/doc/00-intro.md)

```bash
composer require ktith/laravel-exception-notifier
```

## Usage

Simple used register event

__Note:__ For laravel 11 you can register event in bootstrap/app.php

### Basic usage Laravel 11 

```php
<?php

use Ktith\Laravelexceptionnotifier\Events\ExceptionNotifier;

// for Laravel 11 bootstrap/app.php
// notify to notifire laravel 11
$exceptions->render(function (Exception $e){
    event(new ExceptionNotifier($e));
});

```


### Basic usage for Laravel 10, 9, 8, 7..

__Note:__ For all these version you can register event in Handler.php

```php
<?php

use Ktith\Laravelexceptionnotifier\Events\ExceptionNotifier;


// notify to notifire by regiser
public function render($request, Throwable $exception) {
    event(new ExceptionNotifier($e));
    return parent::render($request, $exception);
}

```

### Issues

If you come across any issues please [report them here](https://github.com/ktith/laravel-exception-notifier/issues).

### Contributing

Thank you for considering contributing to the this project! Please feel free to make any pull requests, or e-mail me a feature request you would like to see in the future to Tith khem at titkhem167@gmail.com.

### Security Vulnerabilities

If you discover a security vulnerability within this project, please send an e-mail to Tith khem at titkhem167@gmail.com, or create a pull request if possible. All security vulnerabilities will be promptly addressed.

### License

MIT: [http://anthony.mit-license.org](http://anthony.mit-license.org)
