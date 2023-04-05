<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;
    protected $table='receipts';
    protected $fillable = [
        'receipt_code',
        'type_ticket_id',
        'user_id',
        'receipt_total',
    ];
    public function type_ticket(){
        return $this->belongsTo(TypeTicket::class,'type_ticket_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function subscription(){
        return $this->hasOne(Subscription::class,'receipt_id');
    }

}
