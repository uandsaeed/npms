<?php

namespace App\Listeners;

use App\Events\LabelCreated;
use App\Repository\LabelRepository;
use App\Repository\SyncRepository;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

/**
 * Class SyncLabel
 *
 * @package App\Listeners
 */
class SyncLabel implements ShouldQueue
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

        Log::info('SyncLabel Listener ['.$event->label->title.']' );
        $sync_repo = new SyncRepository();

        $sync_repo->syncByLabelId($event->label);

        $this->repo->flushLabelListCache();


        Log::info('Label ['.$this->label->title . '] synced');

    }
}
