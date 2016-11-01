<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="/css/bootstrap.css">	
	<title>Lista de avaliacoes</title>
</head>
<body>
	<nav class="navbar navbar-inverse">
	<a class="navbar-brand" href="/aluno">Inicio</a>
	</nav>
<div class="container">
<h2 style="text-align: center;">Avaliação</h2>


@foreach($avaliacao as $avaliacao)
	<?php $count=0; ?>

<form action="/aluno/avaliacao/finalizada" method="post" form="avaliacao">
	<table class="table">
		@foreach($avaliacao->questoes as $questao)
		<table>
			<tr>
				<td>
					<div>
						<label>
							<h3>{{++$count}}) {{$questao->questao}}</h3>
						</label>
					</div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="radio">
						<label>
							<input type="radio" name="q{{$count}}" value="a"> a) {{$questao->alternativaA}}
							<input name="questao_id{{$count}}" type="hidden" value="{{ $questao->id }}">
						</label>
					</div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="radio">
						<label>
							<input type="radio" name="q{{$count}}" value="b"> b) {{$questao->alternativaB}}

						</label>
					</div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="radio">
						<label>
							<input type="radio" name="q{{$count}}" value="c"> c) {{$questao->alternativaC}}
						</label>
					</div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="radio">
						<label>
							<input type="radio" name="q{{$count}}" value="d"> d) {{$questao->alternativaD}}
						</label>
					</div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="radio">
						<label>
							<input type="radio" name="q{{$count}}" value="e"> e) {{$questao->alternativaE}}
						</label>
					</div>
				</td>
			</tr>
		</table>
		@endforeach
@endforeach


@if(!count($avaliacao))
	<div class="container">
		<div class="alert alert-warning" style="text-align: center;">
			<h1>Não existe avaliação para essa disciplina nesta turma</h1>
			<input class="btn btn-primary" type="hidden" name="finalizar" value="Finalizar">
		</div>
	</div>
@else
	<input class="btn btn-primary" type="submit" name="finalizar">
	<input type="hidden" name="avaliacao_id" value="{{$avaliacao->id}}">
	<input type="hidden" name="aluno_id" value="{{Auth::user()->id}}">
	<input type="hidden" name="professor_id" value="{{$avaliacao->professor_id}}">
	<input name="_token" type="hidden" value="{{ csrf_token() }}">

@endif
</form>
</table>
</body>
</html>