<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;
use DB;


class LoginController extends Controller
{
	public function index(){
		return view('index');
	}
    public function store(Request $request){


    	$data = Models::GET_USER($request["user"]);



    	if($data){
       
    		$password = $data[0]->PASSWORD;
    		$profile_id = $data[0]->PROFILE_ID;
    		$user = $data[0]->USER;
            $free_pay = $data[0]->FREE_PAY;
            $id = $data[0]->ID;
            $company = $data[0]->COMPANY;
            $level = $data[0]->LEVEL;
            $company_id = $data[0]->COMPANY_ID;

            if($level == 2){
                $id = $company_id;
            }

    		
    		if($this->validate_password($password,$request)){

                $user_data = ["profile_id" => $profile_id,
                                "user" => $user,
                                "id" => $id,
                                "company"=>$company,
                                "level" =>$level,
                                "company_id"=>$company_id,
                                "free_pay"=> $free_pay];

                if($profile_id == 2){
                    $customer_data = DB::select("select customer_id from customers_users where user_id =".$id);

                    $customer_id = $customer_data[0]->customer_id; 

                    $user_data["customer_id"] = $customer_id;
                }

    			
                
                $name_session = 'logistic_session_user';

                $lifetime = time() + 60 * 60 * 24 * 365;

                \Session::put($name_session,$user_data,$lifetime);

                return array("status"=>true, "redirect"=>"main");
    		}else{
                return array("status"=>false, "message"=>"El usuario o contraseña son incorrectos.");
    		}
    	}else{
            return array("status"=>false, "message"=>"El usuario o contraseña son incorrectos o tu cuenta esta desactivada.");
    	}
    }

    public function validate_password($password,$request){

 
        if($request["password"] == $password){
            return true;
        }else{
            return false;
        }
    }
}
