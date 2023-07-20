<?php

namespace App\Models;

use App\Models\Receipt;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $table='subscriptions';
    protected $fillable =[
        'amount',
        'user_id',
        'receipt_id',
        'stripe_id',
        'stripe_status',
    ];
    public function receipt(){
        return $this->belongsTo(\App\Models\Receipt::class,'receipt_id');
    }
    public function ticket(){
        return $this->hasOne(TicKet::class,'payment_id');
    }

    public function scopeLastItem(){
        $item = Subscription::latest('id')->first();
        return $item->id;
    }
}
