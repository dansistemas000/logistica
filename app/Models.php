<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;


//modelo de la tabla contenedores
class Models extends Model {

	static function GET_USER($user){
		$data = DB::select("SELECT ID, PROFILE_ID, USER, PASSWORD, FREE_PAY, COMPANY, COMPANY_ID, LEVEL  FROM USERS WHERE USER = ? and active = 1",[$user]);

		return $data;
    }

    static function GET_PROVIDERS(){
    	$data = DB::select("SELECT ID, NAME FROM PROVIDERS WHERE ACTIVE = 1");

    	return $data;
    }

    static function GET_PROVIDERS_COMPANY($company_id){
        $data = DB::select("SELECT ID, NAME FROM PROVIDERS WHERE ACTIVE = 1 AND COMPANY_ID = ".$company_id);

        return $data;
    }

    static function GET_PROVIDERS_INACTIVE(){
        $data = DB::select("SELECT ID, NAME FROM PROVIDERS WHERE ACTIVE = 0");

        return $data;
    }

    static function GET_PROVIDERS_INACTIVE_COMPANY($company_id){
        $data = DB::select("SELECT ID, NAME FROM PROVIDERS WHERE ACTIVE = 0 AND COMPANY_ID = ".$company_id);

        return $data;
    }

    static function GET_PRODUCTS(){
        $data = DB::select("SELECT ID, NAME FROM PRODUCTS WHERE ACTIVE = 1");

        return $data;
    }

