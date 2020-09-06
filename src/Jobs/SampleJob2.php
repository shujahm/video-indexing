<?php

namespace FireQueue\AmazonSqsJob\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use ShiftOneLabs\LaravelSqsFifoQueue\Bus\SqsFifoQueueable;

class SampleJob2 implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, SqsFifoQueueable;

    // The maximum attempts of this job
    public $tries = 5;

    /**
     * the following serves as an array of video ids
     */
    protected $videoIds = [];
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($videoIdsArray)
    {
        // all the initializtion can happen here
        Log::info("intiating SampleJob2 Job");
        $this->videoIds = $videoIdsArray;
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
        Log::info("Size of Video IDs Array:" . count($this->videoIds));
    }
}
