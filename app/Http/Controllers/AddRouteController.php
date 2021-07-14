<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Routes;
use App\Products;
use App\Models;

class AddRouteController extends Controller
{
	public function index(){

	}

    public function store(Request $request){

        $validate_customer_delivery = Models::GET_CUSTUMER_VALIDATE_DELIVERY($request["delivery_id"],$request["customer_id"]);

        if($validate_customer_delivery){
            return array("status"=>false,"message"=>"El cliente seleccionado ya esta agregado en este envio, colocar otro cliente.");
        }

        $validate_routes = \DB::select("select count(*) as conteo from routes where delivery_id = ".$request["delivery_id"]);

        $validate_routes = $validate_routes[0];

        if($validate_routes->conteo >= 10){
            return array("status"=>false,"message"=>"El envio ya tiene 10 rutas agregadas ya no se puede agregar mas rutas.");
        }


        $route = new Routes();

        $request["status"] = "PROCESO";

        $response = $route->create($request->all());

        $product = Products::find($request["product_id"]);

        $product->quantity = $product->quantity - $request["quantity"];

        $response_2 = $product->save();

        
        if($response && $response_2){
            return array("status"=>true,"message"=>"Ruta agregada exitosamente al envio: #".$request["delivery_id"]);
        }else{
            return array("status"=>false,"message"=>"Error al insertar en la base de datos.");
        }

    }

}
