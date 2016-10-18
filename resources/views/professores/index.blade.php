<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="/css/bootstrap.css">	
	<title>Home</title>
</head>
<body>

<div class="container">
	<div class="flash-message">
	    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
	      @if(Session::has('alert-' . $msg))

	      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close"></a></p>
	      @endif
	    @endforeach
	 </div>

		
</div>

<h1>Olá, {{Auth::guard('web_teachers')->user()->nome }}</h1> <p>
<p>


		<form action="professor/{{Auth::user()->id}}/questao" method="post">
			<input name="_token" type="hidden" value="{{ csrf_token() }}"> 
			<input type="submit" name="cadastrar-questao" value="Cadastrar Questão">
		</form>

		<form action="professor/avaliacao/{{Auth::user()->id}}/gerar" method="post">
			<input name="_token" type="hidden" value="{{ csrf_token() }}"> 
			<input type="submit" name="gerar-avaliacao" value="Gerar Avaliacao">
		</form>

		<form action="professor/avaliacao/{{Auth::user()->id}}" method="post">
			<input name="_token" type="hidden" value="{{ csrf_token() }}"> 
			<input type="submit" name="avaliacao" value="Avaliacao">
		</form>

		<form action="professor/{{Auth::user()->id}}/questoes" method="post">
			<input name="_token" type="hidden" value="{{ csrf_token() }}"> 
			<input type="submit" name="questoes" value="questoes">
		</form>


<form action="professor/logout">
	<input type="submit" name="logout" value="logout">
</form>

</div>

</body>
</html>