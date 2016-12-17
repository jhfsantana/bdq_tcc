@extends('templates.aluno.template')
	@section('head')
	<link rel="stylesheet" href="/css/global.css">	
	<link rel="stylesheet" href="/css/formularios.css">	
	<title>Avaliacoes</title>
	@stop
	@section('content')				
		<br>
		<br>
		<br>
		<h2 style="text-align: center;">Avaliações</h2>
		<br>
		<br>

		<div class="container">
			<table class="table table-striped">
			<thead>
		  <tr>
		     <th>Disciplinas</th>
		     <th>Turmas e Avaliações</th>
		  </tr>
		 </thead>

		 <tbody>
				@foreach($aluno->disciplinas as $disciplinas)
					<tr>
					<td style="text-align: center;">{{$disciplinas->nome}}</td>
					@foreach ($disciplinas->turmas as $turma)
					<td>
						@foreach($turma->avaliacoes as $avaliacao)
						@if(isset($turma->avaliacoes))
							<td style="text-align: center;">
							<form id="formAvaliacaoDisponivel" method="post" action="/aluno/avaliacao/online">
		                		<input name="_token" type="hidden" value="{{ csrf_token() }}">
								<input type="hidden"  name="disciplina_id" value="{{$disciplinas->id}}"/>
								<input type="hidden"  name="turma_id" value="{{$turma->id}}">
								<input type="hidden"  name="avaliacao_id" value="{{$avaliacao->id}}">
								<button type="submit" name="avaliacoes" id="avaliacoes" class="btn btn-success">
									<i class="glyphicon glyphicon-education"></i>{{$avaliacao->id}} - Avaliação - {{$avaliacao->created_at->format('d/m/Y')}}
								</button>
							</form>
						</td>		
						@endif
						@endforeach
					</td>

					@endforeach
				@endforeach
				</td>
				</tr>
				</tbody>
			</table>
		</div>
	@stop