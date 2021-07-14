<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Products;


class ActiveProductController extends Controller
{
	public function index(){

	}

    public function store(Request $request){

        $product = Products::find($request["id"]);

        $product->active = 1;
        
        $response = $product->save();

        if($response){
            return array("status"=>true,"message"=>"Producto Re-activado exitosamente.");
        }else{
            return array("status"=>false,"message"=>"Error al Re-activar producto en la base de datos.");
        }
        
    }


}
