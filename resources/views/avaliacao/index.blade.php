@extends('templates.professor.template')
	@section('head')
		<link rel="stylesheet" href="/css/global.css">
		<link rel="stylesheet" href="/css/formularios.css">
		<title>Avaliacao</title>
	@stop
	
	@section('content')
	<br>
	<br>
	<br>
		<div class="container">
			<h2 style="text-align: center;">Avaliações criadas</h2>
			<br>
			<br>
		<?php $count=0; ?>
			<table class="table table-striped">
				<tr>
					<td style="text-align: center;"> <strong>ID</strong></td>
					<td style="text-align: center;"> <strong>Disciplina</strong></td>
					<td style="text-align: center;"> <strong>Turma</strong></td>
					<td style="text-align: center;"> <strong>Visualizar</strong></td>
				</tr>
				@foreach($avaliacoes as $avaliacoes)
					<tr>
						<td style="text-align: center;">
							{{$avaliacoes->id}}
						</td>
						
						<td style="text-align: center;">
							{{$avaliacoes->disciplina->nome}}
						</td>
						
						<td style="text-align: center;">
							{{$avaliacoes->turma->nome}}
						</td>

						<td style="text-align: center;"><a href="finalizada/{{$avaliacoes->id}}"><img style="display: block;margin-right: auto;margin-left: auto;" src="/images/search.png"></a></td>
					</tr>
				@endforeach
			</table>
		</div>
	@stop