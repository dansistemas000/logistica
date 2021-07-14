<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<style type="text/css">
		.big-text{
			font-size: 20px;
			font-weight: bold;
		}
		img{
			height: 140px;
		}
	</style>
</head>
<body>
	@if($data["company"] == "")
		<p class="big-text">REGISTRO A LOGÍSTICA AV GROUP</p>
		<img src="{{ $message->embed('images/email_logo.png') }}">
	@else
		<p class="big-text">REGISTRO A {{ $data["company"] }}</p>
	@endif
	<p>Hola usuario: <strong>{{ $data['user'] }}</strong></p>
	<p>
		Por medio de la presente te hago llegar tus datos de acceso para ingresar a  
		@if($data["company"] == "")
			Logística AV Group.
		@else
			{{ $data["company"] }}
		@endif
	</p>
	<p>Tus datos de acceso son:</p>
	<p><strong>Usuario: {{ $data['user'] }}</strong></p>
	<p><strong>Clave: {{ $data['pass'] }}</strong></p>
</body>
</html>