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

<!-- 		<div class="container">
			<table class="table table-bordered">
				@if(count($aluno->resultados) > 0)	
					@foreach($aluno->resultados as $resultado)
						<tr>
							<td><a href="/aluno/avaliacao/resultado/{{$resultado->avaliacao->id}}">
						{{$resultado->avaliacao->disciplina->nome}} - {{$resultado->avaliacao->turma->nome}}</a></td>
						</tr>
						<tr>
							<td>
								{{date_format($resultado->created_at, 'd-m-Y h:m:s')}}
							</td>
						</tr>
					@endforeach
				@else
					<div class="alert alert-warning">
						<h1>Não existe avaliação realizada</h1>
					</div>
				@endif
			</table>
		</div> -->

		<div class="col-md-10" style="margin-left: 150px;">
			<table id="avs" class="table table-striped" cellspacing="0" width="100%">
		        <thead style="background-color: #ccc; margin-top: 40px;">
		            <tr>
		                <th>ID</th>
		                <th>Disciplina</th>
		                <th>Turma</th>
		                <th>Realizada na data</th>
		                <th>Professor</th>
		                <th>Detalhes</th>
			        </tr>
		        </thead>
		        <tbody>
					@if(count($aluno->resultados) > 0)	
						@foreach($aluno->resultados as $resultado)
				            <tr>
								<td>{{$resultado->id}}</td>
								<td>{{$resultado->avaliacao->disciplina->nome}}</td>
								<td>{{$resultado->avaliacao->turma->nome}}</td>
								<td>{{date_format($resultado->created_at, 'd-m-Y h:m:s')}}</td>
								<td>{{$resultado->avaliacao->professor->nome}}</td>
								<td>
									<a href="/aluno/avaliacao/resultado/{{$resultado->avaliacao->id}}"><span class="btn btn-info"> <i class="glyphicon glyphicon-search"></i></span></a>
								</td>
							</tr>
						@endforeach
					@else
					<div class="alert alert-warning">
						<h1>Não existe avaliação realizada</h1>
					</div>
					@endif
				</tbody>
			</table>
		</div>
		
	</div>
	@stop