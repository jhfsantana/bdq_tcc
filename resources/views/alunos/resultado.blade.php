@extends('templates.aluno.template')
	@section('head')
	<link rel="stylesheet" href="/css/gloabal.css">		
	<link rel="stylesheet" href="/css/formularios.css">		
	<title>RESULTADO</title>
	@stop
	@section('content')
	<br>
	<br>
	<br>
	<br>
	<div style="text-align:center">
		<h1>RESULTADO</h1>

		<div class="container">
			@if($avaliacao->resultado->nota >= 5)
			<div class="alert alert-success" style="background-color: #FFFFFF; border: none;">
				<h1><i>Sua nota foi {{$avaliacao->resultado->nota}}</i> na avaliação de {{$avaliacao->disciplina->nome}} turma {{$avaliacao->turma->nome}}</h1>
			</div>
			@else
			<div class="alert alert-danger" style="background-color: #FFFFFF; border: none;">
					<h1>Sua nota foi <i>{{$avaliacao->resultado->nota}}</i> na avaliação de {{$avaliacao->disciplina->nome}} turma {{$avaliacao->turma->nome}}</h1>
			</div>
			@endif
		</div>
	</div>
	@stop