<html ng-app="app">

	@extends('templates.admin.template')

		@section('scripts')
			<meta charset="utf-8">
		    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <meta name="viewport" content="width=device-width, initial-scale=1">
		    <title>BDQ - Lista de Questões</title>

		    <!-- Bootstrap -->
		    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		    <link rel="stylesheet" type="text/css" href="/css/style.css">
 			<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">

		    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		    <!--[if lt IE 9]>
		      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
		      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		    <![endif]-->

		@stop
		

		@section('content')
			<div class="container" style="margin-top: 80px;">
			<h3 style="text-align: center;">Lista de Questões</h3>
    
		    @if(!empty($errors->all()))
		    <div class="alert alert-danger" role="alert-danger">
		        @foreach($errors->all() as $error)
		            <ul>
		                <li> {{$error}}</li>
		            </ul>
		        @endforeach
		    </div>
		    @endif
				<div ng-controller="QuestaoController">
					<div class="table-responsive">
						<table class="table table-bordered table-striped" style="border: 2px;">
							<thead>
								<tr>
									<th>
										<a href="#" ng-click="sortType = 'id'; sortReverse = !sortReverse">
										ID
										<span ng-show="sortType == 'id' && !sortReverse" class="fa fa-caret-down"></span>
										<span ng-show="sortType == 'id' && sortReverse" class="fa fa-caret-up"></span>
									</th>

									<th>
										<a href="#" ng-click="sortType = 'enunciado'; sortReverse = !sortReverse">
										Enunciado
	       								 <span ng-show="sortType == 'enunciado' && !sortReverse" class="fa fa-caret-down"></span>
	      								 <span ng-show="sortType == 'enunciado' && sortReverse" class="fa fa-caret-up"></span>
									</th>

									<th>
										<a href="#" ng-click="sortType = 'disciplina'; sortReverse = !sortReverse">
										Disciplina
	            						<span ng-show="sortType == 'disciplina' && !sortReverse" class="fa fa-caret-down"></span>
	            						<span ng-show="sortType == 'disciplina' && sortReverse" class="fa fa-caret-up"></span>
									</th>

									<th style="text-align: right;">
										<button id="btn-add" class="btn btn-success btn-md" ng-click="toggle('add', 0)">Nova Questão</button>
									</th>
								</tr>
							</thead>
							<tbody>
							<div class="input-group col-xs-4" style="margin-bottom: 8px;">
								<span class="input-group-addon" id="sizing-addon2" style="background-color: #ccc;"><i class="glyphicon glyphicon-search"></i></span>
								<input type="text" class="form-control" placeholder="Buscar" aria-describedby="sizing-addon2" ng-model="buscar">
							</div>
								<tr ng-repeat="questao in questoes | filter:buscar | comecarEm:(currentPage - 1) * pageSize | limitTo:pageSize | orderBy:sortType:sortReverse">
									<td>@{{ questao.id }}</td>
									<td>@{{ questao.questao }}</td>
									<td>@{{ questao.disciplina_nome }}</td>

									<td style="text-align: right;">
										<button class="btn btn-warning btn-sm btn-detail" ng-click="toggle('edit', questao.id)">
											<span class="glyphicon glyphicon-edit"></span>
										</button>

										<button class="btn btn-danger btn-sm btn-delete" ng-click="confirmDelete(questao.id)" style="margin-left: 10px;">
											<span class="glyphicon glyphicon-trash"></span>
										</button>

										<button class="btn btn-info btn-sm btn-details" ng-click="toggle('details', questao.id)" style="margin-left: 10px;">
											<span class="glyphicon glyphicon-search"></span>
										</button>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
    				<div  style="text-align: center; width: 100%;">
						<ul uib-pagination total-items="questoes.length" ng-model="currentPage" items-per-page="pageSize" class="pagination-sm" boundary-links="true""></ul>
    				</div>
					
				
					<div class="modal  fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">×</span>
					        </button>
					        <h4 class="modal-title" id="myModalLabel" style="text-align: center;">@{{form_title}}</h4>
					      </div>
					      <div class="modal-body">
							<form name="frmAdmin" class="form-horizontal" novalidate=""> 
								<div class="form-group">
									<md-input-container class="md-block">
										<label>Enunciado</label>
										<div class="col-sm-9">
											<input required dado-unico md-no-asterisk type="number" name="matricula" value="@{{ questao.matricula }}" ng-model="questao.matricula" minlength="11"/>
											<div ng-messages="frmAdmin.matricula.$error">
          										<div ng-message="required">
          											Campo matricula é obrigatório.
          										</div>
         										<div ng-message="minlength">
          											Tamanho da matricula deve ser no minimo 11 caracteres.
          										</div>
         										<div ng-message="dadoUnico">
          											Matricula já existente.
          										</div>
												<span class="text-success" ng-show="frmAdmin.matricula.$valid">
													Matricula disponível.
												</span>
												<span ng-if="frmAdmin.matricula.$pending" >
 													<md-progress-circular ng-disabled="!vm.activated" class="md-hue-2" md-diameter="20px"></md-progress-circular>
 												</span>
											</div>
										</div>
									</md-input-container>
								</div>
		
		
							
								<div layout="row">
									<md-input-container class="md-block" flex="50">
										<label>Nome</label>
											<input required md-no-asterisk type="text" name="name" value="@{{ questao.name }}" ng-model="questao.name" maxlength="30"/>
											<div ng-messages="frmAdmin.name.$error">
          										<div ng-message="required">
          											Campo nome é obrigatório.
          										</div>
         										<div ng-message="minlength">
          											Tamanho do nome deve ser no minimo 11 caracteres.
          										</div>
											</div>
									</md-input-container>

									<md-input-container class="md-block" flex="50">
										<label>Sobrenome</label>
											<input required md-no-asterisk type="text" name="sobrenome" value="@{{ questao.sobrenome }}" ng-model="questao.sobrenome" maxlength="30"/>
											<div ng-messages="frmAdmin.sobrenome.$error">
          										<div ng-message="required">
          											Campo sobrename é obrigatório.
          										</div>
         										<div ng-message="maxlength">
          											Tamanho do campo sobrenome deve ter no máximo 30 caracteres.
          										</div>
											</div>
									</md-input-container>
								</div>
								<div layout="row">
									<md-input-container class="md-block" flex="50">
										<label>CPF</label>
											<input dado-unico required md-no-asterisk type="text" name="cpf" value="@{{ questao.cpf }}" ng-model="questao.cpf" maxlength="11" minlength="11"/>
											<div ng-messages="frmAdmin.cpf.$error">
          										<div ng-message="required">
          											Campo cpf é obrigatório.
          										</div>
         										<div ng-message="minlength">
          											Tamanho da cpf deve ser no minimo 11 caracteres.
          										</div>
         										<div ng-message="dadoUnico">	
          											cpf já existente.
          										</div>
												<span ng-if="frmAdmin.cpf.$pending" >
 													<md-progress-circular ng-disabled="!vm.activated" class="md-hue-2" md-diameter="20px"></md-progress-circular>
 												</span>
												<span class="text-success" ng-show="frmAdmin.cpf.$valid">
													cpf disponível.
												</span>
											</div>
									</md-input-container>

									<md-input-container class="md-block" flex="50">
										<label>E-mail</label>
											<input required dado-unico md-no-asterisk type="email" name="email" value="@{{ questao.email }}" ng-model="questao.email" maxlength="30"/>
											<div ng-messages="frmAdmin.email.$error">
          										<div ng-message="required">
          											Campo email é obrigatório.
          										</div>
         										<div ng-message="minlength">
          											Tamanho da email deve ser no minimo 11 caracteres.
          										</div>
         										<div ng-message="dadoUnico">
          											email já existente.
          										</div>
												<span class="text-success" ng-show="frmAdmin.email.$valid">
													email disponível.
												</span>
												<span ng-if="frmAdmin.email.$pending" >
 													<md-progress-circular ng-disabled="!vm.activated" class="md-hue-2" md-diameter="20px"></md-progress-circular>
 												</span>
											</div>
									</md-input-container>
								</div>

								<div class="form-group">
									<md-input-container class="md-block">
										<label>Password</label>
										<div class="col-sm-9">
											<input required md-no-asterisk type="password" name="password" value="@{{ questao.password }}" ng-model="questao.password" minlength="8"/>
											<div ng-messages="frmAdmin.password.$error">
          										<div ng-message="required">
          											Campo password é obrigatório.
          										</div>
         										<div ng-message="minlength">
          											Tamanho do campo password deve ter no minimo 8 caracteres.
          										</div>
											</div>
										</div>
									</md-input-container>
								</div>
							</form>
								<div class="modal-footer">
					                <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmAdmin.$invalid">Salvar</button>
					            </div>
							</div>
						</div>
					</div>
				</div>


					<div class="modal  fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel" aria-hidden="true"	>
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">×</span>
					        </button>
					        <h4 class="modal-title" id="detailsModalLabel">@{{form_title}}</h4>
					      </div>
					    	<div class="modal-body">
								<div class="details">
								  <div class="details-header">
								    <div class="details-photo">
								      <div class="details-pic">
								        <a href="#">
								          <div class="button-position"></div>
								        </a>
								      </div>
								      </div>
								    </div>
								      	<table class="table" style="position: relative; margin-top: 60px;">
								      		<thead>
									      		<tr>
									      			<th> ID : @{{ questao.id }}</th>
									      		</tr>
									      		<tr>
									      			<th> Enunciado : @{{ questao.questao }}</th>
									      		</tr>
									      		<tr>
									      			<th> Disciplina : @{{ questao.disciplina }}</th>
									      		</tr>
								      		</thead>
								      	</table>
								  </div>
								</div>
								<div class="info">
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>

			<!-- Script para limpar o modal -->
			<script>
				$(document).ready(function() {
					$('#myModal').on('hidden.bs.modal', function () {
				    	$(this).find("input,textarea").val('').end();

					});
				});
			</script>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		    <!-- Include all compiled plugins (below), or include individual files as needed -->
		    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


		    <!-- Aangular Material load from CDN -->
			<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
			<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular-animate.min.js"></script>
			<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular-aria.min.js"></script>
			<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular-messages.min.js"></script>
		    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular-touch.min.js"></script>
		    <!-- Angular Application Scripts Load  -->
		    <script src="{{ asset('/angular/app.js') }}"></script>
		    <script src="{{ asset('/angular/controller/QuestaoController.js') }}"></script>
		    <script src="{{ asset('/angular/controller/DisciplinaController.js') }}"></script>
		
		<!--Script para pagination-->
		    <script src="/angular/libs/ui-bootstrap/ui-bootstrap-tpls-2.4.0.js"></script>
		    <script src="/angular/services/questaoAPIService.js"></script>
		    <script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.1/angular-material.min.js"></script>
		@stop
</html>