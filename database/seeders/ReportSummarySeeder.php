<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\ReportSummary;
use Illuminate\Support\Facades\DB;

class ReportSummarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time = new Carbon('2023-01-01 10:30:36');
        for ($i = 0; $i < 210; $i++) {
            if ($i < 90) {
                $posts = [
                    'revenue' => random_int(500000, 2000000),
                    'order_completed' => random_int(10, 30),
                    'ticket_sold' => random_int(10, 30),
                    'created_at' => $time->addDay(),
                ];
            }
            if ($i > 90 && $i < 180) {
                $posts = [
                    'revenue' => random_int(800000, 3000000),
                    'order_completed' => random_int(10, 30),
                    'ticket_sold' => random_int(30, 40),
                    'created_at' => $time->addDay(),
                ];
            }
            if ($i>180){
                $posts = [
                    'revenue' => random_int(2000000, 5000000),
                    'order_completed' => random_int(40, 50),
                    'ticket_sold' => random_int(10, 30),
                    'created_at' => $time->addDay(),
                ];
            }

            ReportSummary::insert($posts);
        }

    }
}
