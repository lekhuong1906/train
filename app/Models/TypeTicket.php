<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeTicket extends Model
{
    use HasFactory;
    protected $table='type_tickets';
    protected $fillable=[
        'type_name',
        'type_description',
        'total_day',
        'type_price',
        'type_status'
    ];

    public function receipt(){
        return $this->hasMany(Receipt::class,'type_ticket_id','id');
    }

    public function scopeStatus($query){
        if (($status = request()->type_status)!==null)
            $query = $query->where('type_status',$status);
        return $query;
    }

}
