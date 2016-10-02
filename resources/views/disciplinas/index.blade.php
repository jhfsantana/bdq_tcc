<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="/css/bootstrap.css">	
	<title>Lista de disciplinas</title>
</head>
<body>
	<nav class="navbar navbar-inverse">
			<a class="navbar-brand" href="/home">Inicio</a>
			<a class="navbar-brand" href="/professores/novo">Cadastro de professores</a>
			<a class="navbar-brand" href="/disciplina/novo">Cadastro de disciplinas</a>
			<a class="navbar-brand" href="/disciplinas">Lista de Disciplinas</a>
	</nav>
	<div class="container">
		<h1>Lista de disciplinas</h1>
		<table class="table">
		<td> <h3>Disciplina</h3></td>
		<td><h3> Turma </h3> </td>
		@foreach ($disciplinas as $disciplina)
		<tr>
			<td>Disciplina: {{ $disciplina->nome }}</td>
			<td>Turma: </td>
				@foreach ($disciplina->turmas as $turma)
					<td>{{ $turma->nome }}</td>
				@endforeach
			
		</tr>
		@endforeach
		</table>
	</div>
</body>
</html>