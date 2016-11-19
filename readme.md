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
3. In the mail section, you can supply a mail driver. Set `MAIL_DRIVER=LOG` if you don't have one set up.

## Project Setup
1. Clone repo
2. From within the repo, run `composer update` and `composer install`
3. Run `php artisan key:generate`
4. Run `php artisan migrate`
5. Run `php artisan db:seed` (see \#2 in '.env' above)
6. Run `php artisan serve`

Visit localhost:8000 (or the port you specified)

## Afterwords
### Some helpful tips:
* `php artisan migrate:refresh` will drop all the tables and re-migrate them. Can be very helpful if you'd like to change a column in the database
* By default, `php artisan serve` will serve to port `8000`. When serving, you can say `php artisan serve --port=MY_PORT` and specify a different port

### Issues
If you find any issues, open a GitHub issue, or email me at mbcdb.help@gmail.com.

## Contributing

Devs: [SelectiveAlso (Creator)](https://github.com/SelectiveAlso), [Borgdude](https://github.com/Borgdude), [adaptiman](https://github.com/adaptiman) (for all the verbal help).

## License
The MIT License (MIT)
Copyright (c) 2016 Luke Sweeney

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
