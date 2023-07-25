<?php

namespace App\Http\Controllers;

use App\Models\ReportSummary;
use Carbon\Carbon;
use Hamcrest\Text\SubstringMatcher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $date = $request->date_filter;
        $summary = ReportSummary::summary()->first();
        $chart = $this->chart($date);
        return view('admin.dashboard.content')->with(['summary' => $summary, 'chart' => $chart]);
    }

    public function chart($request)
    {
        $now = Carbon::now();
        if ($request == -1 || $request == null){
            for ($i = 1; $i < 10; $i++)
                $data[$i] = ReportSummary::whereMonth('created_at', $i)->sum('revenue');
        } elseif ($request == 1) {
            $month = Carbon::now()->month;
            $data[$month] = ReportSummary::whereDate('created_at', $now)->sum('revenue');
        } else {
            $month = $now->month;
            $data[$month] = ReportSummary::whereMonth('created_at', $now)->sum('revenue');
        }
        return $data;
    }

    public function summary($request){
        $now = Carbon::now();
        if ($request == -1 || $request == null){
            for ($i = 1; $i < 10; $i++)
                $data[$i] = ReportSummary::whereMonth('created_at', $i)->sum('revenue');
        } elseif ($request == 1) {
            $month = Carbon::now()->month;
            $data[$month] = ReportSummary::whereDate('created_at', $now)->sum('revenue');
        } else {
            $month = $now->month;
            $data[$month] = ReportSummary::whereMonth('created_at', $now)->sum('revenue');
        }
        return $data;
    }
}
