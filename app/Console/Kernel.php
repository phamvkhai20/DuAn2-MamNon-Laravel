<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Carbon;

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
        $schedule->call(function () {
            $attendance= Attendance::where("date", Carbon::now()->toDateString())->with('don_ho','teacher')->with(['kid'=>function($query){
                $query->with('parent');
            }])->where('status', 0)->get();

                foreach ($attendance as $a) {
                    $kid_name = $a->kid_name;
                    $email = $a->kid->parent->email;
                    $data = array("kid_name" => $kid_name, "body" => "This is our new promotional offer");
                    Mail::send('mail', $data, function($message) use ($kid_name, $email) {
                        $message->to($email, $kid_name)
                                ->subject('New Offer Launched');
                        $message->from('anhquanvu97@gmail.com', 'Artisans Web');
                    });
                }
        })->dailyAt('23:58');
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
