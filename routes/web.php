<?php

use Illuminate\Support\Facades\Route;
use App\Models;
use App\Http\Controllers\SendEmailController as SendEmail;
use App\Charts\SampleChart;
// use DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index',["type_navbar"=>"index"]);
});

Route::get('services', function () {
    return view('services',["type_navbar"=>"services"]);
});

Route::get('folder', function () {
    return view('folder',["type_navbar"=>"folder"]);
});

Route::get('team', function () {
    return view('team',["type_navbar"=>"team"]);
});

Route::get('contact', function () {
    return view('contact',["type_navbar"=>"contact"]);
});

Route::get('login', function () {
    return view('login');
});

Route::get('register', function () {
    return view('register');
});

Route::get('main', function () {

	if(\Session::get('logistic_session_user')){
        $session = \Session::get('logistic_session_user');
        $profile_id = $session["profile_id"];
        $free_pay = $session["free_pay"];
        $id = $session["id"];
        $company = $session["company"];
        $level = $session["level"];

        if($profile_id == 1){
            $data_routes = Models::GET_ROUTES_ADMIN();
        }elseif($profile_id == 3){
            $data_routes = Models::GET_ROUTES_COMPANY($id);
        }else{
            $customer_id = $session["customer_id"];
            $data_routes = Models::GET_ROUTES_CUSTOMER($customer_id);
        }

		return view('main',["profile_id"=>$profile_id,"free_pay"=>$free_pay,"id"=>$id,"data_routes"=>$data_routes,"company"=>$company,"level"=>$level]);
	}else{
		return view('index');
	}
    
});

