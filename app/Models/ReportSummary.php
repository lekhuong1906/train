<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportSummary extends Model
{
    use HasFactory;

    protected $table = 'report_summaries';
    protected $fillable = [
        'revenue',
        'order_completed',
        'ticket_sold',
    ];

    public function scopeSummary($query, $request)
    {
        $query = $query->selectRaw('SUM(revenue) as total_revenue, SUM(order_completed) as total_order_completed, SUM(ticket_sold) as total_ticket_sold');

        if ($request) {
            $time = Carbon::now();
            if ($request == 1) {
                $query->whereDate('created_at', $time);
            } elseif ($request == 0)
                $query->whereMonth('created_at', $time);
            else
                $query->whereYear('created_at', $time);
        }

        return $query->first();
    }

}
