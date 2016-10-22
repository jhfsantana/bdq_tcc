<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="/css/bootstrap.css">	

	<title>Avaliacoes</title>
</head>
<body>					


<div class="container">
	<h2>Aluno: {{Auth::user()->nome}}</h2>
</div>

<div class="container">
	<table class="table">
		@foreach($aluno->disciplinas as $disciplinas)
			<tr>
			<td>Disciplina:{{$disciplinas->nome}}</td>
			@foreach ($disciplinas->turmas as $turma)
				<td><a href="/aluno/avaliacao/online/{{$turma->id}}"> {{ $turma->nome }}</a></td>
			@endforeach
		@endforeach
		</td>
	</table>
</div>
</body>
</html>