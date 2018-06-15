<?php

namespace App\Listeners;

use App\Events\ProductImported;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class SyncProducts
 *
 * @package App\Listeners
 */
class SyncProducts
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

    }
}
