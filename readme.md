# Notice: Material was merged with master. Use master now.

# [r/badcode](http://reddit.com/r/badcode)

# Installation

## Required programs
* php
* composer
* MySQL

## Database setup
1. Create a database in MySQL called `mbcdb`

2. Optional but reccomended: Create a user with permissions for only that database

3. Put the database name and credentials in `.env` (If `.env` doesn't exist, duplicate `.env.example` and rename it to `.env`)


## Project Setup
1. Clone repo
2. From within the repo, run `composer update` and `composer install`
3. Run `php artisan key:generate`
4. Run `php artisan migrate`
5. Run `php artisan db:seed`
6. Run `php artisan serve` (you may also specify a port to use, like this: `php artisan serve --port=8888`)

Visit Localhost:8000 (or the port you specified)

## Made with
----------------------------------------------------------------------------------------------------------------------------------------
# Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

Devs: Luke Sweeney
