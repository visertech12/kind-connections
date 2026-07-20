<?php

namespace App\Providers;

use App\Constants\Status;
use App\Models\AdminNotification;
use App\Models\Deposit;
use App\Models\Frontend;
use App\Models\Language;
use App\Models\Ptc;
use App\Models\SupportTicket;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        try {
            $general = gs();
            $viewShare['general'] = $general;
            $activeTemplate = activeTemplate();

            $viewShare['activeTemplate'] = $activeTemplate;
            $viewShare['activeTemplateTrue'] = activeTemplate(true);
            $viewShare['language'] = collect([]);
            $viewShare['categories'] = \App\Models\Category::where('status', 1)->get();
            $viewShare['emptyMessage'] = 'Data not found';
            view()->share($viewShare);

            view()->composer('partials.seo', function ($view) {
                $seo = Frontend::where('data_keys', 'seo.data')->first();
                $view->with([
                    'seo' => $seo ? $seo->data_values : $seo,
                ]);
            });

            if ($general->force_ssl) {
                // \URL::forceScheme('https');
            }

            if (isset($general->google_client_id) && $general->google_client_id != '') {
                config([
                    'services.google.client_id' => $general->google_client_id,
                    'services.google.client_secret' => $general->google_client_secret,
                    'services.google.redirect' => url('social-login/callback/google'),
                ]);
            }
        } catch (\RuntimeException $e) {
            // Facade root not set — skip view sharing during CLI/migration bootstrap
        }

        Paginator::useBootstrapFour();
    }
}
