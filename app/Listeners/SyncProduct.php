<?php

namespace App\Listeners;

use App\Events\ProductImported;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SyncProduct
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
     * @param ProductImported $event
     * @return void
     */
    public function handle(ProductImported $event)
    {
        //
    }
}
