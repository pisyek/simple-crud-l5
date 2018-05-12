# Simple CRUD Laravel 5

Simple CRUD application with Laravel 5 (using repository pattern).

## Getting Started

I use MySQL for database, and Bootstrap as frontend template. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

Make sure your server meets the following requirements:
* PHP >= 7.1.3
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension
* Ctype PHP Extension
* JSON PHP Extension
* MySQL

Check Laravel documentation for more info: https://laravel.com/docs/5.6

Check MySQL documentation for more info: https://dev.mysql.com/doc/

## Deployment

Clone this repo into your machine

```text
git clone git@github.com:pisyek/simple-crud-l5.git
```

Run installation inside the project directory

```text
composer install
```

Create database in your MySQL and update the db setting in .env file

```text
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

Run the migration script

```text
php artisan migrate
```

## Using the App

You may register via the following url:

```text
http://<your-domain>/register
```
