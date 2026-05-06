<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
class AppServiceProvider extends ServiceProvider
{
    /**
     * RegisterController any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            // separamos la url del front, para reconstruirla
            $nuevaUrl = parse_url($url);
            $path = $nuevaUrl['path'];
            $query = $nuevaUrl['query'];

            $frontUrl = env('FRONT_URL', 'http://localhost:5173').$path.'?'.$query;
            return (new MailMessage)
                ->subject('Verifica tu correo')
                ->line('Haz clic en el botón para verificar tu correo')
                ->action('Verify Email Address', $frontUrl);
        });
    }
}
