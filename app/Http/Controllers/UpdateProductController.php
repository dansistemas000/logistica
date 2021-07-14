<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Products;

class UpdateProductController extends Controller
{
	public function index(){

	}

    public function store(Request $request){

        $product = Products::find($request["id"]);

        $product->name = $request["name"];
        $product->description = $request["description"];
        $product->weight = $request["weight"];
        $product->quantity = $request["quantity"];
        $product->provider_id = $request["provider_id"];
        $response = $product->save();

        if($response){
            return array("status"=>true,"message"=>"Producto actializado exitosamente.");
        }else{
            return array("status"=>false,"message"=>"Error al actualizar en la base de datos.");
        }
        
    }

}
