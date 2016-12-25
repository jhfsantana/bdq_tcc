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
			    <li><a href="/home"><img src="/images/home.png"> Inicio</a></li>
			    <li><a href="/administrador/novo"><img src="/images/admin-nav.png"> Administradores</a></li>
			    <li><a href="/professores"><img src="/images/teacher-nav.png"> Professores</a>
			      <ul> 
			        <li><a href="/alunos"><img src="/images/student.png"> Alunos</a></li> 
			        <li><a href="/disciplinas"><img src="/images/books-subjects.png"> Disciplinas</a></li>  
			        <li><a href="/turma/novo"><img src="/images/classroom-nav.png"> Turmas</a></li> 
			        <li><a href="/admin/questoes"><img src="/images/test-results.png"> Questões </a></li>

			      </ul> 
			    </li>
			    <li><a href="administrador/logout"><img src="/images/logout.png" style="line-height: -2px;"> Logout</a></li> 

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