# SFW Request

[![Build Status](https://travis-ci.org/pwm/sfw-request.svg?branch=master)](https://travis-ci.org/pwm/sfw-request)
[![codecov](https://codecov.io/gh/pwm/sfw-request/branch/master/graph/badge.svg)](https://codecov.io/gh/pwm/sfw-request)
[![Maintainability](https://api.codeclimate.com/v1/badges/0a7d27ee12f89ed10dce/maintainability)](https://codeclimate.com/github/pwm/sfw-request/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/0a7d27ee12f89ed10dce/test_coverage)](https://codeclimate.com/github/pwm/sfw-request/test_coverage)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

A simple Request object for JSON APIs.

## Table of Contents

* [Requirements](#requirements)
* [Installation](#installation)
* [Usage](#usage)
* [How it works](#how-it-works)
* [Tests](#tests)
* [Changelog](#changelog)
* [Licence](#licence)

## Requirements

PHP 7.1+

## Installation

    composer require pwm/sfw-request

## Usage

```php
// Create request
$request = new Request(
    new DateTimeImmutable(),
    $_SERVER['CONTENT_TYPE'],
    $_SERVER['REQUEST_METHOD'],
    $_SERVER['REQUEST_URI'],
    $_GET,
    file_get_contents('php://input')
);

// Access properties
$time = $request->getTime();
$contentType = $request->getContentType();
$method = $request->getMethod();
$uri = $request->getUri();
$query = $request->getQuery();
$json = $request->getJson();
```

## How it works

TBD

## Tests

	$ vendor/bin/phpunit
	$ composer phpcs
	$ composer phpstan

## Changelog

[Click here](changelog.md)

## Licence

[MIT](LICENSE)
