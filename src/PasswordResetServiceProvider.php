<?php

namespace PatrickRiemer\PasswordReset;

use Illuminate\Support\ServiceProvider;
use PatrickRiemer\PasswordReset\Console\UserSetPassword;

class PasswordResetServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                UserSetPassword::class,
            ]);
        }
    }
}
