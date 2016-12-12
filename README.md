# Openstreetmap Provider for OAuth 1.0 Client

This package provides Openstreetmap OAuth 1.0 support for the PHP League's [OAuth 1.0 Client](https://github.com/thephpleague/oauth1-client).

## Installation

To install, use composer:

```
composer require sabas/oauth1-openstreetmap
```

## Usage

Usage is the same as The League's OAuth client, using `sabas\OAuth1\Client\Server\Openstreetmap` as the provider.

```php
$server = new sabas\OAuth1\Client\Server\Openstreetmap(array(
    'identifier'   => 'your-identifier',
    'secret'       => 'your-secret',
    'callback_uri' => 'http://your-callback-uri/',
));
```
