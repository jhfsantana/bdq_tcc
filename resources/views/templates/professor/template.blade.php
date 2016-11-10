
<html>
<head>
	@yield('head')
</head>
<body>
	<div id="header">
		<div class="logo">
			<a href="#">BDQ - Avaliação<span>Online</span></a>
		</div>
		
		<div class="headeruser">
			<img src="/images/teacher-desk.png" style="float: left; margin-left: 50%; margin-top: 36px;">
			<h3 style="float: right; color: #E7E7E7;margin-top: 45px; margin-right: 240px;">Você está logado como professor(a): {{Auth::guard('web_teachers')->user()->nome }}</h3>
		</div>
	</div>
	<a href="#" class="mobile">MENU</a>
	<div id="container">
		<div class="sidebar">
			<ul id="nav"> 
			    <li><a href="/professor">Inicio</a></li> 
			    <li><input type="submit" form="formQuestoes" name="questoes" value="questoes" class="btn btn-link"></li> 
			    <li><input type="submit" name="avaliacao" value="Avaliacao" form="formAvaliacao" class="btn btn-link"></a>
			      <ul> 
			        <li><input type="submit" name="gerar-avaliacao" value="Gerar Avaliacao" form="formGerar" class="btn btn-link"></li> 
			        <li><input type="submit" name="cadastrar-questao" value="Cadastrar Questão" form="formCadastrarQ" class="btn btn-link"></li> 
			      </ul> 
			    </li>

			    <li><a href="#">Lista de Alunos</a></li> 
			    <li><a href="professor/logout">Logout</a></li> 

			 </ul>
		</div>
		<div class="content">
		<p>
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

</body>
</html>

