<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;
    protected $table='stations';
    protected $fillable=[
        'station_name',
        'lng',
        'lat',
        'station_status',
    ];

    public function scopeStatus($query){
        if ($status = request()->station_status)
            if ($status == -1)
                $query = $query->orderby('id','desc');
            else $query = $query->where('station_status',$status)->orderby('id','desc');
        return $query;
    }
}
