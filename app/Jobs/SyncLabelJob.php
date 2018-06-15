<?php

namespace App\Jobs;

use App\Label;
use App\Product;
use App\Repository\SyncRepository;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

/**
 * Class SyncLabelJob
 *
 * @package App\Jobs
 */
class SyncLabelJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $label;

    /**
     * Create a new job instance.
     *
     * @param Label $label
     */
    public function __construct(Label $label)
    {
        $this->label  = $label;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $sync_repo = new SyncRepository();
        $sync_repo->syncByLabelId($this->label);


    }
}
