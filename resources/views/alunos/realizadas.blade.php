@extends('templates.aluno.template')
	@section('head')
	<link rel="stylesheet" href="/css/global.css">		
	<link rel="stylesheet" href="/css/formularios.css">		
	<title>Avaliações realizadas</title>
	@stop
	@section('content')
	<br>
	<br>
	<br>


	<div style="text-align:center">
		<h1>Avaliações realizadas</h1>
		<br>
		<br>

		<div class="container">
			<table class="table table-bordered">
				@if(count($aluno->resultados) > 0)	
					@foreach($aluno->resultados as $resultado)
						<tr>
						<td><a href="/aluno/avaliacao/resultado/{{$resultado->avaliacao->id}}">
						{{$resultado->avaliacao->disciplina->nome}} - {{$resultado->avaliacao->turma->nome}}</a></td>
						</tr>
					@endforeach
				@else
					<div class="alert alert-warning">
						<h1>Não existe avaliação realizada</h1>
					</div>
				@endif
			</table>
		</div>

	</div>
	@stop