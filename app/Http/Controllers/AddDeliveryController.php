<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Deliveries;
use App\Routes;
use App\Products;

class AddDeliveryController extends Controller
{
	public function index(){

	}

    public function store(Request $request){

        $session = \Session::get('logistic_session_user');
        $id = $session["id"];
        $profile_id = $session["profile_id"];

        if($profile_id == 3){
            $request["company_id"] = $id;
        }

        $deliver = new Deliveries();

        $id = random_int(100, 999);

        $request["id"] = $id;

        $request["status"] = "PROCESO";

        $response = $deliver->create($request->all());

        $route = new Routes();

        unset($request["id"]);

        $request["delivery_id"] = $id;


        $response_2 = $route->create($request->all());

        $product = Products::find($request["product_id"]);

        $product->quantity = $product->quantity - $request["quantity"];

        $response_3 = $product->save();

   
        if($response && $response_2 && $response_3){
            return array("status"=>true,"message"=>"Envio creado exitosamente con el folio: #".$id);
        }else{
            return array("status"=>false,"message"=>"Error al insertar en la base de datos.");
        }
    }

}
