<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;
use App\Customers;
use DB;


class DeleteCustomerController extends Controller
{
	public function index(){

	}

    public function store(Request $request){

        $customer = Customers::find($request["id"]);

        $customer->active = 0;
        
        $response = $customer->save();

        $data_user = DB::select("select user_id from customers_users where customer_id =".$request["id"]);

        $user_id = $data_user[0]->user_id;

        $user = Users::find($user_id);

        $user->active = 0;

        $response_2 = $user->save();

        if($response && $response_2){
            return array("status"=>true,"message"=>"Cliente dado de baja exitosamente.");
        }else{
            return array("status"=>false,"message"=>"Error al dar de baja cliente en la base de datos.");
        }
        
    }


}
