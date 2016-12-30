
<html>
<head>
		<title>BDQ - Avaliação Online</title>
	<link type="text/css" rel="stylesheet" href="/css/global.css" />
	<meta name="viewport" content="width=device-width, initial-scale: 1.0, user-scalabe=0"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>


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
			    <li><a href="/professor">Inicio</a></li> 
			    <li><input type="submit" form="formQuestoes" name="questoes" value="Questões" class="btn btn-link"></li> 
			    <li><input type="submit" name="avaliacao" value="Avaliações" form="formAvaliacao" class="btn btn-link"></li> 
		        <li><input type="submit" value="Gerar Avaliacao" form="formGerar" class="btn btn-link"></li> 
		        <li><input type="submit" name="cadastrar-questao" value="Cadastrar Questão" form="formCadastrarQ" class="btn btn-link"></li> 
		        <li><input type="submit" name="alunos" value="Lista de Alunos" form="formAlunos" class="btn btn-link"></li> 
			    <li><a href="professor/logout">Logout</a></li> 
			 </ul>
		</div>
		
		<div class="content" >
		<br>
		<br>
		<br>
		<br>
		<h1>Olá, Professor(a): {{Auth::guard('web_teachers')->user()->nome }}</h1>
		<br>
			
			<!-- MENSAGEM DE SUCESSO -->
		<div class="flash-message">
		    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
		    	@if(Session::has('alert-' . $msg))
					<h3><p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close"></a></p></h3>
		      @endif
		    @endforeach
		</div>	

			<!-- FIM DA MENSAGEM DE SUCESSO -->
		<h2>Painel de Informações</h2>
		<p>resumo das informações</p>
			<div id="box">
				<div class="box-top">
					<img src="images/professor_64px.png">
					<h3 class="professores"> {{$alunos->qtd_alunos}} </h3>
					<a href="#">Total de alunos</a>
				</div>

				<div class="box2-top">
					<img src="images/estudantes_64.png">
					<h3 class="estudantes"> 80 </h3>
					<a href="#">Total de estudantes</a>
				</div>

				<div class="box3-top">
					<img src="images/estatistica_64.png">
					<a href="#">Estatisticas</a>
				</div>
			</div>
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

