# google_oauth_authz_php
A simplistic example of how to use the Google OAuth service for authentication, then implement your own authorization.

This is written using a combination of js and php.

## Getting started

Copy the following files:

```cp config.php_default config.php
cp js/config.js_default js/config.js```

Then modify them with your own settings.

Acquire the package via composer, using the [directions in their project](https://github.com/googleapis/google-api-php-client#composer).

`composer require google/apiclient:"^2.0"`

## Protecting a page

Add this to the top line of your php file:

`<?php require_once 'sso.php'; ?>`
