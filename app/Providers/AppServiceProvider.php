<?php

namespace App\Providers;

use App\Billing\BankPaymentGateway;
use App\Billing\CreditPaymentGateway;
use App\Billing\PaymentGatewayContract;
use App\Channel;
use App\Http\View\Composers\ChannelsComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use function foo\func;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PaymentGatewayContract::class, function ($app){
//            return new BankPaymentGateway('USD');
            return new CreditPaymentGateway('USD');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        option 1
//        View::share('channels', Channel::orderBy('name')->get());

//        option 2
//        View::composer(['post.create','channel.index'],function ($view){
//            $view->with('channels', Channel::orderBy('name')->get());
//        });

//        option 3

        View::composer('partials.channels.*', ChannelsComposer::class);

    }
}
