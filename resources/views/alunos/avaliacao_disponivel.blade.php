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
		<div class="container">
			<!-- <div class="col-md-2 col-md-offset-8" style="border-style: ridge;">
				Legenda das cores
			</div> -->
			<div class="row"">
			    <div class="col-md-2 col-md-offset-8" style="border-style: ridge;">
					<div style="padding-top: 10px; float: left; width: auto;" id="legenda">
						<div style="background-color: #2ecc71; border-radius: 50%; width: 10px; height: 10px; margin-top: 20px; margin-bottom: 20px;">
						</div>
						<div style="background-color: #f1c40f; border-radius: 50%; width: 10px; height: 10px; margin-top: 20px; margin-bottom: 20px;">
						</div>
						<div style="background-color: #e74c3c; border-radius: 50%; width: 10px; height: 10px; margin-top: 20px; margin-bottom: 20px;">
						</div>
					</div>
					<div style="padding-top: 10px; float: right; width: auto;" id="legenda">
						<div style="border-radius: 50%; width: auto; height: 10px; margin-top: 20px; line-height: 10px; margin-bottom: 20px;">
							Avaliação Disponível
						</div>
						<div style="border-radius: 50%; width: auto; height: 10px; margin-top: 20px; line-height: 11px; margin-bottom: 20px;"> Avaliação Pendente
						</div>
						<div style="border-radius: 50%; width: auto; height: 10px; margin-top: 20px; line-height: 11px; margin-bottom: 20px;"> Avaliação Finalizada
						</div>
					</div>
				</div>
			</div>
		<h2 style="text-align: center;">Avaliações</h2>
		<br>
		<br>
			<table class="table table-striped">
				@foreach($aluno->disciplinas as $disciplinas)
					<tr>
					@foreach ($disciplinas->turmas as $turma)
						@foreach($disciplinas->avaliacao as $avaliacao)
							<tr> 
								<td>{{$disciplinas->nome}}</td>
								<td>{{$turma->nome}}</td>
								@if($avaliacao->resultado || $avaliacao->status == 'finalizada')
									<td style="text-align: center;">
									<form id="formAvaliacaoDisponivel" method="post" action="/aluno/avaliacao/online">
				                		<input name="_token" type="hidden" value="{{ csrf_token() }}">
										<input type="hidden"  name="disciplina_id" value="{{$disciplinas->id}}"/>
										<input type="hidden"  name="turma_id" value="{{$turma->id}}">
										<input type="hidden"  name="avaliacao_id" value="{{$avaliacao->id}}">
										<button type="submit" name="avaliacoes" id="avaliacoes" class="btn btn-danger">
											<i class="glyphicon glyphicon-education"></i>{{$avaliacao->id}} - Avaliação - {{$avaliacao->created_at->format('d/m/Y')}}
										</button>
									</form>
								</td>
								@elseif($avaliacao->status == 'pendente')
								<td style="text-align: center;">
									<form id="formAvaliacaoDisponivel" method="post" action="/aluno/avaliacao/online">
				                		<input name="_token" type="hidden" value="{{ csrf_token() }}">
										<input type="hidden"  name="disciplina_id" value="{{$disciplinas->id}}"/>
										<input type="hidden"  name="turma_id" value="{{$turma->id}}">
										<input type="hidden"  name="avaliacao_id" value="{{$avaliacao->id}}">
										<button type="submit" name="avaliacoes" id="avaliacoes" class="btn btn-warning">
											<i class="glyphicon glyphicon-education"></i>{{$avaliacao->id}} - Avaliação - {{$avaliacao->created_at->format('d/m/Y')}}
										</button>
									</form>
								</td>
								@else
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
							</tr>		
						@endforeach
					@endforeach
				@endforeach
				</td>
				</tr>
			</table>
		</div>
	@stop
