<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use DB;
use DateTime;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->everyMinute();


        //schedule to update booking status of completed bookings
        $schedule->call(function () {

            $dt = new DateTime();
            $today = $dt->format('Y-m-d');

            DB::table('bookings')
                ->where('booking_status_id', 1)
                ->where('date_out','<=', $today)
                ->update(['booking_status_id' => 2]);
            })->daily();
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
