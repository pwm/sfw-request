# SFW Request

A simple Request object for JSON APIs.

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
