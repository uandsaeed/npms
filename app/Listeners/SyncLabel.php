<?php

namespace App\Listeners;

use App\Events\LabelCreated;
use App\Repository\SyncRepository;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

/**
 * Class SyncLabel
 *
 * @package App\Listeners
 */
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

        Log::info('SyncLabel Listener', $event->label->toArray());
        $syncRepo = new SyncRepository();

        $syncRepo->syncByLabelId($event->label);

//        $event->label->

    }
}
