<?php

namespace App\Http\Controllers;

use Mpdf\Mpdf;
use App\Models;
use DB;


class SignatureController extends Controller
{

    public function show($id){  

        $data = Models::GET_DELIVERY_DATA($id);

        $data = $data[0];

        $delivery_id = $data->DELIVERY_ID;

        $company = "";


        $session = \Session::get('logistic_session_user');
        $company_id = $session["company_id"];

        if($company_id != 0){
            $company = \DB::select("select company from users where id =".$company_id." and level = 1");

            if($company){
                $company = $company[0]->company;
            }
        }

 
        $mpdf = new Mpdf(['default_font' => 'arial',
                        "format" => "Letter",
                        'mode' => 'utf-8',
                        'orientation' => "P",
                        'default_font_size' => 13,
                        'margin_right' => 10,
                        'margin_left' => 10,
                        "margin_top"=>10,
                        "margin_bottom" =>10,
                        'margin_footer'=>5,
                        "margin_header"=>5
                        ]);


        $html = view("pdf_signature",["id"=>$id,"data"=>$data,"company"=>$company])->render();

        $name = $id."_document.pdf";

        $path = public_path()."/documents/".$name;

        $mpdf->WriteHTML($html);

        $mpdf->Output($path,"F");

        $response = DB::insert("insert into documents (route_id,document_path) values (".$id.",'".$name."')");

        $response_2 = DB::update("update routes set status='FIRMADO', date_status='".date('Y-m-d h:i')."' where id=".$id);

        $total_routes = DB::select("select count(*) as conteo from routes where delivery_id = ".$delivery_id);

        $total_signature = DB::select("select count(*) as conteo from routes where status = 'FIRMADO' and delivery_id = ".$delivery_id);

        $total_routes = $total_routes[0]->conteo;

        $total_signature = $total_signature[0]->conteo;

        if($total_routes == $total_signature){
            $response = DB::update("update deliveries set status='TERMINADO' where id=".$delivery_id);
        }


        if($response && $response_2){
            return array('status' => true, 'url'=>'documents/'.$name);
        }else{
            return array('status' => false, 'url'=>'');
        }

    }

}