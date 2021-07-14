<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initlal-scale=1">
    </head>
    <style>
    	.logo{
            width: 80px;
        }

        .table{
            border-collapse: none;
            width: 100%;
        }
        .table td{
            border: 1px solid;
            padding: 8px;
        }
    </style>
    <body>
        <fieldset class="bienvenida">
            <div style="float: left; width: 50%; height: 50px;">
                @if($company == "")
                    <img class= "logo" src="images/email_logo.png" alt="">
                @endif
            </div>
            <div style="float: left; width: 50%; height: 50px; text-align: right; padding-top: 20px;">
                Fecha: {{ date('d-m-Y') }}
            </div>
            <div style="font-size: 22px; color: red; width: 100%; text-align: center;">
                @if($company == "")
                    <b>AV Group Logística</b>
                @else
                    <b>{{ $company }}</b>
                @endif
                
            </div>
            <div style="padding-top: 30px;">
                <table class="table">
                    <tr>
                        <td style="background-color: #e8e5e5;">
                            No. envio
                        </td>
                        <td>
                            <b>{{ $data->ID }}</b>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: #e8e5e5;">
                            Cliente
                        </td>
                        <td>
                            <b>{{ $data->CLIENTE }}</b>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: #e8e5e5;">
                            Producto
                        </td>
                        <td>
                            <b>{{ $data->PRODUCTO }}</b>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: #e8e5e5;">
                            Cantidad producto
                        </td>
                        <td>
                            <b>{{ $data->CANTIDAD }}</b>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: #e8e5e5;">
                            Provedor
                        </td>
                        <td>
                            <b>{{ $data->PROVEDOR }}</b>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: #e8e5e5;">
                            Dirección de salida
                        </td>
                        <td>
                            <b>{{ $data->POINT_A }}</b>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: #e8e5e5;">
                            Dirección de entrega
                        </td>
                        <td>
                            <b>{{ $data->POINT_B }}</b>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: #e8e5e5;">
                            Fecha entrega
                        </td>
                        <td>
                            <b>{{ $data->DATE_STATUS }}</b>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: #e8e5e5;">
                            Estatus
                        </td>
                        <td>
                            <b>{{ $data->STATUS }}</b>
                        </td>
                    </tr>
                </table>
            </div>
            <div style="width: 100%; padding-top: 200px; text-align: center;">
                <div style="border-bottom: 1px solid; width: 250px; margin: 0 auto;"></div>
                Firma de entregado
            </div>
        	
        	
       	</fieldset>
    </body>
</html>