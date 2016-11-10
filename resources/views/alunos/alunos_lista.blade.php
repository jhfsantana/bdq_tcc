@extends('templates.admin.template')
	@section('scripts')
		<link type="text/css" rel="stylesheet" href="/css/global.css" />
		<link type="text/css" rel="stylesheet" href="/css/formularios.css" />
		<meta name="viewport" content="width=device-width, initial-scale: 1.0, user-scalabe=0"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	@stop
	
	@section('content')
	<br>
	<br>
	<br>
		<div style="text-align:center">
			<h1>Lista de Alunos</h1>

		<table class="table">
			@foreach($alunos as $aluno)
				<tr>
					<td>{{$aluno->matricula}}</td>
					<td>{{$aluno->nome}}</td>
					<td>{{$aluno->email}}</td>
					<td><a href="/aluno/detalhes/{{$aluno->id}}"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></td>
					<td><a href="/alunos/{{$aluno->id}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></td>
			@endforeach
				</tr>
		</table>
		</div>
	@stop