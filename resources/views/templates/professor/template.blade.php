
<html>
<head>
	@yield('head')
	<link type="text/css" rel="stylesheet" href="/css/global.css" />
	<meta name="viewport" content="width=device-width, initial-scale: 1.0, user-scalabe=0"/>
</head>
<body>

	<div id="header">
		<div class="logo">
			<a  href="#">BDQ - Avaliação<span>Online</span></a>
		</div>
		
		@if(Auth::guard('web_teachers')->check())
		<div class="headeruser">
			<h3 style="float: right; color: #E7E7E7; margin: 0px; margin-top: 8px;">Você está logado como professor(a): {{Auth::guard('web_teachers')->user()->nome }}</h3>
			<img src="/images/teacher-desk.png" style="float: right; margin-right: 10px;">
		</div>
		@endif
	</div>
	<a href="#" class="mobile">MENU</a>
	<div id="container">
		<div class="sidebar">
			<ul id="nav"> 
			    <li><a href="/professor">Inicio</a></li> 
			    <li><input type="submit" form="formQuestoes" name="questoes" value="Questões" class="btn btn-link"></li> 
			    <li><input type="submit" name="avaliacao" value="Avaliações" form="formAvaliacao" class="btn btn-link"></li>
		        <li><input type="submit"  value="Gerar Avaliacao" form="formGerar" class="btn btn-link"></li> 
		        <li><input type="submit" name="cadastrar-questao" value="Cadastrar Questão" form="formCadastrarQ" class="btn btn-link"></li>
		        <li><input type="submit" name="alunos" value="Lista de Alunos" form="formAlunos" class="btn btn-link"></li> 
			    <li><a href="/professor/logout">Logout</a></li> 
			 </ul>
		</div>
		<div class="content" id="conteudo">
			
			<!-- MENSAGEM DE SUCESSO -->
				<div class="flash-message">
				    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
				      @if(Session::has('alert-' . $msg))

				      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close"></a></p>
				      @endif
				    @endforeach
				 </div>	

			<!-- FIM DA MENSAGEM DE SUCESSO -->
		@yield('content')
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
		<form action="/professor/{{Auth::user()->id}}/questao" method="post" id="formCadastrarQ">
			<input name="_token" type="hidden" value="{{ csrf_token() }}"> 
		</form>

		<form action="/professor/avaliacao/{{Auth::user()->id}}/gerar" method="post" id="formGerar">
			<input name="_token" type="hidden" value="{{ csrf_token() }}"> 
		</form>

		<form action="/professor/avaliacao/{{Auth::user()->id}}" method="post" id="formAvaliacao">
			<input name="_token" type="hidden" value="{{ csrf_token() }}"> 
		</form>

		<form action="/professor/{{Auth::user()->id}}/questoes" method="post" id="formQuestoes">
			<input name="_token" type="hidden" value="{{ csrf_token() }}"> 
		</form>

		<form action="/professor/{{Auth::user()->id}}/alunos" method="post" id="formAlunos">
			<input name="_token" type="hidden" value="{{ csrf_token() }}"> 
		</form>
</body>
</html>

