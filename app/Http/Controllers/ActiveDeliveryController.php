<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Deliveries;
use DB;


class ActiveDeliveryController extends Controller
{
	public function index(){

	}

    public function store(Request $request){


        $delivery = Deliveries::find($request["delivery_id"]);

        $delivery->status = "EN RUTAS";

        $response = $delivery->save();

        $response_2 = DB::update("update routes set status ='EN CAMINO', date_status ='".date('Y-m-d h:i')."' where delivery_id=".$request["delivery_id"]);


        if($response && $response_2){
            return array("status"=>true,"message"=>"Envio activado a ruta de entrega(s) exitosamente.");
        }else{
            return array("status"=>false,"message"=>"Error al actualizar en la base de datos.");
        }
    }

}
