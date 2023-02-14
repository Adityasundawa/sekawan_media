
This application built using laravel 9.

Language: markdown

Path: README.md

---

# Getting started

## Credentials

Route Login

http://127.0.0.1:8000/login

Admin

- Username: admin@gmail.com
- Password: admin@gmail.com

Pegawai

- Username: pegawai@gmail.com
- Password:pegawai@gmail.com


## Requirement

-   Laravel (Composer)
-   PHP 8+
-   Node
-   MySQL

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Alternative installation is possible without local dependencies relying on [Docker](#docker).

Clone the repository

    git clone https://github.com/Adityasundawa/sekawan_media

Switch to the repo folder

    cd sekawan_media

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Install frontend dependecies

    npm install

Generate scaffolding template

    npm run dev

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone https://github.com/Adityasundawa/sekawan_media
    cd sekawan_media
    composer install
    cp .env.example .env
    php artisan key:generate
    npm install
    npm run dev
    php artisan serve

**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Database schema ERD

schema can be viewed in this link:

https://dbdocs.io/shevaathalla/nickel_drive

## Folders

-   `app/Models` - Contains all the Eloquent models
-   `app/Http/Middleware` - Contains the middleware
-   `app/Http/Controllers` - Contains the controllers
-   `config` - Contains all the application configuration files
-   `database/factories` - Contains the model factory for all the models
-   `database/migrations` - Contains all the database migrations
-   `database/seeds` - Contains the database seeder
-   `routes` - Contains all the api routes defined in api.php file

## Environment variables

-   `.env` - Environment variables can be set in this file

**_Note_** : You can quickly set the database information and other variables in this file and have the application fully working.


Dont Forget Export sekawan_media.sql On Your database
