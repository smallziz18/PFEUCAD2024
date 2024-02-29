<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DeleteExpiredAnnonces extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-expired-annonces';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
    }
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('annonces:delete-expired')->daily();
    }
}
