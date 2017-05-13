<html>
<head>
		@yield('head')
		<title>BDQ - Avaliação Online</title>
</head>
<body>



	<div id="header" style="height: 80px;">
		<div class="logo">
			<a href="#">BDQ - Avaliação<span>Online</span></a>
		</div>
	</div>
	<a href="#" class="mobile">MENU</a>
	<div id="container">
		<div class="sidebar">
			<ul id="nav"> 
			    <li><a href="/aluno" ><img src="/images/home.svg" style="width: 32px;width: 32px;" data-toggle="tooltip" title="Home"></a></li> 
			    <li><a href="/aluno/avaliacoes"><img src="/images/exam.svg" style="width: 32px;width: 32px;" data-toggle="tooltip" title="Avaliações"></a></li>
				<li><a href="/aluno/avaliacoes/realizadas"><img src="/images/notas.png" style="width: 32px;width: 32px;" data-toggle="tooltip" title="Avaliações Realizadas"></a></li>
          		<li><a href="/aluno/mensagens"><img src="/images/messagewhite.svg" style="width: 32px;width: 32px;" data-toggle="tooltip" title="Mensagens"></a></li>
			    <li><a href="/aluno/logout"><img src="/images/logout.svg" style="width: 32px;width: 32px;" data-toggle="tooltip" title="Sair"></a></li> 

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

