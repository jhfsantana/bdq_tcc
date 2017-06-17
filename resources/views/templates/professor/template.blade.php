<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale: 1.0, user-scalabe=0"/>
  <title>BDQ - Avaliação Online / Página inicial Administrativa</title>
  @yield('head')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">

  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="/css/global.css">

  
</head>

<body ng-app="BlankApp" ng-cloak>
		<div id="header" style="width: 100%; height: 105px;background-color: #95a5a6; position: fixed;">
      <div layout="row" layout-align="center center" style="margin: 0;">
        <img src="/images/header_logo_professor.svg/">
      </div>
    </div>

      <div id="wrapper">
        <div class="overlay"></div>
    
        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                       MENU
                    </a>
                </li>
                <li>
                    <a href="/professor"><i class="fa fa-fw fa-home"></i> Home</a>
                </li>

                <li>
                  <a href="/professor/questoes"><i class="fa fa-fw fa-cog"></i> Questões</a>
                </li>

                <li>
                  <a href="/professor/avaliacao"><i class="fa fa-fw fa-group"></i> Avaliações</a>
                </li>

                <li>
                  <a href="/professor/avaliacao/gerar"><i class="fa fa-fw fa-graduation-cap"></i> Gerar Avaliação</a>
                </li>

                <li>
                    <a href="/professor/questao/add"><i class="fa fa-fw fa-book"></i> Cadastrar Questão</a>
                </li>

                <li>
                   <a href="/professor/alunos"><i class="fa fa-fw fa-pencil"></i> Alunos</a>
                </li>

                <li>
                   <a href="/professor/turmas"><i class="fa fa-fw fa-users"></i> Turmas</a>
                </li>
                
                <li>
                    <a href="/professor/logout"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
                </li>
            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
          <button type="button" class="hamburger is-closed animated fadeInLeft" data-toggle="offcanvas">
            <span class="hamb-top"></span>
            <span class="hamb-middle"></span>
            <span class="hamb-bottom"></span>
          </button>	

		<div class="conteudo">
			<div class="row">
				<div class="col-md-10 col-md-offset-1" style="margin-top: 45px;">
					@yield('content')
				</div>
			</div>
		</div>
    </div>
    <!-- /#wrapper -->
  
    <!-- /#footer -->

<!--   <div class="navbar navbar-default navbar-fixed-bottom" style="text-align: center; background-color: #ccc; position: fixed;">
    <div class="container">
      <p>© 2016 Banco de Questões e Avaliação Online 
           <p>BDQ - Avaliação Online</p>
      </p>
    </div>
  </div> -->

      <!-- /#final footer -->
      
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
  <!-- Angular Material requires Angular.js Libraries -->
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>

  <!-- Angular Material Library -->
  <script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>
  <!-- Your application bootstrap  -->
  <script type="text/javascript">    

    angular.module('BlankApp', ['ngMaterial']);
  </script>
  <script src="/js/index.js"></script>

</body>
</html>
