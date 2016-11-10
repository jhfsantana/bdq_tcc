@extends('templates.admin.template')
	@section('scripts')
	<link rel="stylesheet" href="/css/global.css">	
	<link rel="stylesheet" href="/css/formularios.css">	
	<title>Detalhes</title>
	@stop

	@section('content')
	<br>
	<br>
	<br>
	<div style="text-align:center">
		<h1>Detalhe do aluno  - {{$aluno->nome}}</h1>	
	</div>

	<table class="table">
		<tr>
			<td><h3>Matricula: {{ $aluno->matricula}}</h3></td>
			<td><h3>{{ $aluno->email}}</h3></td>
			</tr>
		</table>
		

		<table class="table">
		@foreach($aluno->disciplinas as $disciplinas)
		<tr>
			<td>Disciplina:{{$disciplinas->nome}}</td>
			<td> Turma
				@foreach ($disciplinas->turmas as $turmas)
					<td>{{ $turmas->nome }}</td>

				@endforeach
			@endforeach
			</td>
	</table>
	@stop