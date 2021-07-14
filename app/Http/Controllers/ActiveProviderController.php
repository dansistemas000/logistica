<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers;


class ActiveProviderController extends Controller
{
	public function index(){

	}

    public function store(Request $request){

        $provider = Providers::find($request["id"]);

        $provider->active = 1;
        
        $response = $provider->save();

        if($response){
            return array("status"=>true,"message"=>"Provedor Re-activado exitosamente.");
        }else{
            return array("status"=>false,"message"=>"Error al Re-activar provedor en la base de datos.");
        }
        
    }


}
