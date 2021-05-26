<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Traffic;
use App\Models\Intersection;
use App\Models\ApiKey;

class TrafficController extends Controller
{
    public function Unauthorized(){
        return response()->json([
            "status" => "failed",
            "message" => "401 Unauthorized",
            "data" => ""
        ], 401);
    }
    public function Catch($message){
        return response()->json([
            "status" => "failed",
            "message" => $message,
            "data" => ""
        ], 400);
    }
    public function index(Request $request){
        try {
            $status = 'success';
            if (ApiKey::where('key', $request->header('API_Key'))->where('status', '1')->count() > 0) {
                $data = Traffic::all(['id', 'name', 'address', 'latitude', 'longitude', 'vehiclesDensityInMinutes']);
            }else {
                return $this->Unauthorized();
            }
        } catch (\Throwable $th) {
            //throw $th;
            return $this->Catch($th->getMessage());
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
            if (ApiKey::where('key', $request->header('API_Key'))->where('status', '1')->count() > 0) {
                $earthRadius = 6371;
                $data = Traffic::selectRaw("id, name, address, latitude, longitude, vehiclesDensityInMinutes,
                        (".$earthRadius."*acos(cos(radians(".$request->latitude."))*cos(radians(latitude))
                        *cos(radians(longitude)-radians(".$request->longitude."))
                        +sin(radians(".$request->latitude."))
                        *sin(radians(latitude)))) AS distance")
                        ->having("distance", "<", $request->radius)
                        ->orderBy("distance","ASC")
                        ->get();
                if ($data->count() == 0) {
                    $data = Traffic::orderBy('id', 'DESC')->take(10)->get();
                }
            }else {
                return $this->Unauthorized();
            }
        } catch (\Throwable $th) {
            //throw $th;
            return $this->Catch($th->getMessage());
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
            if (ApiKey::where('key', $request->header('API_Key'))->where('status', '1')->count() > 0) {
                $data = Traffic::where('id', $id)->first(['id', 'name', 'address', 'latitude', 'longitude', 'vehiclesDensityInMinutes']);
                $intersections = Intersection::where('traffic_id', $data->id)->get(['id', 'name', 'latitude', 'longitude', 'waitingTimeInSeconds', 'currentStatus']);
                $data->intersections = $intersections;
            }else {
                return $this->Unauthorized();
            }
        } catch (\Throwable $th) {
            //throw $th;
            return $this->Catch($th->getMessage());
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
            if (ApiKey::where('key', $request->header('API_Key'))->where('status', '1')->count() > 0) {
                Traffic::create([
                    'name' => $request->name,
                    'address' => $request->address,
                    'latitude' => $request->latitude,
                    'longitude' => $request->longitude,
                    'vehiclesDensityInMinutes' => $request->vehiclesDensityInMinutes
                ]);
            }else {
                return $this->Unauthorized();
            }
        } catch (\Throwable $th) {
            //throw $th;
            return $this->Catch($th->getMessage());
        }
        return [
            "status" => $status,
            "message" => $message ?? ''
        ];
    }
    public function traffic_update(Request $request, $id){
        try {
            $status = 'success';
            if (ApiKey::where('key', $request->header('API_Key'))->where('status', '1')->count() > 0) {
                if (Traffic::where('id', $id)->count() > 0) {
                $currentData = Traffic::where('id', $id)->first();
                    Traffic::where('id', $id)->update([
                        'name' => $request->name ?? $currentData->name,
                        'address' => $request->address ?? $currentData->address,
                        'latitude' => $request->latitude ?? $currentData->latitude,
                        'longitude' => $request->longitude ?? $currentData->longitude,
                        'vehiclesDensityInMinutes' => $request->vehiclesDensityInMinutes ?? $currentData->vehiclesDensityInMinutes
                    ]);
                }else {
                    return $this->Catch('Traffic sign not exist');
                }
            }else {
                return $this->Unauthorized();
            }
        } catch (\Throwable $th) {
            //throw $th;
            return $this->Catch($th->getMessage());
        }
        return [
            "status" => $status,
            "message" => $message ?? ''
        ];
    }
    public function traffic_destroy(Request $request, $id){
        try {
            $status = 'success';
            if (ApiKey::where('key', $request->header('API_Key'))->where('status', '1')->count() > 0) {
                Traffic::where('id', $id)->delete();
                Intersection::where('traffic_id', $id)->delete();
            }else {
                return $this->Unauthorized();
            }
        } catch (\Throwable $th) {
            //throw $th;
            return $this->Catch($th->getMessage());
        }
        return [
            "status" => $status,
            "message" => $message ?? ''
        ];
    }
}