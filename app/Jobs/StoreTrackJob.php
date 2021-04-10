<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StoreTrackJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $track;
    private $temp_name;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($track ,$temp_name)
    {
        $this->track = $track;
        $this->temp_name = $temp_name;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->track->storeAs('public/uploads/tracks', $this->temp_name);
    }
}
