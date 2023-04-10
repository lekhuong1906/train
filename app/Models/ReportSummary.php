<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportSummary extends Model
{
    use HasFactory;
    protected $table='report_summaries';
    protected $fillable=[
        'revenue',
        'order_completed',
        'ticket_sold',
    ];

}
