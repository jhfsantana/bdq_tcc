<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="/css/bootstrap.css">		
	<title>Lista de Alunos</title>
</head>
<body>
	<nav class="navbar navbar-inverse">
		<a class="navbar-brand" href="/home">Inicio</a>
	</nav>
	<div style="text-align:center">
		<h1>Lista de Alunos</h1>

	<table class="table">
		@foreach($alunos as $aluno)
			<tr>
				<td>{{$aluno->matricula}}</td>
				<td>{{$aluno->nome}}</td>
				<td>{{$aluno->email}}</td>
				<td><a href="/aluno/detalhes/{{$aluno->id}}"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></td>
				<td><a href="/alunos/{{$aluno->id}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></td>
		@endforeach
			</tr>
	</table>
	</div>
</body>
</html>