# Broadcast progress events

[![Latest Version on Packagist](https://img.shields.io/packagist/v/denitsa-md/laravel-progress-status-broadcast.svg?style=flat-square)](https://packagist.org/packages/denitsa-md/laravel-progress-status-broadcast)
[![Build Status](https://img.shields.io/travis/denitsa-md/laravel-progress-status-broadcast/master.svg?style=flat-square)](https://travis-ci.org/denitsa-md/laravel-progress-status-broadcast)
![Packagist Downloads](https://img.shields.io/packagist/dm/denitsa-md/laravel-progress-status-broadcast?style=flat-square)

I needed some simple functionality to broadcast progress events (10%, 20% ... 100% complete) when a long-running action was happening in the app.

This is also my first published package on packagist :)

## Installation

You can install the package via composer:

```bash
composer require denitsa-md/laravel-progress-status-broadcast
```

## Usage

This is how I've used the package in our project, except I used it in relation to a chunked collection.

Import the facade `use DenitsaCm\ProgressStatusBroadcast\Facades\ProgressStatusBroadcast;`

``` php

$products = Product::all();

ProgressStatusBroadcast::broadcastOn(new PrivateChannel('some-channel'))  // Specify the channel
    ->broadcastAs('products.process')  // Specify the event name
    ->total($products->count());       // Set the total amount so progress can be calcualted

$products->each(function ($product, $key) {
    $product->doSomething();
    ProgressStatusBroadcast::progress($key + 1); // Give the current item count to the progress status. Here I give it a +1 since the $key is 0-based and I want the progress to start from 1.
});
```

This will send a `ProgressEvent` via your configured broadcast driver.

### Testing

Tests coming soon...

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email dmlechkova@gmail.com instead of using the issue tracker.

## Credits

- [Denitsa Mlechkova Damm](https://github.com/denitsa-cm)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).