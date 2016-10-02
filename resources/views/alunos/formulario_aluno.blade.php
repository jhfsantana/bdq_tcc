<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="/css/bootstrap.css">		
	<title>Cadastro de alunos</title>
</head>
<body>
	@if(!empty($errors->all()))
	<div class="alert alert-danger" role="alert-danger" id="formRequest">
		@foreach($errors->all() as $error)
			<ul>
				<li> {{$error}}</li>
			</ul>
		@endforeach
	</div>
	@endif
	
	<div class="container" style="text-align: center"><h1>Cadastro de alunos</h1></div>

<div class="container" style="margin-top: 80px">
		<div class="row">
		{!!Form::open(array('url' => 'students', 'method' => 'post'))!!}
			
			<script>
			    function GetRandom()
			    {
			        var myElement = document.getElementById("matricula")
			        myElement.value = Math.floor((Math.random() * 100000) + 100)
			    }
			</script>

			{!!Form::label('matricula','Matricula:')!!}  <a href="#"><span class="glyphicon glyphicon-refresh" aria-hidden="true" onclick="GetRandom()" "></span></a>



	
			{{ Form::text('matricula', '', array('class'=>'form-control', 'placeholder'=>'Matricula')) }}

			
			{!!Form::label('nome','Nome:')!!}
			{{ Form::text('nome', '', array('class'=>'form-control', 'placeholder'=>'Nome')) }}

			
			{!!Form::label('email','e-mail:')!!}
			{{ Form::email('email', '', array('class'=>'form-control', 'placeholder'=>'E-mail')) }}

			{!!Form::label('disciplina','Disciplina:')!!}
			<select multiple class="form-control"  name ="disciplinas[]">
				  @foreach($disciplinas as $d)
				  <option value="{{$d->id}}"> {{$d->nome}} </option>
				  @endforeach
			</select>

			{!!Form::label('password','Password:')!!}

			{{ Form::password('password', '', array('class'=>'form-control', 'placeholder'=>'Password')) }}
		   
		    {{ Form::submit('Salvar', array('class' => 'btn btn-primary')) }}

		{!!Form::close()!!}
</body>
</html>