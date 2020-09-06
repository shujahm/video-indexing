<?php

namespace FireQueue\AmazonSqsJob\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use ShiftOneLabs\LaravelSqsFifoQueue\Bus\SqsFifoQueueable;

class SampleJob1 implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, SqsFifoQueueable;

    // The maximum attempts of this job
    public $tries = 5;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        // all the initializtion can happen here
        Log::info("intiating SampleJob1 Job");
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // code for processing
        Log::info("processing SampleJob2 Job");
        SampleJob2::dispatch([12, 1212, 32, 43, 56, 7678]);
    }
}
