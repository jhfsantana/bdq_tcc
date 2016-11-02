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
			@if($avaliacao->resultado->nota >= 5)
			<div class="alert alert-success" style="background-color: #FFFFFF; border: none;">
				<h1><i>Sua nota foi {{$avaliacao->resultado->nota}}</i> na avaliação de {{$avaliacao->disciplina->nome}}</h1>
			</div>
			@else
			<div class="alert alert-danger" style="background-color: #FFFFFF; border: none;">
					<h1>Sua nota foi <i>{{$avaliacao->resultado->nota}}</i> na avaliação de {{$avaliacao->disciplina->nome}}</h1>
			</div>
			@endif
		</div>
	</div>
</body>
</html>