<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\User;


class AdminController extends Controller
{
    public function management(){
        $users = User::all();
        $users = $users->map(function($element){
           return [$element['id'], $element['name'], $element['email'], $element['is_admin']];
        });
        return view('management', ['users' => $users]);
    }

    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();
        return $this->management();
    }

    public function edituser($id){
        $user = User::find($id);
        return view( 'edituser', ['user' => $user]);
    }

    public function edituseraction(Request $request, $id){
        $user = User::find($id);
        $user->name = $request['name'];
        $user->email = $request['email'];

        if($request['is_admin'] == true){
            $admin = 1;
        }else{
            $admin = 0;
        }

        $user->is_admin = $admin;
        $user->save();
        return $this->management();
    }
}
