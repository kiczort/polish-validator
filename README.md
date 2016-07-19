PHP library with Polish validators 
==================================

[![License](https://img.shields.io/packagist/l/Kiczort/PolishValidator.svg)](https://packagist.org/packages/kiczort/polish-validator)
[![Version](https://img.shields.io/packagist/v/Kiczort/PolishValidator.svg)](https://packagist.org/packages/kiczort/polish-validator)
[![Build status](https://travis-ci.org/kiczort/polish-validator.svg)](http://travis-ci.org/Kiczort/PolishValidator)
[![Scrutinizer Quality Score](https://img.shields.io/scrutinizer/g/Kiczort/PolishValidator.svg)](https://scrutinizer-ci.com/g/Kiczort/PolishValidator/)

This is PHP library with validators for Polish identification numbers like: PESEL, NIP, REGON.
 
 
# Installation

The recommended way to install this library is
[Composer](http://getcomposer.org).

```bash
# Install Composer
curl -sS https://getcomposer.org/installer | php
```

Next, run the Composer command to install the latest stable version:

```bash
php composer.phar require kiczort/polish-validator
```

# Documentation

## Example of use PeselValidator:

There are PESEL numbers with errors in real word, so in case of this validator checksum checking is only for strict mode.
In case of none strict mode it checks length, used chars and correctness of date of birth.

```php
...
use Kiczort\PolishValidator\PeselValidator;
...
$validator = new PeselValidator();
if ($validator->isValid('123456789')) { // none strict mode
...
}
...
if ($validator->isValid('123456789', array('strict' => true))) { // with strict mode
...
}
...
```

## Example of use NipValidator:

```php
...
use Kiczort\PolishValidator\NipValidator;
...
$validator = new NipValidator();
if ($validator->isValid('123456789')) {
...
}
...
```

## Example of use RegonValidator:

```php
...
use Kiczort\PolishValidator\RegonValidator;
...
$validator = new RegonValidator();
if ($validator->isValid('123456789')) {
...
}
...
```

# Bug tracking

[GitHub issues](https://github.com/kiczort/polish-validator/issues).
If you have found bug, please create an issue.


# MIT License

License can be found [here](https://github.com/kiczort/polish-validator/blob/master/LICENSE).

