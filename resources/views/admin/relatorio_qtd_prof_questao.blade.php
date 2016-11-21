<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/css/global.css">
	<link rel="stylesheet" href="/css/formularios.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<title>Relatórios</title>
</head>
<body>
<nav class="navbar navbar-inverse">
	<a class="navbar-brand" href="/home">Inicio</a>
	<ul class="nav navbar-nav">
      <li><a href="/relatorio/questao">Questões</a></li>
      <li><a href="/relatorio/">Professores</a></li> 
      <li><a href="/relatorio/notas/1">Notas</a></li> 
    </ul>
</nav>
<div class="container" style="text-align: center;">
	<h1>Relatórios</h1>

	<table class="table table-striped">
		
	<tr>
		<td><strong>Matricula</strong></td>
		<td><strong>Nome</strong></td>
		<td><strong>Email</strong></td>
		<td><strong>Disciplina</strong></td>
		<td><strong>Total de Questoes</strong></td>
	</tr>
		@foreach($professores_top_questao as $professores)
		<tr>
			<td>{{$professores->matricula}}</td>
			<td>{{$professores->nome}}</td>
			<td>{{$professores->email}}</td>
			<td>{{$professores->disciplina_nome}}</td>
			<td>{{$professores->total_questoes}}</td>
		</tr>
		@endforeach
	</table>
</body>
</html>