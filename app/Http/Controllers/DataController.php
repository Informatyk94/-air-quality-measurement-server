<?php

namespace App\Http\Controllers;

use http\Env;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Sensor;
use App\Measurement;

class DataController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function adding(Request $request)
    {
        $array = $request->all();

        $id_sensor =  $array['node'];
        $concentration =  $array['concentration'];
        $ratio =  $array['ratio'];
        $apikey =  $array['apikey'];

        if(md5($apikey) ==  env('API_KEY_PRIVATE')){
            DB::table('measurement')->insert([
                ['concentration' => $concentration, 'ratio' => $ratio, $id_sensor => 'sensor_id', 'created_at' => date("Y-m-d-H:i:s")],
            ]);
        };
    }

    public function listofsensors(){
        $data = Sensor::all();
        return view('listdata', ['listofsensors' => $data]);
    }

    public function listofmeasurement(Request $request, $id){
        $data = Sensor::find($id);
        $measurment = Measurement::where('sensor_id', $id)->select('ratio','created_at')->get();
        $measurment = $measurment->map(function($element){
            return [(string)$element['created_at'], (string)$element['ratio']];
        });
        return view('measurement', ['sensor' => $data, 'measurment' => $measurment]);
    }

    public function addsensor(){
        return view('addsensor');
    }

    public function addsensoraction(Request $request){
        dd($request);
    }

     public function measurement(Request $request, $id)
     {
         $data = Measurement::where('sensor_id', $id)->select('ratio','created_at')->get();
         $data = $data->map(function($element){
             return [$element['created_at'], $element['ratio']];
         });
         return $data;
     }
}
