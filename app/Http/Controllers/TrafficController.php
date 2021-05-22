<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Traffic;
use App\Models\Intersection;

class TrafficController extends Controller
{
    public function index(Request $request){
        try {
            $status = 'success';
            $message = '';
            $data = Traffic::all(['id', 'name', 'address', 'vehiclesDensityInMinutes']);
        } catch (\Throwable $th) {
            //throw $th;
            $status = 'failed';
            $message = $th->getMessage();
            $data = '';
        }
        return [
            "status" => $status,
            "message" => $message,
            "data" => $data
        ];
    }
    public function traffics(Request $request){
        try {
            $status = 'success';
            $message = '';
            $data = Traffic::take(5)->get(['id', 'name', 'address', 'vehiclesDensityInMinutes']);
        } catch (\Throwable $th) {
            //throw $th;
            $status = 'failed';
            $message = $th->getMessage();
            $data = '';
        }
        return [
            "status" => $status,
            "message" => $message,
            "data" => $data
        ];
    }
    public function traffic_light_id($id){
        try {
            $status = 'success';
            $message = '';
            $data = Traffic::where('id', $id)->first(['id', 'name', 'address', 'vehiclesDensityInMinutes']);
            $intersections = Intersection::where('traffic_id', $data->id)->get(['name', 'waitingTimeInSeconds', 'currentStatus']);
            $data->intersections = $intersections;
        } catch (\Throwable $th) {
            //throw $th;
            $status = 'failed';
            $message = $th->getMessage();
            $data = '';
        }
        return [
            "status" => $status,
            "message" => $message,
            "data" => $data
        ];
    }
    public function traffic_store(Request $request){
        try {
            $status = 'success';
            $message = '';
            Traffic::create([
                'name' => $request->name,
                'address' => $request->address,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'vehiclesDensityInMinutes' => $request->vehiclesDensityInMinutes
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            $status = 'failed';
            $message = $th->getMessage();
        }
        return [
            "status" => $status,
            "message" => $message
        ];
    }
    public function traffic_update(Request $request, $id){
        try {
            $status = 'success';
            $message = '';
            Traffic::where('id', $id)->update([
                'name' => $request->name,
                'address' => $request->address,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'vehiclesDensityInMinutes' => $request->vehiclesDensityInMinutes
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            $status = 'failed';
            $message = $th->getMessage();
        }
        return [
            "status" => $status,
            "message" => $message
        ];
    }
    public function traffic_destroy($id){
        try {
            $status = 'success';
            $message = '';
            Traffic::where('id', $id)->delete();
            Intersection::where('traffic_id', $id)->delete();
        } catch (\Throwable $th) {
            //throw $th;
            $status = 'failed';
            $message = $th->getMessage();
        }
        return [
            "status" => $status,
            "message" => $message
        ];
    }
}