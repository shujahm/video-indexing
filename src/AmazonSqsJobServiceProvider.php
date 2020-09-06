<?php

namespace MovieEnglish\AmazonSqsJob;

use Illuminate\Support\ServiceProvider;

class AmazonSqsJobServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/Jobs' => base_path('/app/Jobs'),
        ]);
    }
}
