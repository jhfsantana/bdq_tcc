@extends('templates.admin.template')
	@section('scripts')
	<link type="text/css" rel="stylesheet" href="/css/global.css" />
	<link type="text/css" rel="stylesheet" href="/css/formularios.css" />
	<meta name="viewport" content="width=device-width, initial-scale: 1.0, user-scalabe=0"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>	<title>Lista de disciplinas</title>
	@stop
	@section('content')
	<br>
	<br>
	<br>
	<div class="container">
		<h2 style="text-align: center;">Lista de disciplinas</h2>
		<br>
		<table class="table table-striped">
		@foreach ($disciplinas as $disciplina)
		<tr>
			<td>Disciplina: {{ $disciplina->nome }}</td>
			<td>Turma: </td>
				@foreach ($disciplina->turmas as $turma)
					<td>{{ $turma->nome }}</td>
				@endforeach
			
		</tr>
		@endforeach
		</table>
	</div>
	@stop