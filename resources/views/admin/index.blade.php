<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="/css/bootstrap.css">	
	<title>Home ADM</title>
</head>
<body>
	<nav class="navbar navbar-inverse">
			<a class="navbar-brand" href="/home">Inicio</a>
			<a class="navbar-brand" href="/professor/novo">Cadastro de professores</a>
			<a class="navbar-brand" href="/professores">Lista de Professores</a>
			<a class="navbar-brand" href="/disciplina/novo">Cadastro de disciplinas</a>
			<a class="navbar-brand" href="/disciplinas">Lista de Disciplinas</a>
			<a class="navbar-brand" href="/alunos">Lista de Alunos</a>
			<a class="navbar-brand" href="/aluno/novo">Cadastro de Alunos</a>
			<a class="navbar-brand" href="/turma/novo">Cadastro de Turma</a>


	</nav>
	<div class="container">
		<h1>Olá, {{Auth::guard('web_admins')->user()->name }}</h1>

		<form action="administrador/logout">
			<input type="submit" name="logout" value="logout">
		</form>

	</div>

</body>
</html>