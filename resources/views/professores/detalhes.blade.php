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
		<div class="container">
			<table class="table">
				<tr>
					<tr><h2>Professor(a): {{$professor->nome}}</h2></tr>
					<td><h3>Matricula: {{$professor->matricula}}</h3></td>
					<td><h3>E-mail: {{$professor->email}}</h3></td>
				</tr>
			</table>

			<table class="table">
				@foreach($professor->disciplinas as $disciplinas)
					<tr>
						<td>Disciplina:{{$disciplinas->nome}}</td>
						<td> Turma
							@foreach ($disciplinas->turmas as $turmas)
								<td>{{ $turmas->nome }}</td>
							@endforeach
				@endforeach
						</td>
		</table>
		</div>
</body>
</html>