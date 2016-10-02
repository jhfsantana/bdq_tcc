<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="/css/bootstrap.css">	
	<title>Cadastro de Disciplinas</title>
</head>
<body>
<div class="container">
	
	{!!Form::open(array('url' => 'subjects', 'method' => 'post'))!!}

		{!!Form::label('nome','Nome:')!!}

		{{ Form::text('nome', '', array('class'=>'form-control', 'placeholder'=>'Digite o nome da disciplina')) }}


		{!!Form::label('turma','Turma:')!!}
		<select multiple class="form-control"  name ="turmas[]">
			  @foreach($turmas as $t)
			  <option value="{{$t->id}}"> {{$t->nome}} </option>
			  @endforeach
		</select>


	    {{ Form::submit('Salvar', array('class' => 'btn btn-primary')) }}

	{!!Form::close()!!}


</div>
</body>
</html>