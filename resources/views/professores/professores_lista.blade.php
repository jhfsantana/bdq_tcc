<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="/css/bootstrap.css">	
	<title>Lista de Professores</title>
</head>
<body>
	<nav class="navbar navbar-inverse">
			<a class="navbar-brand" href="/home">Inicio</a>
			<a class="navbar-brand" href="/turma/novo">Lista de Professores</a>
			<a class="navbar-brand" href="/professor/novo">Cadastro de professores</a>
			<a class="navbar-brand" href="/disciplina/novo">Cadastro de disciplinas</a>
			<a class="navbar-brand" href="/disciplinas">Lista de Disciplinas</a>
			<a class="navbar-brand" href="/alunos">Lista de Alunos</a>
			<a class="navbar-brand" href="/aluno/novo">Cadastro de Alunos</a>
			<a class="navbar-brand" href="/turma/novo">Cadastro de Turma</a>



	</nav>
	<div class="container">
		<table class="table">
			@foreach($professores as $professor)
				<tr>
					<td>{{$professor->enrollment}}</td>
					<td>{{$professor->name}}</td>
					<td>{{$professor->email}}</td>
					<td><a href="/professor/detalhes/{{$professor->id}}"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></td>
					<td><a href="/professores/{{$professor->id}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></td>

				</tr>
			@endforeach
		</table>	
	</div>
</body>
</html>