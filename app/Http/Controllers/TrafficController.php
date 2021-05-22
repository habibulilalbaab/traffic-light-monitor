<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Traffic;
use App\Models\Intersection;
use App\Models\ApiKey;

class TrafficController extends Controller
{
    public function index(Request $request){
        try {
            $status = 'success';
            if (ApiKey::where('key', $request->header('API_Key'))->count() > 0) {
                $data = Traffic::all(['id', 'name', 'address', 'vehiclesDensityInMinutes']);
            }else {
                $status = 'failed';
                $message = 'Access Denied';
            }
        } catch (\Throwable $th) {
            //throw $th;
            $status = 'failed';
            $message = $th->getMessage();
        }
        return [
            "status" => $status,
            "message" => $message ?? '',
            "data" => $data ?? ''
        ];
    }
    public function traffics(Request $request){
        try {
            $status = 'success';
            if (ApiKey::where('key', $request->header('API_Key'))->count() > 0) {
                $data = Traffic::inRandomOrder()->take(10)->get(['id', 'name', 'address', 'vehiclesDensityInMinutes']);
            }else {
                $status = 'failed';
                $message = 'Access Denied';
            }
        } catch (\Throwable $th) {
            //throw $th;
            $status = 'failed';
            $message = $th->getMessage();
            $data = '';
        }
        return [
            "status" => $status,
            "message" => $message ?? '',
            "data" => $data ?? ''
        ];
    }
    public function traffic_light_id(Request $request, $id){
        try {
            $status = 'success';
            if (ApiKey::where('key', $request->header('API_Key'))->count() > 0) {
                $data = Traffic::where('id', $id)->first(['id', 'name', 'address', 'vehiclesDensityInMinutes']);
                $intersections = Intersection::where('traffic_id', $data->id)->get(['name', 'waitingTimeInSeconds', 'currentStatus']);
                $data->intersections = $intersections;
            }else {
                $status = 'failed';
                $message = 'Access Denied';
            }
        } catch (\Throwable $th) {
            //throw $th;
            $status = 'failed';
            $message = $th->getMessage();
            $data = '';
        }
        return [
            "status" => $status,
            "message" => $message ?? '',
            "data" => $data ?? ''
        ];
    }
    public function traffic_store(Request $request){
        try {
            $status = 'success';
            if (ApiKey::where('key', $request->header('API_Key'))->count() > 0) {
                Traffic::create([
                    'name' => $request->name,
                    'address' => $request->address,
                    'latitude' => $request->latitude,
                    'longitude' => $request->longitude,
                    'vehiclesDensityInMinutes' => $request->vehiclesDensityInMinutes
                ]);
            }else {
                $status = 'failed';
                $message = 'Access Denied';
            }
        } catch (\Throwable $th) {
            //throw $th;
            $status = 'failed';
            $message = $th->getMessage();
        }
        return [
            "status" => $status,
            "message" => $message ?? ''
        ];
    }
    public function traffic_update(Request $request, $id){
        try {
            $status = 'success';
            if (ApiKey::where('key', $request->header('API_Key'))->count() > 0) {
                Traffic::where('id', $id)->update([
                    'name' => $request->name,
                    'address' => $request->address,
                    'latitude' => $request->latitude,
                    'longitude' => $request->longitude,
                    'vehiclesDensityInMinutes' => $request->vehiclesDensityInMinutes
                ]);
            }else {
                $status = 'failed';
                $message = 'Access Denied';
            }
        } catch (\Throwable $th) {
            //throw $th;
            $status = 'failed';
            $message = $th->getMessage();
        }
        return [
            "status" => $status,
            "message" => $message ?? ''
        ];
    }
    public function traffic_destroy(Request $request, $id){
        try {
            $status = 'success';
            if (ApiKey::where('key', $request->header('API_Key'))->count() > 0) {
                Traffic::where('id', $id)->delete();
                Intersection::where('traffic_id', $id)->delete();
            }else {
                $status = 'failed';
                $message = 'Access Denied';
            }
        } catch (\Throwable $th) {
            //throw $th;
            $status = 'failed';
            $message = $th->getMessage();
        }
        return [
            "status" => $status,
            "message" => $message ?? ''
        ];
    }
}