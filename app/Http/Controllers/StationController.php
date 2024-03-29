<?php

namespace App\Http\Controllers;

use App\Http\Requests\StationRequest;
use App\Models\Station;
use Illuminate\Http\Request;


class StationController extends Controller
{
    public function add_station(){
        return view('admin.stations.add_station');
    }
    public function save_station(StationRequest $request){
        $new_station = new Station();
        $new_station->fill($request->all());
        $new_station->save();
        return redirect()->route('all-station')->with('message','Add Station Success');
    }
    public function all_station(){
        $all_station = Station::status()->paginate(5);
        return view('admin.stations.all_station')->with('all_station',$all_station);
    }
    public function edit_station($id){
        $station = Station::where('id',$id)->first();
        return view('admin.stations.edit_station')->with('station',$station);
    }
    public function update_station($id, StationRequest $request){
        $data = Station::where('id',$id)->first();
        $data->fill($request->all());
        $data->save();
        return redirect()->route('all-station')->with('message','Update Station Success');
    }
    public function delete_station($id){
        Station::where('id',$id)->delete();
        return redirect()->back()->with('message','Deleted Station Success');
    }
    public function maps(){
        $all_station=Station::get();
        return view('admin.stations.map')->with('all_station',$all_station);
    }

    //map page
    public function maps_page(){
        $all_station=Station::get();
        return view('pages.homes.maps')->with('all_station',$all_station);
    }
}
