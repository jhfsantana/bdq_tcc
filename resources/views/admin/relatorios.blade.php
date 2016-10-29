<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="/css/bootstrap.css">	

	<title>Relatórios</title>
</head>
<body>
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
</div>
</body>
</html>