Route::get('dashboard', function () {

    $session = \Session::get('logistic_session_user');
        $profile_id = $session["profile_id"];
        $free_pay = $session["free_pay"];
        $id = $session["id"];
        $company = $session["company"];
        $level = $session["level"];

        $status = [];
        $total_status = [];
        $colors_status = [];

        $products = [];
        $total_products = [];
        $colors_products = [];

        $employed = [];
        $total_employed = [];
        $colors_employed = [];

        $data_status = \DB::select("SELECT R.STATUS, COUNT(R.STATUS) AS TOTAL 
                                    FROM ROUTES AS R
                                    INNER JOIN DELIVERIES AS D
                                    ON D.ID = R.DELIVERY_ID
                                    WHERE D.COMPANY_ID = ".$id."
                            GROUP BY R.STATUS");

        if($data_status){
            foreach ($data_status as $key => $value) {
                array_push($status, $value->STATUS);
                array_push($total_status, $value->TOTAL);
                array_push($colors_status, "blue");
            }
        }else{
            array_push($status, "NO HAY DATOS DISPONIBLES");
            array_push($total_status, 0);
            array_push($colors_status, "gray");
        }

        $chart = new SampleChart();

        // Añadimos las etiquetas del eje X
        $chart->labels($status);

        $dataset = $chart->dataset("RUTAS DE ENVIOS", 'bar', $total_status);

        $dataset->backgroundColor($colors_status);

        $data_products = \DB::select("SELECT P.NAME AS NOMBRE, SUM(R.QUANTITY) AS TOTAL 
                                    FROM ROUTES AS R
                                        INNER JOIN PRODUCTS AS P
                                            ON R.PRODUCT_ID = P.ID
                                        INNER JOIN DELIVERIES AS D
                                            ON D.ID = R.DELIVERY_ID
                                        WHERE D.COMPANY_ID = ".$id."
                                    GROUP BY P.NAME");

         if($data_products){
            foreach ($data_products as $key => $value) {
                array_push($products, $value->NOMBRE);
                array_push($total_products, $value->TOTAL);
                array_push($colors_products, "green");
            }
        }else{
            array_push($products, "NO HAY DATOS DISPONIBLES");
            array_push($total_products, 0);
            array_push($colors_products, "gray");
        }


        $chart2 = new SampleChart();
 
        $chart2->labels($products);

        $dataset2 = $chart2->dataset("PRODUCTOS VENDIDOS", 'bar', $total_products);

        $dataset2->backgroundColor($colors_products);


        $data_employed = \DB::select("SELECT USER FROM USERS
                                        WHERE COMPANY_ID = ".$id." AND LEVEL = 2");

        if($data_employed){
            foreach ($data_employed as $key => $value) {
                array_push($employed, $value->USER);
                array_push($total_employed, rand(1,10)."0");
                array_push($colors_employed, "red");
            }
        }else{
            array_push($employed, "NO HAY DATOS DISPONIBLES");
            array_push($total_employed, 0);
            array_push($colors_employed, "gray");
        }

        $chart3 = new SampleChart();
 
        $chart3->labels($employed);

        $dataset3 = $chart3->dataset("PRODUCTIVIDAD EMPLEADOS", 'bar', $total_employed);

        $dataset3->backgroundColor($colors_employed);

        return view('main',["profile_id"=>$profile_id,"free_pay"=>$free_pay,"id"=>$id,"company"=>$company,"level"=>$level,"dashboard"=>true])->with(compact('chart'))->with(compact('chart2'))->with(compact('chart3'));

    
});


Route::get('pay/{id}', function ($id) {
    $response = \DB::update("update users set free_pay = 1 where id=".$id);

    if($response){
        $session = \Session::get('logistic_session_user');
        $session["free_pay"] = 1;
        \Session::put('logistic_session_user', $session);
        return array('status' =>true, 'message'=>'Pago exitoso disfrute de la versión completa de AV GROUP');
    }else{
        return array('status' =>false, 'message'=>'Problemas con el pago intente mas tarde.');
    }
});

Route::get('unsubscribe/{id}/{customer_id}/', function ($id,$customer_id) {
    $response = \DB::update("update users set active = 0 where id=".$id);

    $response_2 = \DB::update("update customers set active = 0 where id=".$customer_id);

    if($response && $response_2){
         return array('status' =>true, 'message'=>'Dado de baja exitosamente');
    }else{
        return array('status' =>false, 'message'=>'Problemas al dar de baja.');
    }
});



Route::resource('login_access', 'LoginController');

Route::resource('add_provider', 'AddProviderController');

Route::resource('update_provider', 'UpdateProviderController');

Route::resource('delete_provider', 'DeleteProviderController');

Route::resource('active_provider', 'ActiveProviderController');

Route::resource('add_product', 'AddProductController');

Route::resource('update_product', 'UpdateProductController');

Route::resource('delete_product', 'DeleteProductController');

Route::resource('active_product', 'ActiveProductController');

Route::resource('add_customer', 'AddCustomerController');


Route::resource('update_customer', 'UpdateCustomerController');

Route::resource('add_passupdate', 'PassUpdateController');

Route::resource('delete_customer', 'DeleteCustomerController');

Route::resource('active_customer', 'ActiveCustomerController');

Route::resource('add_delivery', 'AddDeliveryController');

Route::resource('add_route', 'AddRouteController');

Route::resource('active_delivery', 'ActiveDeliveryController');

Route::resource('modal_signature', 'SignatureController');

Route::resource('delivery_update', 'DeliveryUpdateController');

Route::resource('add_user_company', 'AddUserCompanyController');

Route::resource('add_employed', 'AddEmployedController');


Route::get('session_close', function () {
	\Session::forget('logistic_session_user');

    return view('index');
});



Route::get('user_main/{view}', function ($view) {
    switch ($view) {
        case 'form_provider_update':
            $session = \Session::get('logistic_session_user');
            $profile_id = $session["profile_id"];
            $id = $session["id"];
            if($profile_id == 3){
                $data = Models::GET_PROVIDERS_COMPANY($id);
            }else{
                $data = Models::GET_PROVIDERS();
            }
            return view($view,["data"=>$data]);
        break;
        case 'form_provider_delete':
            $session = \Session::get('logistic_session_user');
            $profile_id = $session["profile_id"];
            $id = $session["id"];
            if($profile_id == 3){
                $data = Models::GET_PROVIDERS_COMPANY($id);
            }else{
                $data = Models::GET_PROVIDERS();
            }
            return view($view,["data"=>$data]);
        break;
        case 'form_provider_active':
            $session = \Session::get('logistic_session_user');
            $profile_id = $session["profile_id"];
            $id = $session["id"];
            if($profile_id == 3){
                $data = Models::GET_PROVIDERS_INACTIVE_COMPANY($id);
            }else{
                $data = Models::GET_PROVIDERS_INACTIVE();
            }
            return view($view,["data"=>$data]);
        break;
        case 'form_product_add':
            $session = \Session::get('logistic_session_user');
            $profile_id = $session["profile_id"];
            $id = $session["id"];
            if($profile_id == 3){
                $data = Models::GET_PROVIDERS_COMPANY($id);
            }else{
                $data = Models::GET_PROVIDERS();
            }
            return view($view,["data"=>$data]);
        break;
        case 'form_product_update':
            $session = \Session::get('logistic_session_user');
            $profile_id = $session["profile_id"];
            $id = $session["id"];
            if($profile_id == 3){
                $provider_data = Models::GET_PROVIDERS_COMPANY($id);
                $data = Models::GET_PRODUCTS_COMPANY($id);
            }else{
                $data = Models::GET_PRODUCTS();
                $provider_data = Models::GET_PROVIDERS();
            }
            
            return view($view,["data"=>$data,"provider_data"=>$provider_data]);
        break;
        case 'form_product_delete':
            $session = \Session::get('logistic_session_user');
            $profile_id = $session["profile_id"];
            $id = $session["id"];
            if($profile_id == 3){
                $data = Models::GET_PRODUCTS_COMPANY($id);
            }else{
                $data = Models::GET_PRODUCTS();
            }
            return view($view,["data"=>$data]);
        break;
        case 'form_product_active':
            $session = \Session::get('logistic_session_user');
            $profile_id = $session["profile_id"];
            $id = $session["id"];
            if($profile_id == 3){
                $data = Models::GET_PRODUCTS_INACTIVE_COMPANY($id);
            }else{
                $data = Models::GET_PRODUCTS_INACTIVE();
            }
            return view($view,["data"=>$data]);
        break;
        case 'form_customer_update':
            $session = \Session::get('logistic_session_user');
            $profile_id = $session["profile_id"];
            $id = $session["id"];
            if($profile_id == 3){
                $data = Models::GET_CUSTOMERS_COMPANY($id);
            }else{
                $data = Models::GET_CUSTOMERS();
            }
            return view($view,["data"=>$data]);
        break;
        case 'form_update_data':
            $session = \Session::get('logistic_session_user');
            $customer_id = $session["customer_id"];
            $data = Models::GET_CUSTOMER_ID($customer_id);

            $data = $data[0];
            return view($view,["data"=>$data]);
        break;
        case 'form_account_delete':
            $session = \Session::get('logistic_session_user');
            $id = $session["id"];
            $customer_id = $session["customer_id"];
            return view($view,["id"=>$id,"customer_id"=>$customer_id]);
        break;
        case 'form_pass_update':
            $session = \Session::get('logistic_session_user');
            $id = $session["id"];
            return view($view,["id"=>$id]);
        break;
        case 'form_customer_delete':
            $session = \Session::get('logistic_session_user');
            $profile_id = $session["profile_id"];
            $id = $session["id"];
            if($profile_id == 3){
                $data = Models::GET_CUSTOMERS_COMPANY($id);
            }else{
                $data = Models::GET_CUSTOMERS();
            }
            return view($view,["data"=>$data]);
        break;
        case 'form_customer_active':
            $session = \Session::get('logistic_session_user');
            $profile_id = $session["profile_id"];
            $id = $session["id"];
            if($profile_id == 3){
                $data = Models::GET_CUSTOMERS_INACTIVE_COMPANY($id);
            }else{
                $data = Models::GET_CUSTOMERS_INACTIVE();
            }
            return view($view,["data"=>$data]);
        break;
        case 'form_add_delivery':
            $session = \Session::get('logistic_session_user');
            $profile_id = $session["profile_id"];
            $id = $session["id"];
            if($profile_id == 3){
                $customer_data = Models::GET_CUSTOMERS_COMPANY($id);
                $product_data = Models::GET_PRODUCTS_QUANTITY_COMPANY($id);
            }else{
                $customer_data = Models::GET_CUSTOMERS();
                $product_data = Models::GET_PRODUCTS_QUANTITY();
            }
            
            return view($view,["customer_data"=>$customer_data,"product_data"=>$product_data]);
        break;
        case 'form_add_routes':
            $session = \Session::get('logistic_session_user');
            $profile_id = $session["profile_id"];
            $id = $session["id"];
            if($profile_id == 3){
                $customer_data = Models::GET_CUSTOMERS_COMPANY($id);
                $product_data = Models::GET_PRODUCTS_QUANTITY_COMPANY($id);
                $delivery_data = Models::GET_DELIVERIES_COMPANY($id);
            }else{
                $delivery_data = Models::GET_DELIVERIES();
                $customer_data = Models::GET_CUSTOMERS();
                $product_data = Models::GET_PRODUCTS_QUANTITY();
            }
            
            return view($view,["delivery_data"=>$delivery_data,"customer_data"=>$customer_data,"product_data"=>$product_data]);
        break;
        case 'form_active_delivery':
            $session = \Session::get('logistic_session_user');
            $profile_id = $session["profile_id"];
            $id = $session["id"];
            if($profile_id == 3){
                $delivery_data = Models::GET_DELIVERIES_COMPANY($id);
            }else{
                $delivery_data = Models::GET_DELIVERIES();
            }
            
            return view($view,["delivery_data"=>$delivery_data]);
        break;
        case 'form_routes_update':
            $session = \Session::get('logistic_session_user');
            $profile_id = $session["profile_id"];
            $id = $session["id"];
            if($profile_id == 3){
                $delivery_data = Models::GET_DELIVERIES_IN_ROUTE_COMPANY($id);
            }else{
                $delivery_data = Models::GET_DELIVERIES_IN_ROUTE();
            }
            
            return view($view,["delivery_data"=>$delivery_data]);
        break;
        case 'form_table_routes':
            $session = \Session::get('logistic_session_user');
            $profile_id = $session["profile_id"];
            $id = $session["id"];
            $company = $session["company"];
            if($profile_id == 1){
                $data_routes = Models::GET_ROUTES_ADMIN();
            }elseif($profile_id == 3){
                $data_routes = Models::GET_ROUTES_COMPANY($id);
            }else{
                $customer_id = $session["customer_id"];
                $data_routes = Models::GET_ROUTES_CUSTOMER($customer_id);
            }
            
            return view($view,["data_routes"=>$data_routes,"profile_id"=>$profile_id,"company"=>$company]);
        break;
        case 'form_delivery_location':
            $session = \Session::get('logistic_session_user');
            $profile_id = $session["profile_id"];
            $id = $session["id"];
            if($profile_id == 3){
                $delivery_data = Models::GET_DELIVERIES_IN_ROUTE_COMPANY($id);
            }else{
                $delivery_data = Models::GET_DELIVERIES_IN_ROUTE();
            }
            
            return view($view,["delivery_data"=>$delivery_data]);
        break;
        case 'form_delivery_update':
            $session = \Session::get('logistic_session_user');
            $profile_id = $session["profile_id"];
            $id = $session["id"];
            if($profile_id == 3){
                $delivery_data = Models::GET_DELIVERIES_IN_SIGNATURE_COMPANY($id);
            }else{
                $delivery_data = Models::GET_DELIVERIES_IN_SIGNATURE();
            }
            
            return view($view,["delivery_data"=>$delivery_data]);
        break;
        case 'form_add_employed':
            $session = \Session::get('logistic_session_user');
            $id = $session["id"];
            $company = $session["company"];
            return view($view,["id"=>$id,"company"=>$company]);
        break;
        case 'dashboard':
            $chart = new SampleChart();
            
            // Añadimos las etiquetas del eje X
            $chart->labels(['One', 'Two', 'Three']);

            $chart->dataset('My dataset 1', 'bar', [1, 2, 3]);
            

            return view('dashboard', compact('chart'));

        break;
        default:
            return view($view);
        break;
    }
});

Route::get('search_provider/{id}/', function ($id) {
    $data = Models::GET_PROVIDER_ID($id);

    $data = $data[0];

    return (Array)$data;
});

Route::get('get_quantity/{id}/', function ($id) {
    $data = Models::GET_QUANTITY_PRODUCT($id);

    $data = $data[0];

    return (Array)$data;
});

Route::get('get_address/{id}/', function ($id) {
    $data = Models::GET_ADDRESS($id);

    $data = $data[0];

    return (Array)$data;
});

Route::get('get_last_point/{id}/', function ($id) {
    $data = Models::GET_LAST_POINT($id);

    $data = $data[0];

    return (Array)$data;
});

Route::get('update_route/{id}/{delivery_id}/', function ($id,$delivery_id) {
    try{

        $response = \DB::update("update routes set status='ENTREGADO', date_status='".date('Y-m-d h:i')."' where id=".$id);

        if($response){

            $data_routes = \DB::select("select max(id) as id from routes where delivery_id = ".$delivery_id);

            $data_routes = $data_routes[0];

            if($data_routes->id == $id){
                $response = \DB::update("update deliveries set status='EN FIRMAS' where id=".$delivery_id);

                if(!$response){
                    return array('status' => false,'message'=>"Error al actualizar el envio.");
                }
            }

            $data_customer = \DB::select("select c.email from routes as r 
                                        inner join customers as c
                                        on r.customer_id = c.id
                                        where r.id =".$id);

            $data_customer = $data_customer[0];

            $session = \Session::get('logistic_session_user');
            $company = $session["company"];

            $email_data = ["subject" => 'Su paquete fue entregado de Logística AV Group',
                            "email" => $data_customer->email,
                            "id_route"=>$id,
                            "company"=>$company,
                            "user"=>$data_customer->email,
                            "view"=>"email_delivery"];

            $send = new SendEmail();

            $send->send_email($email_data);

            return array('status' => true,'message'=>"Estatus actualizado exitosamente.");
        }else{
            return array('status' => false,'message'=>"Error al actualizar estatus.");
        }

    } catch (\Exception $ex) {
        return array('status' => false, 'message'=>"Error: ".$ex->getMessage());
    }
    
});




Route::get('search_product/{id}/', function ($id) {
    $data = Models::GET_PRODUCT_ID($id);

    $data = $data[0];

    return (Array)$data;
});

Route::get('search_customer/{id}/', function ($id) {
    $data = Models::GET_CUSTOMER_ID($id);

    $data = $data[0];

    return (Array)$data;
});

Route::get('get_routes_detail/{id}/', function ($id) {
    $data = Models::GET_DELIVERY_ROUTES($id);

    return (Array)$data;
});

