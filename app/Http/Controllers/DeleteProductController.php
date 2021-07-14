<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Products;


class DeleteProductController extends Controller
{
	public function index(){

	}

    public function store(Request $request){

        $product = Products::find($request["id"]);

        $product->active = 0;
        
        $response = $product->save();

        if($response){
            return array("status"=>true,"message"=>"Producto dado de baja exitosamente.");
        }else{
            return array("status"=>false,"message"=>"Error al dar de baja producto en la base de datos.");
        }
        
    }


}
