<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicKet extends Model
{
    use HasFactory;
    protected $table='tickets';
    protected $fillable=[
        'payment_id',
        'ticket_code',
        'day_start',
        'day_end',
        'ticket_status',
    ];
    public function subscription(){
        return $this->belongsTo(TicKet::class,'payment_id');
    }

    public function scopeTicket($query){

    }
}
