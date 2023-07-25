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

    public function scopeSummary($query)
    {
        $query = $query->selectRaw('SUM(revenue) as total_revenue, SUM(order_completed) as total_order_completed, SUM(ticket_sold) as total_ticket_sold');
        $now = Carbon::now();
        if ($date_filter = request()->date_filter) {
            if ($date_filter == 1)
                $query->whereDate('created_at', $now);
            else if ($date_filter == 2)
                $query->whereMonth('created_at', $now->month);
            else
                $query->whereYear('created_at', $now);
        }

        return $query;
    }

}
