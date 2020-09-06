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
        $this->mergeConfigFrom(
            __DIR__ . '/config/queue.php',
            'queue'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/app/Jobs' => base_path('/app/Jobs'),
        ]);
    }
}
