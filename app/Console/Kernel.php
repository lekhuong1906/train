<?php

namespace App\Console;

use App\Http\Controllers\PaymentController;
use App\Models\Receipt;
use App\Models\ReportSummary;
use App\Models\Subscription;
use App\Models\TicKet;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        //update ticket status
        $schedule->call(function (){
            $ticket_invalid = TicKet::whereDate('day_end','<',now())->get();
            foreach ($ticket_invalid as $ticket){
                $ticket->ticket_status = 0;
                $ticket->save();
            }
        })->everyMinute();

        //update table report summary
        $schedule->call(function (){
            $data = [
                'revenue'=> Subscription::whereDate('created_at',now())->sum('amount'),
                'order_completed'=> TicKet::whereDate('updated_at',now())->invalid()->count(),
                'ticket_sold'=>Receipt::whereDate('created_at',now())->count(),
            ];
            $summary = new ReportSummary();
            $summary->fill($data);
            $summary->save();

        })->everyMinute();
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
