<?php

namespace App\Console\Commands;

use App\Models\UserRole;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SubscriberWatcher extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'watcher:subscribers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        UserRole::where('expire_in', '<', Carbon::now())->delete();
    }
}
