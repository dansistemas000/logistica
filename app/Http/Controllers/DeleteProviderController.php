<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers;


class DeleteProviderController extends Controller
{
	public function index(){

	}

    public function store(Request $request){

        $provider = Providers::find($request["id"]);

        $provider->active = 0;
        
        $response = $provider->save();

        if($response){
            return array("status"=>true,"message"=>"Provedor dado de baja exitosamente.");
        }else{
            return array("status"=>false,"message"=>"Error al dar de baja provedor en la base de datos.");
        }
        
    }


}
