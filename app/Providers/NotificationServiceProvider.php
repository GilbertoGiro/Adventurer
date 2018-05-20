<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class NotificationServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        /*
        |--------------------------------------------------------------------------
        | Composer de Notificações
        |--------------------------------------------------------------------------
        */
        View::composer('user::*', 'App\Composers\NotificationComposer');
        View::composer('admin::*', 'App\Composers\NotificationComposer');
    }
}