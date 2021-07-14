<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customers;
use App\Users;
use App\Customers_Users;
use App\Http\Controllers\SendEmailController as SendEmail;

class AddCustomerController extends Controller
{
	public function index(){

	}

    public function store(Request $request){

        $session = \Session::get('logistic_session_user');
        $id = $session["id"];
        $profile_id = $session["profile_id"];
        $company = $session["company"];

        if($profile_id == 3){
            $user_validate = \DB::select("select * from customers where email = '".$request["email"]."' and company_id =".$id);
        }else{
            $user_validate = Users::where("user", '=', $request["email"])->first();
        }


        if($user_validate){
            return array("status"=>false,"message"=>"El usuario: ".$request["email"]." ya existe registrarse con otro correo electrónico.");
        }else{

            if($profile_id == 3){
                $request["company_id"] = $id;
            }

            $customer = new Customers();

            $response = $customer->create($request->all());

            $request["customer_id"] = $response->id;

            $user = new Users();

            $request["user"] = $request["email"];

            $request["profile_id"] = 2;

            $response_2 = $user->create($request->all());

            $request["user_id"] = $response_2->id;

            $customer_users = new Customers_Users();

            $response_3 = $customer_users->create($request->all());

            if($profile_id == 3){
                $subject = "Registro ".$company;
            }else{
                $subject = "Registro Logística AV Group";
            }

            $email_data = ["user"=>$request["email"],
                            "pass"=>$request["password"],
                            "company"=>$company,
                            "subject" => $subject,
                            "email" => $request["email"],
                            "view"=>"email_register"];

            $send = new SendEmail();

            $send->send_email($email_data);

            if($response && $response_2 && $response_3){
                return array("status"=>true,"message"=>"Cliente agregado exitosamente.");
            }else{
                return array("status"=>false,"message"=>"Error al insertar en la base de datos.");
            }
        }


        
        
    }

}
