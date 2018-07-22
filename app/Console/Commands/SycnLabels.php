<?php

namespace App\Console\Commands;

use App\Label;
use App\Repository\LabelRepository;
use App\Repository\SyncRepository;
use Illuminate\Console\Command;

class SycnLabels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'npms:sync-labels';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync All Labels';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Starting Label Sync');

        $labels = Label::all();

        $this->info('Total '.$labels->count(). ' labels found.');
        $repo = new SyncRepository();

        $bar = $this->output->createProgressBar(count($labels));
        foreach ($labels as $label){

            $this->line(' : Syncing '.$label->title);

            $repo->syncByLabelId($label);

            $bar->advance();

        }

        $bar->finish();

        $this->info('Label Sync Complete');



    }
}
