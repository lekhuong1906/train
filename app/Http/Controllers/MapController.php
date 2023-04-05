<?php

namespace App\Http\Controllers;

use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MapController extends Controller
{
    public function maps(){
        $all_station = Station::get();
        return view('admin.maps.map')->with('all_station',$all_station);
    }
    public function add_station(Request $request){
        $new_station = new Station();
        $new_station->fill($request->all());
        $new_station->save();
        return redirect()->route('maps')->with('message','Add Station Success');
    }
}
