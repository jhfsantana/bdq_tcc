<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="/css/bootstrap.css">		
	<title>Avaliações realizadas</title>
</head>
<body>
	<nav class="navbar navbar-inverse">
		<a class="navbar-brand" href="/aluno">Inicio</a>
	</nav>
	<div style="text-align:center">
		<h1>Avaliações realizadas</h1>

		<div class="container">
			<table class="table table-bordered">
				@if(count($aluno->resultados) > 0)	
					@foreach($aluno->resultados as $resultado)
						<tr>
						<td><a href="/aluno/avaliacao/resultado/{{$resultado->avaliacao->id}}">
						{{$resultado->avaliacao->disciplina->nome}} - {{$resultado->avaliacao->turma->nome}}</a></td>
						</tr>
					@endforeach
				@else
					<div class="alert alert-warning">
						<h1>Não existe avaliação realizada</h1>
					</div>
				@endif
			</table>
		</div>

	</div>
</body>
</html>