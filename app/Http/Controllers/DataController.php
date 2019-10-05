<?php

namespace App\Http\Controllers;

use http\Env;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function adding(Request $request)
    {
        $array = $request->all();

        $node =  $array['node'];
        $concentration =  $array['concentration'];
        $ratio =  $array['ratio'];
        $apikey =  $array['apikey'];

        if(md5($apikey) ==  env('API_KEY_PRIVATE')){
            DB::table('measurement')->insert([
                ['concentration' => $concentration, 'ratio' => $ratio, 'created_at' => date("Y-m-d-H:i:s")],
            ]);
        };
    }
}