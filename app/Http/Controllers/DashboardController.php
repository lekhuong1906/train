<?php

namespace App\Http\Controllers;

use App\Models\ReportSummary;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard(Request $request){
        $summary = $this->summary();
        $chart = $this->chart();
        return view('admin.dashboard.content')->with(['summary'=>$summary,'chart'=>$chart]);
    }
    public function summary(){
        $data = [
            'revenue'=> DB::table('report_summaries')->sum('revenue'),
            'order_completed'=>DB::table('report_summaries')->sum('order_completed'),
            'ticket_sold'=>DB::table('report_summaries')->sum('ticket_sold'),
            ];
        return $data;
    }
    public function chart(){
        for($i=1;$i<13;$i++){
            $data[$i]=ReportSummary::whereMonth('created_at',$i)->sum('revenue');
        }
        return $data;
    }

    public function filter($request){
        if ($request == 1){
            return now();
        }elseif ($request == 0){
            return Carbon::now()->month;
        }else{
            return Carbon::now()->year;
        }
    }
}
