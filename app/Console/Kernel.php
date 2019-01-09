<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\CheckForOverDueItems::class, 
        Commands\SendLateNotice::class,
        Commands\SendDueNotice::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('mail:lateNotice')
                    ->dailyAt('06:00')
                    ->timezone('America/Denver')
                    ->thenPing('http://beats.envoyer.io/heartbeat/rI4WtTDiUlirfXa');

        $schedule->command('mail:dueNotice')
                    ->dailyAt('06:00')
                    ->timezone('America/Denver')
                    ->thenPing('http://beats.envoyer.io/heartbeat/9hVl1DP5F2G3NHR');

        $schedule->command('checkouts:overdue')
                    ->weekdays()
                    ->dailyAt('07:00')
                    ->timezone('America/Denver')
                    ->thenPing('http://beats.envoyer.io/heartbeat/LsJx6s3yrGLPVu0');

        $schedule->command('horizon:snapshot')->everyFiveMinutes();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
