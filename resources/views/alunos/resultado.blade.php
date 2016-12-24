@extends('templates.aluno.template')
	@section('head')
	<link rel="stylesheet" href="/css/global.css">		
	<link rel="stylesheet" href="/css/formularios.css">		
	<title>RESULTADO</title>
	@stop
	@section('content')
	<br>
	<br>
	<br>
	<br>
	<div style="text-align:center">
		<h1>GABARITO DA AVALIAÇÃO COM RESULTADO</h1>

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



	<?php $count=0; ?>
		<table class="table">
			@foreach($avaliacao->questoes as $questao)
			<table>
					<tr>
						<td><h3>{{++$count}}) {{$questao->questao}} (Cód.:{{$questao->id}})  </h3></td>
					</tr>
					@if($questao->correta == 'a')
					<tr>
						<td class="alert-success" style="background: #FFFFFF;"><label id="a">a)</label> {{$questao->alternativaA}}</td>
					</tr>
					@else
					<tr>
						<td class="alert-danger" style="background: #FFFFFF;"><label id="a">a)</label> {{$questao->alternativaA}}</td>
					</tr>
					@endif

					@if($questao->correta == 'b')
					<tr>
						<td class="alert-success" style="background: #FFFFFF;"><label id="b">b)</label> {{$questao->alternativaB}}</td>
					</tr>
					@else
					<tr>
						<td class="alert-danger" style="background: #FFFFFF;"><label id="b">a)</label> {{$questao->alternativaB}}</td>
					</tr>
					@endif

					@if($questao->correta == 'c')
					<tr>
						<td class="alert-success" style="background: #FFFFFF;"><label id="c">c)</label> {{$questao->alternativaC}}</td>
					</tr>
					@else
					<tr>
						<td class="alert-danger" style="background: #FFFFFF;"><label id="c">c)</label> {{$questao->alternativaC}}</td>
					</tr>
					@endif

					@if($questao->correta == 'd')
					<tr>
						<td class="alert-success bg-white" style="background: #FFFFFF;"><label id="d">d)</label> {{$questao->alternativaD}}</td>
					</tr>
					@else
					<tr>
						<td class="alert-danger" style="background: #FFFFFF;"><label id="d">d)</label> {{$questao->alternativaD}}</td>
					</tr>
					@endif

					@if($questao->correta == 'e')
					<tr>
						<td class="alert-success" style="background: #FFFFFF;"><label id="e">e)</label> {{$questao->alternativaE}}</td>
					</tr>
					@else
					<tr>
						<td class="alert-danger" style="background: #FFFFFF;"><label id="e">e)</label> {{$questao->alternativaE}}</td>
					</tr>
					@endif
			</table>
			@endforeach
		</table>
	@stop