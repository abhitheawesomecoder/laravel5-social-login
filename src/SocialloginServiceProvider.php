<?php

namespace Abhitheawesomecoder\Sociallogin;

use Illuminate\Support\ServiceProvider;

class SocialloginServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {     

         $this->publishes([
         __DIR__.'/migrations' =>  database_path('/migrations')
        ], 'migrations');		
       
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/routes.php';
        $this->app->make('Abhitheawesomecoder\Sociallogin\Controller\SocialloginController');
        
    }
}
