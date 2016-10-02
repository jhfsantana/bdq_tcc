<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="/css/bootstrap.css">	
	<title>Detalhes</title>
</head>
<body>
	<nav class="navbar navbar-inverse">
		<a class="navbar-brand" href="/home">Inicio</a>
	</nav>
	
	<div style="text-align:center">
		<h1>Detalhe do aluno  - {{$aluno->nome}}</h1>	
	</div>

	<table class="table">
		<tr>
			<td><h3>Matricula: {{ $aluno->matricula}}</h3></td>
			<td><h3>{{ $aluno->email}}</h3></td>
			</tr>
		</table>
		

		<table class="table">
		@foreach($aluno->disciplinas as $disciplinas)
		<tr>
			<td>Disciplina:{{$disciplinas->nome}}</td>
			<td> Turma
				@foreach ($disciplinas->turmas as $turmas)
					<td>{{ $turmas->nome }}</td>

				@endforeach
			@endforeach
			</td>
	</table>
</body>
</html>