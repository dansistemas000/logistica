<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;

class AddUserCompanyController extends Controller
{
	public function index(){

	}

    public function store(Request $request){

 
        $user = new Users();

        $response = $user->create($request->all());

        if($response){
            return array("status"=>true,"message"=>"Usuario agregado exitosamente.");
        }else{
            return array("status"=>false,"message"=>"Error al insertar en la base de datos.");
        }
        
    }

}
