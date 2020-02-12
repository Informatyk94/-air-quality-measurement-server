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


    //API ADD MEASUREMENT TO SENSOR
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

    //LIST OF SENSORS
    public function listofsensors(){
        $data = Sensor::all();
        return view('listdata', ['listofsensors' => $data]);
    }

    //MEASUREMENTS ONE SENSOR
    public function listofmeasurement(Request $request, $id_sensor){
        $data = Sensor::where('id_sensor', $id_sensor)->get();
        $measurment = Measurement::where('sensor_id', $id_sensor)->select('ratio','concentration','created_at')->get();
        $measurment = $measurment->map(function($element){
            return [(string)$element['created_at'], (string)$element['concentration'], (string)$element['ratio']];
        });
        return view('measurement', ['sensor' => $data[0], 'measurment' => $measurment]);
    }

    //LINK TO FORM ADD NEW SENSOR
    public function addsensor(){
        return view('addsensor');
    }

    //LINK TO EDIT FORM
    public function editsensor($id){
        $sensor = Sensor::find($id);
        return view('editsensor',['sensor' => $sensor]);
    }

    //ACTION FORM EDIT SENSOR
    public function editsensoraction(Request $request, $id){
        $sensor = Sensor::find($id);
        $sensor->title = $request["title"];
        $sensor->description = $request["description"];
        $sensor->id_sensor = $request["id_sensor"];
        $sensor->save();
        return $this->listofsensors();
    }

    //ACTION FORM ADD SENSOR
    public function addsensoraction(Request $request){
        $sensor = new Sensor;
        $sensor->title = $request["title"];
        $sensor->description = $request["description"];
        $sensor->id_sensor = $request["id_sensor"];
        $sensor->save();
        return $this->listofsensors();
    }


    //FOR API
     public function measurement(Request $request, $id)
     {
         $data = Measurement::where('sensor_id', $id)->select('concentration','ratio','created_at')->get();
         $data = $data->map(function($element){
             return [$element['created_at'], $element['concentration'] ,$element['ratio']];
         });
         return $data;
     }

     //DELETE SENSOR
    public function deletesensor($id){
        $sensor = Sensor::find($id);
        $sensor->delete();
        return $this->listofsensors();
    }
}
