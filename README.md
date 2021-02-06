Laravel 8 Topics Covered
------------------------

1.Enviornment Setup

2.Installation

3.Folder Structure

4.MVC & its Benifites

5.Route

6.Blade

7.Controller & GET Url Request

8.Middleware

9.Url to Route

10.Create Database & Configration

11.





UseFull Commends
----------------
Creating Controller
-------------------
php artisan make:controller ContactController

Creating Middleware
-------------------
php artisan make:middleware CheckAge

Authentication install (JETSRTEAM)
----------------------------------
composer require laravel/jetstream

php artisan jetstream:install livewire

Change <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script src="{{ mix('js/app.js') }}" defer></script>

        into

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>


Migration & Create a table in to database
-----------------------------------------
php artisan migrate

npm install && npm run dev






