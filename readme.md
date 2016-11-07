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

## Contributing

Devs: Luke Sweeney, [Borgdude](https://github.com/Borgdude)
