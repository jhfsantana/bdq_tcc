@extends('templates.professor.template')
	@section('head')
	<link rel="stylesheet" href="/css/global.css">	
	<link rel="stylesheet" href="/css/formularios.css">	
	<title>Lista de avaliacoes</title>
    @section('titulo')
            <i class="fa fa-book" title="Edit"></i>
         	AVALIAÇÃO
    @stop
	@section('content')
	<br>

		<div class="container">
		<h2 style="text-align: center;">Avaliação</h2>
		<table class="table">
			<tr>
				<td>Professor(a):{{$avaliacao->professor->nome}}</td>
			</tr>

			<tr>
				<td>Disciplina:{{$avaliacao->disciplina->nome}} / Turma: {{$avaliacao->turma->nome}}</td>
				<td>Data de criação:{{$avaliacao->created_at->format('d-m-Y')}}</td>
			</tr>
		</table>

		<?php $count=0; ?>

		<table class="table">
			@foreach($avaliacao->questoes as $questao)
				<table>
					<tr>
						<td><h5>{{++$count}}) {{$questao->questao}}</h5></td>
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
	@endsection
		</div>
