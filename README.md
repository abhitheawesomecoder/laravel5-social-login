# laravel5-social-login
Package to quickly add social login to laravel 5.2 Auth Scaffold

## Installation

Step 1 : Laravel 5.2 Auth Scafold

    php artisan make:auth
    

Step 2 : Install Composer dependency

    composer require abhitheawesomecoder/laravel5-social-login


Step 3 : Register the Service Provider

   Laravel\Socialite\SocialiteServiceProvider::class,
   
   Abhitheawesomecoder\Sociallogin\SocialloginServiceProvider::class

to providers array in *config/app.php*

Step 4 : Install views and migrations

run the following command: 'php artisan vendor:publish' to install migrations

Step 5 : Run Migration

php artisan migrate

## Usage

Go to link http://localhost/laravel/auth/facebook

where http://localhost/laravel/public/ is path to your laravel website


