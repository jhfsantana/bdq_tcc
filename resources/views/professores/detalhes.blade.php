@extends('templates.admin.template')
	@section('scripts')
	<link type="text/css" rel="stylesheet" href="/css/global.css" />
	<link type="text/css" rel="stylesheet" href="/css/formularios.css" />
	<meta name="viewport" content="width=device-width, initial-scale: 1.0, user-scalabe=0"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<title>Detalhes</title>
	@stop
	@section('content')
		<div class="container">
		<h3>Detalhes do professor(a) {{$professor->nome}}</h3> <br>
			<table class="table">
				<tr>
					<tr><h2>Professor(a): {{$professor->nome}}</h2></tr>
					<td><h3>Matricula: {{$professor->matricula}}</h3></td>
					<td><h3>E-mail: {{$professor->email}}</h3></td>
				</tr>
			</table>

			<table class="table">
				@foreach($professor->disciplinas as $disciplinas)
					<tr>
						<td>Disciplina:{{$disciplinas->nome}}</td>
						<td> Turma
							@foreach ($disciplinas->turmas as $turmas)
								<td>{{ $turmas->nome }}</td>
							@endforeach
				@endforeach
						</td>
		</table>
		</div>
	@stop