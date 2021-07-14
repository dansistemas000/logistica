<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customers;
use App\Users;
use App\Customers_Users;
use DB;

class UpdateCustomerController extends Controller
{
	public function index(){

	}

    public function store(Request $request){

        $session = \Session::get('logistic_session_user');
        $id = $session["id"];
        $profile_id = $session["profile_id"];
 
        $customer_user = Customers_Users::where("customer_id", '=', $request["id"])->select("user_id")->first();

        if($profile_id == 3){
            $validate_user = DB::select("select * from customers where email = '".$request["email"]."' and id !=".$request["id"]." and company_id =".$id);
        }else{
            $validate_user = DB::select("select * from users where user ='".$request["email"]."' and id != ".$customer_user->user_id);
        }
       

        if($validate_user){
            return array("status"=>false,"message"=>"El usuario ".$request["email"]." ya pertenece a otro usuario, coloque otro correo electrónico.");
        }else{

            $customer = Customers::find($request["id"]);

            $customer->first_name = $request["first_name"];
            $customer->last_name = $request["last_name"];
            $customer->phone = $request["phone"];
            $customer->email = $request["email"];
            $customer->postal_code = $request["postal_code"];
            $customer->address = $request["address"];
            $response = $customer->save();

            $user = Users::find($customer_user->user_id);

            $user->user = $request["email"];

            $response_2 = $user->save();


            if($response && $response_2){
                return array("status"=>true,"message"=>"Cliente actializado exitosamente.");
            }else{
                return array("status"=>false,"message"=>"Error al actualizar en la base de datos.");
            }
        }
    }

}
