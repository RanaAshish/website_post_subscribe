<?php

namespace App\Providers;

use App\Repositories\Post\PostInterface;
use App\Repositories\Post\PostRepository;
use App\Repositories\WebsiteSubscription\WebsiteSubscriptionInterface;
use App\Repositories\WebsiteSubscription\WebsiteSubscriptionRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(PostInterface::class,PostRepository::class);
        $this->app->bind(WebsiteSubscriptionInterface::class, WebsiteSubscriptionRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
