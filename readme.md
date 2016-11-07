# Notice: Material was merged with master. Use master now.

# [r/badcode](http://reddit.com/r/badcode)

# Installation

## Required programs
* php
* composer
* MySQL

## Database setup
1. Create a database in MySQL called `mbcdb`
2. Optional but recommended: Create a user with permissions for only that database. You will need to provide Laravel login information for MySQL

## .env

1. Put the database name and credentials in `.env` (If `.env` doesn't exist, duplicate `.env.example` and rename it to `.env`)
2. Make sure that `PRODUCTION=false`. Currently this only affects database seeders. If you run the seeders with `php artisan db:seed` and it doesn't add fake counselors, you need to change the `PRODUCTION` value in `.env`

## Project Setup
1. Clone repo
2. From within the repo, run `composer update` and `composer install`
3. Run `php artisan key:generate`
4. Run `php artisan migrate`
5. Run `php artisan db:seed` (see \#2 in '.env' above)
6. Run `php artisan serve`

## Afterwords
### Some helpful tips:
* `php artisan migrate:refresh` will drop all the tables and re-migrate them. Can be very helpful if you'd like to change a column in the database
* By default, `php artisan serve` will serve to port `8000`. When serving, you can say `php artisan serve --port=MY_PORT` and specify a different port

Visit localhost:8000 (or the port you specified)

## Contributing

Devs: [Luke Sweeney](https://github.com/SelectiveAlso), [Borgdude](https://github.com/Borgdude)
