@extends('templates.admin.template')

	@section('scripts')
		<link type="text/css" rel="stylesheet" href="/css/global.css" />
		<link type="text/css" rel="stylesheet" href="/css/formularios.css" />
		<meta name="viewport" content="width=device-width, initial-scale: 1.0, user-scalabe=0"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<title>Cadastro de Disciplinas</title>
	@stop
	@section('content')
	<br>
	<br>
	<br>
	@if(!empty($errors->all()))
			<div class="alert alert-warning" role="alert-warning">
				@foreach($errors->all() as $error)
					<ul>
						<li> {{$error}}</li>
					</ul>
				@endforeach
			</div>
		@endif
		<div class="container">	
			<h2 style="text-align: center;"> Cadastro de disciplinas </h2> <br>

			{!!Form::open(array('url' => 'subjects', 'method' => 'post'))!!}
			

				{!!Form::label('nome','Nome:')!!}

				{{ Form::text('nome', '', array('class'=>'form-control', 'placeholder'=>'Digite o nome da disciplina')) }}
				
				<br>
				<div class="alert alert-warning" style="border-color: #ccc">
					Escolha uma ou mais turmas para associar a esta disciplina (Pressionando CTRL)
				</div>
				{!!Form::label('turma','Turma:')!!}
				<select multiple class="form-control"  name ="turmas[]">
					  @foreach($turmas as $t)
					  <option value="{{$t->id}}"> {{$t->nome}} </option>
					  @endforeach
				</select>
				<br>

			    {{ Form::submit('Salvar', array('class' => 'btn btn-primary')) }}

			{!!Form::close()!!}


		</div>
	@stop