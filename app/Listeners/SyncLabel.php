<?php

namespace App\Listeners;

use App\Events\LabelCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SyncLabel
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
     * @param LabelCreated|object $event
     * @return void
     */
    public function handle(LabelCreated $event)
    {
        //@todo sync labels

    }
}
