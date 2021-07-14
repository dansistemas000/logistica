<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Products;

class AddProductController extends Controller
{
	public function index(){

	}

    public function store(Request $request){

        $session = \Session::get('logistic_session_user');
        $id = $session["id"];
        $profile_id = $session["profile_id"];

        if($profile_id == 3){
             $product_validate = \DB::select("select * from products as p inner join providers as pr on pr.id = p.provider_id where p.name ='".$request["name"]."' and pr.company_id =".$id);
        }else{
            $product_validate = Products::where("name", '=', $request["name"])->first();
        }

        if($product_validate){
            return array("status"=>false,"message"=>"El producto con el nombre: ".$request["name"]." ya existe, registre el producto con otro nombre.");
        }else{
            $product = new Products();

            $response = $product->create($request->all());

            if($response){
                return array("status"=>true,"message"=>"Producto agregado exitosamente.");
            }else{
                return array("status"=>false,"message"=>"Error al insertar en la base de datos.");
            }
        }
    }

}
