<html>
<head>    
	<title>BDQ - Avaliação Online</title>
	@yield('scripts')
	<link rel="stylesheet" href="/css/formularios.css">
	<link rel="stylesheet" href="/css/global.css">
    <script type="text/javascript">
    @yield('grafico')
    </script>
</head>
<body>
        {!! Charts::assets() !!}

	<div id="header">
		<div class="logo">
			<a href="#">BDQ - Avaliação<span>Online</span></a>
		</div>
		@if(Auth::guard('web_admins')->check())
		<div class="headeruser">
			<h3 style="float: right; color: #E7E7E7; margin: 0px; margin-top: 8px;">Você está logado como administrador(a): {{Auth::guard('web_admins')->user()->name }}</h3>
			<img src="/images/admin-header.png" style="float: right; margin-right: 10px; margin-top: 5px">
		</div>
		@endif
	</div>
	<a href="#" class="mobile">MENU</a>
	<div id="container">
		<div class="sidebar">
			<ul id="nav"> 
			    <li><a href="/home">Inicio</a></li>
			    <li><a href="/administrador/novo">Cadastro de administradores</a></li>
			    <li><a href="#">Lista de administradores</a></li>
			    <li><a href="/professores">Lista de Professores</a>
			      <ul> 
			        <li><a href="/alunos">Alunos</a></li> 
			        <li><a href="/disciplinas">Disciplinas</a></li>  
			        <li><a href="/turma/novo">Turmas</a></li> 
			      </ul> 
			    </li>
			    <li><a href="/administrador/logout">Logout</a></li> 

			 </ul>
		</div>
		<div class="content">
		<br>
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