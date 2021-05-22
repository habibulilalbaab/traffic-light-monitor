<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Intersection;
use App\Models\Traffic;

class IntersectionController extends Controller
{
    public function index(Request $request){
        try {
            $status = 'success';
            $message = '';
            $data = Intersection::orderBy('traffic_id', 'DESC')->get(['traffic_id', 'name', 'waitingTimeInSeconds', 'currentStatus']);
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
    public function traffic_intersection_store(Request $request){
        try {
            $status = 'success';
            $message = '';
            if (Traffic::where('id', $request->traffic_id)->count() > 0) {    
                Intersection::create([
                    'traffic_id' => $request->traffic_id,
                    'name' => $request->name,
                    'waitingTimeInSeconds' => $request->waitingTimeInSeconds,
                    'currentStatus' => $request->currentStatus
                ]);
            }else {
                $status = 'failed';
                $message = 'Traffic sign not exist';
            }
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
    public function traffic_intersection_update(Request $request, $id){
        try {
            $status = 'success';
            $message = '';
            Intersection::where('id', $id)->update([
                'traffic_id' => $request->traffic_id,
                'name' => $request->name,
                'waitingTimeInSeconds' => $request->waitingTimeInSeconds,
                'currentStatus' => $request->currentStatus
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
    public function traffic_intersection_destroy($id){
        try {
            $status = 'success';
            $message = '';
            Intersection::where('id', $id)->delete();
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
