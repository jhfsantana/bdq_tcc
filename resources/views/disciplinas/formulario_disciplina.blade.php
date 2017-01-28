@extends('templates.admin.template')

	@section('scripts')
		<meta name="viewport" content="width=device-width, initial-scale: 1.0, user-scalabe=0"/>
		<title>Cadastro de Disciplinas</title>
	@stop
	@section('content')
	<br>
	<br>
	<br>
			<!-- MENSAGEM DE SUCESSO -->
		<div class="flash-message">
		    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
		      @if(Session::has('alert-' . $msg))

		      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close"></a></p>
		      @endif
		    @endforeach
		 </div>	

	<!-- FIM DA MENSAGEM DE SUCESSO -->
		<div class="container">	
			<h2 style="text-align: center;"> Cadastro de disciplinas </h2> <br>

			{!!Form::open(array('url' => 'subjects', 'method' => 'post'))!!}
			

				{!!Form::label('nome','Nome:')!!}<i style="color: #FF0000">*</i>

				{{ Form::text('nome', '', array('class'=>'form-control', 'placeholder'=>'Digite o nome da disciplina')) }}
				
				<br>
				<div class="alert alert-warning" style="border-color: #ccc">
					Escolha uma turma para associar a esta disciplina 
				</div>
				{!!Form::label('turma','Turma:')!!}<i style="color: #FF0000">*</i>
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