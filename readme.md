# Omaha Mentor for Kids

## Issues with the env file. 
Please pull down the code and add the .env file from another project of yours because github doesnt upload the .env files.

## Configure your mail drivers so that it can send a mail.
Add this in the .env file where it says mail_driver. remove those and add these.

| Key | Values |
|-----|--------|
|MAIL_DRIVER=|smtp| 
|MAIL_HOST=|smtp.gmail.com|
|MAIL_PORT=|587|
|MAIL_USERNAME=|your email|	
|MAIL_PASSWORD=|obdvkhyvliznipyn|
|MAIL_ENCRYPTION=|tls|

## Development Tools

### Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

#### Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

#### Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

#### Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

#### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

### PHP 7.0.4

### MYSQL

Please use the following when you configure your .env file for your development environment.

|Key|value|
|---|-----|
|DB_CONNECTION=|mysql|
|DB_HOST=|localhost|
|DB_PORT=|3306|
|DB_DATABASE=|omahamentors|
|DB_USERNAME=|root|
|DB_PASSWORD=||

### Heroku Cloud

### GitHub
