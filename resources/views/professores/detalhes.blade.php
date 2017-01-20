@extends('templates.admin.template')
	@section('scripts')
	<link type="text/css" rel="stylesheet" href="/css/global.css" />
	<meta name="viewport" content="width=device-width, initial-scale: 1.0, user-scalabe=0"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

	<title>Detalhes</title>
	@stop
	@section('content')
	<br>
	<br>
	<br>
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

  <div class="details">
  <div class="details-header">
    <div class="details-photo">
      <div class="details-pic">
        <a href="#">
          <div class="button-position"></div>
        </a>
      </div>
    </div>
  </div>
</div>

<div class="info">
</div>
	@stop