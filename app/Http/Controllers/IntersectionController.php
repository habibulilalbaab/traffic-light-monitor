<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Intersection;
use App\Models\Traffic;
use App\Models\ApiKey;

class IntersectionController extends Controller
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
                $data = Intersection::orderBy('traffic_id', 'DESC')->get(['id', 'traffic_id', 'name', 'latitude', 'longitude', 'waitingTimeInSeconds', 'currentStatus']);
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
    public function traffic_intersection_store(Request $request){
        try {
            $status = 'success';
            if (ApiKey::where('key', $request->header('API_Key'))->where('status', '1')->count() > 0) {
                if (Traffic::where('id', $request->traffic_id)->count() > 0) {    
                    Intersection::create([
                        'traffic_id' => $request->traffic_id,
                        'name' => $request->name,
                        'latitude' => $request->latitude,
                        'longitude' => $request->longitude,
                        'waitingTimeInSeconds' => $request->waitingTimeInSeconds,
                        'currentStatus' => $request->currentStatus
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
    public function traffic_intersection_update(Request $request, $id){
        try {
            $status = 'success';
            if (ApiKey::where('key', $request->header('API_Key'))->where('status', '1')->count() > 0) {
                $currentData = Intersection::where('id', $id)->first();
                if (Intersection::where('id', $id)->count() > 0) {
                    Intersection::where('id', $id)->update([
                        'traffic_id' => $request->traffic_id ?? $currentData->traffic_id,
                        'name' => $request->name ?? $currentData->name,
                        'latitude' => $request->latitude ?? $currentData->latitude,
                        'longitude' => $request->longitude ?? $currentData->longitude,
                        'waitingTimeInSeconds' => $request->waitingTimeInSeconds ?? $currentData->waitingTimeInSeconds,
                        'currentStatus' => $request->currentStatus ?? $currentData->currentStatus
                    ]);
                }else {
                    return $this->Catch('Intersection not exist');
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
    public function traffic_intersection_destroy(Request $request, $id){
        try {
            $status = 'success';
            if (ApiKey::where('key', $request->header('API_Key'))->where('status', '1')->count() > 0) {
                Intersection::where('id', $id)->delete();
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
