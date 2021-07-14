<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Deliveries;
use DB;
use App\Models;
use Mpdf\Mpdf;


class DeliveryUpdateController extends Controller
{
	public function index(){

	}

    public function store(Request $request){


        $delivery = Deliveries::find($request["delivery-select"]);


        $delivery->status = "TERMINADO";

        $response = $delivery->save();

        $response_2 = DB::update("update routes set status ='FIRMADO', date_status ='".date('Y-m-d h:i')."' where delivery_id=".$request["delivery-select"]);

        $data_routes = DB::select("select id from routes where delivery_id=".$request["delivery-select"]);

        foreach ($data_routes as $key => $value) {
            $this->generate_pdfs($value->id);
        }


        if($response && $response_2){
            return array("status"=>true,"message"=>"Envio terminado  exitosamente.");
        }else{
            return array("status"=>false,"message"=>"Error al actualizar en la base de datos.");
        }
    }

    public function generate_pdfs($id){

        $data = Models::GET_DELIVERY_DATA($id);

        $data = $data[0];

        $delivery_id = $data->DELIVERY_ID;

        $session = \Session::get('logistic_session_user');
        $company = $session["company"];

        
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

    }

}
