<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers;

class UpdateProviderController extends Controller
{
	public function index(){

	}

    public function store(Request $request){

        $provider = Providers::find($request["id"]);

        $provider->name = $request["name"];
        $provider->description = $request["description"];
        $response = $provider->save();

        if($response){
            return array("status"=>true,"message"=>"Provedor actializado exitosamente.");
        }else{
            return array("status"=>false,"message"=>"Error al actualizar en la base de datos.");
        }
        
    }

}
