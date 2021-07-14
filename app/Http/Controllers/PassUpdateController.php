<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;

class PassUpdateController extends Controller
{
	public function index(){

	}

    public function store(Request $request){

        $pass_validate = Users::where("id", '=', $request["id"])->select("password")->first();

        if($pass_validate->password != $request["old-password"]){
            return array("status"=>false,"message"=>"La contraseña actual es incorrecta.");
        }else{
            $user = Users::find($request["id"]);

            $user->password = $request["new-password"];

            $response = $user->save();

            if($response){
                return array("status"=>true,"message"=>"Contraseña actualizada exitosamente.");
            }else{
                return array("status"=>false,"message"=>"Error al actualizar en la base de datos.");
            }
        }
    }

}
