<html>
<head>
		@yield('head')
		<title>BDQ - Avaliação Online</title>
</head>
<body>



	<div id="header">
		<div class="logo">
			<a href="#">BDQ - Avaliação<span>Online</span></a>
		</div>
	</div>
	<a href="#" class="mobile">MENU</a>
	<div id="container">
		<div class="sidebar">
			<ul id="nav"> 
			    <li><a href="/aluno">Inicio</a></li> 
			    <li><input type="submit" name="avaliacao" value="Avaliações" form="formAvaliacao" class="btn btn-link"></li>
			      <ul> 
			        <li><input type="submit" name="resultado" value="Provas realizadas" form="formRealizadas" class="btn btn-link"></li> 
			      </ul> 
			    <li><a href="/aluno/logout">Logout</a></li> 

			 </ul>
		</div>
		<div class="content">
		@yield('content')
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


		</div>
	</div>

	<script type="text/javascript">

	$(document).ready(function(){
     $("a.mobile").click(function(){
      $(".sidebar").slideToggle('slow');
     });

    window.onresize = function(event) {
      if($(window).width() > 480){
      	$(".sidebar").show();
      }
    };


	});

</script>
		
		<!-- FORMULARIO PARA CADASTRAR, GERAR VISUALIZAR AVALIACAO E LISTA DE QUESTOES -->
		<form action="/aluno/avaliacoes/{{Auth::user()->id}}" method="post" id="formAvaliacao">
			<input name="_token" type="hidden" value="{{ csrf_token() }}"> 
		</form>

		<form action="/aluno/avaliacoes/realizadas/{{Auth::user()->id}}" method="post" id="formRealizadas">
			<input name="_token" type="hidden" value="{{ csrf_token() }}"> 
		</form>

</body>
</html>

