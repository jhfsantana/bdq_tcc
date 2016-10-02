<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="/css/bootstrap.css">	
	<title>Cadastro de Turmas</title>
</head>
<body>
	<nav class="navbar navbar-inverse">
	<a class="navbar-brand" href="/home">Inicio</a>
	</nav>
<div class="container">

	{!!Form::open(array('url' => 'classrooms', 'method' => 'post'))!!}

		{!!Form::label('nome','Nome:')!!}

		{{ Form::text('nome', '', array('class'=>'form-control', 'placeholder'=>'Turma')) }}


	    {{ Form::submit('Salvar', array('class' => 'btn btn-primary')) }}

	{!!Form::close()!!}

</div>
</body>
</html>