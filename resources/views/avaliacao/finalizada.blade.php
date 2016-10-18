<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="/css/bootstrap.css">	
	<title>Lista de avaliacoes</title>
</head>
<body>
	<nav class="navbar navbar-inverse">
	<a class="navbar-brand" href="/professor">Inicio</a>
	</nav>
<div class="container">
<h2 style="text-align: center;">Avaliação</h2>
<table class="table">
	<tr>
		<td>Professor(a):{{$avaliacao->professor->nome}}</td>
	</tr>

	<tr>
		<td>Disciplina:{{$avaliacao->disciplina->nome}}</td>
		<td>Data de criação:{{$avaliacao->created_at->format('d-m-Y')}}</td>
	</tr>
</table>

<?php $count=0; ?>

<table class="table">
	@foreach($avaliacao->questoes as $questao)
	<table>
		<tr>
			<td><h3>{{++$count}}) {{$questao->questao}}</h3></td>
		</tr>

		<tr>
			<td>a) {{$questao->alternativaA}}</td>
		</tr>

		<tr>
			<td>b) {{$questao->alternativaB}}</td>
		</tr>

		<tr>
			<td>c) {{$questao->alternativaC}}</td>
		</tr>

		<tr>
			<td>d) {{$questao->alternativaD}}</td>
		</tr>

		<tr>
			<td>e) {{$questao->alternativaE}}</td>
		</tr>
	</table>
	@endforeach
</table>
</body>
</html>