<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="/css/bootstrap.css">		
	<title>RESULTADO</title>
</head>
<body>
	<nav class="navbar navbar-inverse">
		<a class="navbar-brand" href="/aluno">Inicio</a>
	</nav>
	<div style="text-align:center">
		<h1>RESULTADO</h1>

		<div class="container">
			@foreach($aluno->resultados as $resultado)
				@if($aluno->nota >= 6)
					<div class="alert alert-success">
						<h1>Você tirou <i>{{$resultado->nota}}</i> na PROVA</h1>
					</div>
				@else
					<div class="alert alert-danger">
						<h1>Você tirou <i>{{$resultado->nota}}</i> na PROVA</h1>
					</div>
				@endif
			@endforeach
		</div>
	</div>
</body>
</html>