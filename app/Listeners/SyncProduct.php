<?php

namespace App\Listeners;

use App\Events\ProductCreated;
use App\Events\ProductImported;
use App\Repository\SyncRepository;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

/**
 * Class SyncProduct
 *
 * @package App\Listeners
 */
class SyncProduct implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param ProductCreated|ProductImported $event
     * @return void
     */
    public function handle(ProductCreated $event)
    {

        Log::info('SyncProduct Listener ['.$event->product->title.']' );

        $sync_repo = new SyncRepository();
        $sync_repo->syncByProductId($event->product);
    }
}
