<?php

namespace App\Http\Controllers;
use DB;
// controlador para enviar correo electronico
class SendEmailController extends Controller
{
    public function send_email($data){
        try {
            \Mail::send($data["view"], ["data"=>$data], function($message) use ($data)
            {
                $message->from('logistica.av.group@gmail.com', 'Logistica AV Group');
                $message->subject($data["subject"]);
                $message->to($data["email"]);
            });


            return true;
        } catch (\Exception $ex) {

            return false;
        }
    }
}