    static function GET_PRODUCTS_COMPANY($company_id){
        $data = DB::select("SELECT P.ID, P.NAME FROM PRODUCTS AS P
                            INNER JOIN PROVIDERS AS PR
                            ON PR.ID = P.PROVIDER_ID
                            WHERE P.ACTIVE = 1 AND PR.COMPANY_ID = ".$company_id);

        return $data;
    }

    static function GET_PRODUCTS_QUANTITY(){
        $data = DB::select("SELECT ID, NAME FROM PRODUCTS WHERE ACTIVE = 1 AND QUANTITY > 0");

        return $data;
    }

    static function GET_PRODUCTS_QUANTITY_COMPANY($company_id){
        $data = DB::select("SELECT P.ID, P.NAME FROM PRODUCTS P
                            INNER JOIN PROVIDERS PR
                            ON PR.ID = P.PROVIDER_ID
                            WHERE P.ACTIVE = 1 AND P.QUANTITY > 0 AND PR.COMPANY_ID = ".$company_id);

        return $data;
    }

    static function GET_PRODUCTS_INACTIVE(){
        $data = DB::select("SELECT ID, NAME FROM PRODUCTS WHERE ACTIVE = 0");

        return $data;
    }

    static function GET_PRODUCTS_INACTIVE_COMPANY($company_id){
        $data = DB::select("SELECT P.ID, P.NAME FROM PRODUCTS AS P
                            INNER JOIN PROVIDERS AS PR
                            ON PR.ID = P.PROVIDER_ID
                            WHERE P.ACTIVE = 0 AND PR.COMPANY_ID = ".$company_id);

        return $data;
    }

    static function GET_CUSTOMERS(){
        $data = DB::select("SELECT ID, CONCAT(FIRST_NAME,' ',LAST_NAME) AS NAME FROM CUSTOMERS WHERE ACTIVE = 1");

        return $data;
    }

    static function GET_CUSTOMERS_COMPANY($company_id){
        $data = DB::select("SELECT ID, CONCAT(FIRST_NAME,' ',LAST_NAME) AS NAME FROM CUSTOMERS WHERE ACTIVE = 1 AND COMPANY_ID =".$company_id);

        return $data;
    }



    static function GET_CUSTOMERS_INACTIVE(){
        $data = DB::select("SELECT ID, CONCAT(FIRST_NAME,' ',LAST_NAME) AS NAME FROM CUSTOMERS WHERE ACTIVE = 0");

        return $data;
    }

    static function GET_CUSTOMERS_INACTIVE_COMPANY($company_id){
        $data = DB::select("SELECT ID, CONCAT(FIRST_NAME,' ',LAST_NAME) AS NAME FROM CUSTOMERS WHERE ACTIVE = 0 AND COMPANY_ID =".$company_id);

        return $data;
    }

    static function GET_PROVIDER_ID($id){
    	$data = DB::select("SELECT  NAME, DESCRIPTION FROM PROVIDERS WHERE ID= ?",[$id]);

    	return $data;
    }

    static function GET_PRODUCT_ID($id){
        $data = DB::select("SELECT  NAME, DESCRIPTION, QUANTITY, WEIGHT, PROVIDER_ID FROM PRODUCTS WHERE ID= ?",[$id]);

        return $data;
    }

    static function GET_CUSTOMER_ID($id){
        $data = DB::select("SELECT  ID, FIRST_NAME, LAST_NAME, PHONE, EMAIL, POSTAL_CODE, ADDRESS FROM CUSTOMERS WHERE ID= ?",[$id]);

        return $data;
    }

    static function GET_CUSTUMER_VALIDATE_DELIVERY($delivery_id,$customer_id){
        $data = DB::select("SELECT  *  FROM  ROUTES WHERE DELIVERY_ID= ? AND CUSTOMER_ID = ?",[$delivery_id,$customer_id]);

        return $data;
    }

    static function GET_QUANTITY_PRODUCT($id){
        $data = DB::select("SELECT  QUANTITY FROM PRODUCTS WHERE ID= ?",[$id]);

        return $data;
    }

    static function GET_ADDRESS($id){
        $data = DB::select("SELECT  ADDRESS FROM CUSTOMERS WHERE ID= ?",[$id]);

        return $data;
    }

     static function GET_DELIVERIES(){
        $data = DB::select("SELECT ID FROM DELIVERIES WHERE STATUS = 'PROCESO'");

        return $data;
    }

    static function GET_DELIVERIES_COMPANY($company_id){
        $data = DB::select("SELECT ID FROM DELIVERIES WHERE STATUS = 'PROCESO' AND COMPANY_ID = ".$company_id);

        return $data;
    }

    static function GET_LAST_POINT($id){
        $data = DB::select("SELECT POINT_B FROM ROUTES 
                                WHERE DELIVERY_ID = ?
                            AND ID = (SELECT MAX(ID) FROM ROUTES WHERE DELIVERY_ID = ?)",[$id,$id]);

        return $data;
    }

    static function GET_DELIVERY_ROUTES($id){
        $data = DB::select("SELECT ID, POINT_A, POINT_B, STATUS FROM ROUTES 
                                WHERE DELIVERY_ID = ?",[$id]);

        return $data;
    }

    static function GET_DELIVERIES_IN_ROUTE(){
        $data = DB::select("SELECT ID FROM DELIVERIES WHERE STATUS = 'EN RUTAS'");

        return $data;
    }

    static function GET_DELIVERIES_IN_ROUTE_COMPANY($company_id){
        $data = DB::select("SELECT ID FROM DELIVERIES WHERE STATUS = 'EN RUTAS' AND COMPANY_ID =".$company_id);

        return $data;
    }

    static function GET_DELIVERIES_IN_SIGNATURE(){
        $data = DB::select("SELECT ID FROM DELIVERIES WHERE STATUS = 'EN FIRMAS'");

        return $data;
    }

    static function GET_DELIVERIES_IN_SIGNATURE_COMPANY($company_id){
        $data = DB::select("SELECT ID FROM DELIVERIES WHERE STATUS = 'EN FIRMAS' AND COMPANY_ID =".$company_id);

        return $data;
    }

    static function GET_ROUTES_ADMIN(){
        $data = DB::select("SELECT R.ID AS ID, CONCAT('#',R.DELIVERY_ID) AS 'Número de envio', CONCAT('#',R.ID) AS 'Número de ruta', R.POINT_A AS 'Punto A', 
                            R.POINT_B AS 'Punto B',R.STATUS 'Estatus', R.DATE_STATUS AS 'FECHA ULTIMO ESTATUS',
                            P.NAME AS 'PRODUCTO',R.QUANTITY AS 'Cantidad producto', 
                            CONCAT(C.FIRST_NAME,' ',C.LAST_NAME) AS CLIENTE 
                            FROM ROUTES AS R
                            INNER JOIN PRODUCTS P
                                ON R.PRODUCT_ID = P.ID
                            INNER JOIN CUSTOMERS AS C
                            ON R.CUSTOMER_ID = C.ID");

        return $data;
    }

    static function GET_ROUTES_CUSTOMER($id){
        $data = DB::select("SELECT R.ID AS ID, CONCAT('#',R.ID) AS 'Número de envio', P.NAME AS 'PRODUCTO', 
                            R.QUANTITY AS 'Cantidad producto',
                            R.POINT_A AS 'Dirección de salida', 
                            R.POINT_B AS 'Dirección de entrega',R.STATUS 'Estatus', R.DATE_STATUS AS 'FECHA ULTIMO ESTATUS'
                            FROM ROUTES AS R
                            INNER JOIN PRODUCTS P
                                ON R.PRODUCT_ID = P.ID
                            INNER JOIN CUSTOMERS AS C
                            ON R.CUSTOMER_ID = C.ID WHERE R.CUSTOMER_ID = ".$id);

        return $data;
    }

    static function GET_ROUTES_COMPANY($company_id){
        $data = DB::select("SELECT R.ID AS ID, CONCAT('#',R.DELIVERY_ID) AS 'Número de envio', CONCAT('#',R.ID) AS 'Número de ruta', R.POINT_A AS 'Punto A', 
                            R.POINT_B AS 'Punto B',R.STATUS 'Estatus', R.DATE_STATUS AS 'FECHA ULTIMO ESTATUS',
                            P.NAME AS 'PRODUCTO',R.QUANTITY AS 'Cantidad producto', 
                            CONCAT(C.FIRST_NAME,' ',C.LAST_NAME) AS CLIENTE 
                            FROM ROUTES AS R
                            INNER JOIN PRODUCTS P
                                ON R.PRODUCT_ID = P.ID
                            INNER JOIN CUSTOMERS AS C
                            ON R.CUSTOMER_ID = C.ID
                            INNER JOIN PROVIDERS AS PR
                            ON PR.ID = P.PROVIDER_ID
                            WHERE PR.COMPANY_ID = ".$company_id);

        return $data;
    }

    static function GET_DELIVERY_DATA($id){
        $data = DB::select("SELECT R.ID AS ID, R.DELIVERY_ID AS DELIVERY_ID,
                            P.NAME AS PRODUCTO, 
                            R.QUANTITY AS CANTIDAD,
                            R.POINT_A AS POINT_A, 
                            R.POINT_B AS POINT_B,
                            R.STATUS AS  STATUS,
                            R.DATE_STATUS AS DATE_STATUS, 
                            V.NAME AS PROVEDOR,
                            CONCAT(C.FIRST_NAME,' ',C.LAST_NAME) AS CLIENTE
                            FROM ROUTES AS R
                            INNER JOIN PRODUCTS P
                                ON R.PRODUCT_ID = P.ID
                            INNER JOIN CUSTOMERS AS C
                            ON R.CUSTOMER_ID = C.ID
                            INNER JOIN PROVIDERS AS V
                            ON V.ID = P.PROVIDER_ID
                            WHERE R.ID = ".$id);

        return $data;
    }

}