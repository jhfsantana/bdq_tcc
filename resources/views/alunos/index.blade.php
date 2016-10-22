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

<h1>Olá, {{Auth::guard('web_students')->user()->nome }}</h1> <p>
<p>



		<form action="aluno/avaliacoes/{{Auth::user()->id}}" method="post">
			<input name="_token" type="hidden" value="{{ csrf_token() }}"> 
			<input type="submit" name="avaliacao" value="Avaliacao">
		</form>


<form action="aluno/logout">
	<input type="submit" name="logout" value="logout">
</form>

</div>

</body>
</html>