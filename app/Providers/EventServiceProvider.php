<?php

namespace App\Providers;

use App\Events\LabelCreated;
use App\Events\ProductCreated;
use App\Events\ProductImported;
use App\Listeners\ClearAuthUserCacheOnLogout;
use App\Listeners\SyncLabel;
use App\Listeners\SyncProduct;
use App\Listeners\SyncProducts;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],
        ProductCreated::class => [

            SyncProduct::class

        ],
        ProductImported::class => [

            SyncProducts::class

        ],
        LabelCreated::class => [

            SyncLabel::class

        ],
        Logout::class => [

            ClearAuthUserCacheOnLogout::class

        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
