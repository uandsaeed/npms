<?php

namespace App\Providers;

use App\Observers\ProductObserver;
use App\Product;
use App\Repository\LabelRepository;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 *
 * @package App\Providers
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Queue::after(function (JobProcessed $event) {

            Log::info('[QUEUE COMPLETE]', ['job name' => $event->job->getConnectionName()]);

            $label_repo = new LabelRepository();
            $label_repo->flushLabelListCache();

            Cache::tags(['counter'])->flush();
            Cache::tags(['LABEL_LIST', 'counter'])->flush();

        });

        Product::observe(ProductObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
