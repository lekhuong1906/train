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

    public function scopeCreateReceiptCode(){
        $count = Receipt::count();
        $data = 'HD'.($count+1);
        return $data;
    }
    public function scopeGetAmount($query, $receipt_id){
        $data = $query->find($receipt_id);
        return $data->receipt_total;
    }
    public function scopeLastItem(){
        $item = Receipt::orderby('id','desc')->first();
        return $item->id;
    }

}
