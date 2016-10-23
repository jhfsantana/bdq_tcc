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
				<td><form id="formAvaliacaoDisponivel" method="post" action="/aluno/avaliacao/online">
                		<input name="_token" type="hidden" value="{{ csrf_token() }}">
						<input type="hidden"  name="disciplina_id" value="{{$disciplinas->id}}"/>
						<input type="hidden"  name="turma_id" value="{{$turma->id}}">
						<button type="submit" name="avaliacoes" id="avaliacoes" class="btn btn-primary">
							<i class="glyphicon glyphicon-education"></i> {{$turma->nome}}
						</button>
					</form>
				</td>				
			@endforeach
		@endforeach
		</td>
	</table>
</div>
</body>
</html>