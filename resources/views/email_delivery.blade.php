<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<style type="text/css">
		.big-text{
			font-size: 20px;
			font-weight: bold;
		}
		.logo{
			height: 140px;
		}
		.delivery{
			height: 200px;
		}
	</style>
</head>
<body>
	
	@if($data["company"] == "")
		<p class="big-text">PAQUETE ENTREGADO</p>
		<img class='logo' src="{{ $message->embed('images/email_logo.png') }}">
	@else
		<p class="big-text">PAQUETE ENTREGADO DE {{ strtoupper($data["company"]) }}</p>
	@endif
	
	<p>Hola usuario: <strong>{{ $data['user'] }}</strong></p>
	<p>
		Su paquete con el número: <strong>#{{ $data['id_route'] }}</strong> fue entregado a su domicilio, favor de entrar a la siguiente liga para firmar de recibido: http://localhost/logistica/public/login
	</p>
	<img class="delivery" src="{{ $message->embed('images/delivery.jpg') }}">
</body>
</html>