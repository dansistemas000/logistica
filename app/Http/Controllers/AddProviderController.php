<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers;

class AddProviderController extends Controller
{
	public function index(){

	}

    public function store(Request $request){

        $session = \Session::get('logistic_session_user');
        $id = $session["id"];
        $profile_id = $session["profile_id"];

        if($profile_id == 3){
            $provider_validate = Providers::where("name", '=', $request["name"])->where("company_id","=",$id)->first();
        }else{
            $provider_validate = Providers::where("name", '=', $request["name"])->first();
        }

        if($provider_validate){
            return array("status"=>false,"message"=>"El proveedor con el nombre: ".$request["name"]." ya existe, registre el proveedor con otro nombre.");
        }else{

            if($profile_id == 3){
                $request["company_id"] = $id;
            }

            $provider = new Providers();

            $response = $provider->create($request->all());

            if($response){
                return array("status"=>true,"message"=>"Provedor agregado exitosamente.");
            }else{
                return array("status"=>false,"message"=>"Error al insertar en la base de datos.");
            }
        }
    }

}
