<html ng-app="app">

	@extends('templates.admin.template')

		@section('scripts')
			<meta charset="utf-8">
		    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <meta name="viewport" content="width=device-width, initial-scale=1">
		    <title>BDQ - Lista de Professores</title>

		    <!-- Bootstrap -->
		    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		    <link rel="stylesheet" type="text/css" href="/css/style.css">
 			<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
			<link rel="stylesheet" type="text/css" href="/css/sweetalert.css">
		    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		    <!--[if lt IE 9]>
		      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
		      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		    <![endif]-->

		@stop
		

		@section('content')
			<div class="container" style="margin-top: 40px;">
			<div id="main"></div>
			<h3 style="text-align: center;">Lista de Professores</h3>

				<div ng-controller="ProfessorController">
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
										<a href="#" ng-click="sortType = 'matricula'; sortReverse = !sortReverse">
										Matricula
	       								 <span ng-show="sortType == 'matricula' && !sortReverse" class="fa fa-caret-down"></span>
	      								 <span ng-show="sortType == 'matricula' && sortReverse" class="fa fa-caret-up"></span>
									</th>

									<th>
										<a href="#" ng-click="sortType = 'nome'; sortReverse = !sortReverse">
										Nome
	            						<span ng-show="sortType == 'nome' && !sortReverse" class="fa fa-caret-down"></span>
	            						<span ng-show="sortType == 'nome' && sortReverse" class="fa fa-caret-up"></span>
									</th>

									<th>
										<a href="#" ng-click="sortType = 'sobrenome'; sortReverse = !sortReverse">
										Sobrenome
	            						<span ng-show="sortType == 'sobrenome'  && !sortReverse" class="fa fa-caret-down"></span>
	            						<span ng-show="sortType == 'sobrenome'  && sortReverse" class="fa fa-caret-up"></span>
									</th>

									<th>
										<a href="#" ng-click="sortType = 'cpf'; sortReverse = !sortReverse">
										CPF
	            						<span ng-show="sortType == 'cpf' && !sortReverse" class="fa fa-caret-down"></span>
	            						<span ng-show="sortType == 'cpf' && sortReverse" class="fa fa-caret-up"></span>
									</th>

									<th>
										<a href="#" ng-click="sortType = 'email'; sortReverse = !sortReverse">
										E-MAIL
	            						<span ng-show="sortType == 'email' && !sortReverse" class="fa fa-caret-down"></span>
	            						<span ng-show="sortType == 'email' && sortReverse" class="fa fa-caret-up"></span>
									</th>

									<th style="text-align: right;">
										<button id="btn-add" class="btn btn-success btn-md" ng-click="toggle('add', 0)">Novo Professor</button>
									</th>
								</tr>
							</thead>
							<tbody>
							<div class="input-group col-xs-4" style="margin-bottom: 8px;">
								<span class="input-group-addon" id="sizing-addon2" style="background-color: #ccc;"><i class="glyphicon glyphicon-search"></i></span>
								<input type="text" class="form-control" placeholder="Buscar" aria-describedby="sizing-addon2" ng-model="buscar">
							</div>
								<tr ng-repeat="professor in professores | filter:buscar | comecarEm:(currentPage - 1) * pageSize | limitTo:pageSize | orderBy:sortType:sortReverse">
									<td>@{{ professor.id }}</td>
									<td>@{{ professor.matricula }}</td>
									<td>@{{ professor.nome }}</td>
									<td>@{{ professor.sobrenome }}</td>
									<td>@{{ professor.cpf }}</td>
									<td>@{{ professor.email }}</td>
									<td style="text-align: right;">
										<button class="btn btn-warning btn-sm btn-detail" ng-click="toggle('edit', professor.id)">
											<span class="glyphicon glyphicon-edit"></span>
										</button>

										<button class="btn btn-danger btn-sm btn-delete" ng-click="confirmDelete(professor.id)" style="margin-left: 10px;">
											<span class="glyphicon glyphicon-trash"></span>
										</button>

										<button class="btn btn-info btn-sm btn-details" ng-click="toggle('details', professor.id)" style="margin-left: 10px;">
											<span class="glyphicon glyphicon-search"></span>
										</button>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
    				<div  style="text-align: center; width: 100%;">
						<ul uib-pagination total-items="professores.length" ng-model="currentPage" items-per-page="pageSize" class="pagination-sm" boundary-links="true""></ul>
    				</div>
					
				
					<div class="modal  fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">×</span>
					        </button>
					        <h4 class="modal-title" id="myModalLabel">@{{form_title}}</h4>
					      </div>
					      <div class="modal-body">
							<form name="frmProfessor" class="form-horizontal" novalidate=""> 
								<div class="form-group">
									<md-input-container class="md-block">
										<label>Matricula</label>
										<div class="col-sm-9">
											<input required dado-unico md-no-asterisk type="number" name="matricula" value="@{{ professor.matricula }}" ng-model="professor.matricula" minlength="11"/>
											<div ng-messages="frmProfessor.matricula.$error">
          										<div ng-message="required">
          											Campo matricula é obrigatório.
          										</div>
         										<div ng-message="minlength">
          											Tamanho da matricula deve ser no minimo 11 caracteres.
          										</div>
         										<div ng-message="dadoUnico">
          											Matricula já existente.
          										</div>        										
												<span class="text-success" ng-show="frmProfessor.matricula.$valid">
													Matricula disponível.
												</span>
												<span ng-if="frmProfessor.matricula.$pending" >
 													<md-progress-circular ng-disabled="!vm.activated" class="md-hue-2" md-diameter="20px"></md-progress-circular>
 												</span>
											</div>
										</div>
									</md-input-container>
								</div>
		
								
								<div layout="row">
									<md-input-container class="md-block" flex="50">
										<label>Nome</label>
											<input required md-no-asterisk type="text" name="nome" value="@{{ professor.nome }}" ng-model="professor.nome" maxlength="30"/>
											<div ng-messages="frmProfessor.nome.$error">
          										<div ng-message="required">
          											Campo nome é obrigatório.
          										</div>
         										<div ng-message="maxlength">
          											Tamanho do campo nome deve ter no máximo 30 caracteres.
          										</div>
											</div>
									</md-input-container>

									<md-input-container class="md-block" flex="50">
										<label>Sobrenome</label>
											<input required md-no-asterisk type="text" name="sobrenome" value="@{{ professor.sobrenome }}" ng-model="professor.sobrenome" maxlength="30"/>
											<div ng-messages="frmProfessor.sobrenome.$error">
          										<div ng-message="required">
          											Campo sobrenome é obrigatório.
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
											<input required dado-unico md-no-asterisk type="text" name="cpf" value="@{{ professor.cpf }}" ng-model="professor.cpf" maxlength="11" minlength="11"/>
											<div ng-messages="frmProfessor.cpf.$error">
          										<div ng-message="required">
          											Campo cpf é obrigatório.
          										</div>
         										<div ng-message="minlength">
          											Tamanho do campo cpf deve ter no minimo 11 caracteres.
          										</div>
         										<div ng-message="maxlength">
          											Tamanho do campo cpf deve ter no máximo 11 caracteres.
          										</div>
         										<div ng-message="dadoUnico">
          											CPF já existente.
          										</div>        										
												<span class="text-success" ng-show="frmProfessor.CPF.$valid">
													CPF disponível.
												</span>
												<span ng-if="frmProfessor.cpf.$pending" >
 													<md-progress-circular ng-disabled="!vm.activated" class="md-hue-2" md-diameter="20px"></md-progress-circular>
 												</span>
											</div>
									</md-input-container>

									<md-input-container class="md-block" flex="50">
										<label>E-mail</label>
											<input required dado-unico md-no-asterisk type="email" name="email" value="@{{ professor.email }}" ng-model="professor.email" maxlength="30"/>
											<div ng-messages="frmProfessor.email.$error">
          										<div ng-message="required">
          											Campo email é obrigatório.
          										</div>
         										<div ng-message="maxlength">
          											Tamanho do campo email deve ter no máximo 30 caracteres.
          										</div>
         										<div ng-message="dadoUnico">
          											E-mail já existente.
          										</div>        										
												<span class="text-success" ng-show="frmProfessor.email.$valid">
													E-mail disponível.
												</span>
												<span ng-if="frmProfessor.email.$pending" >
 													<md-progress-circular ng-disabled="!vm.activated" class="md-hue-2" md-diameter="20px"></md-progress-circular>
 												</span>
											</div>
									</md-input-container>
								</div>
								<input type="hidden" name="id" id="id" value="@{{ professor.id }}" ng-model="professor.id">
								</div>
								<div layout="row">
									<div class="form-group" ng-controller="DisciplinaController" flex="95" style="margin-left: auto; margin-right: auto;">
										<!-- 										<div ng-controller="DisciplinaController" ng-model="professor.disciplinas">
										--><!-- 												<select multiple class="form-control" ng-model="professor.disciplinas" ng-options="disciplina.id as disciplina.nome for disciplina in disciplinas">
										</select>
										-->
										<select multiple class="form-control" ng-model="professor.disciplinas">
											<option value="" disabled="true">Selecione uma turma</option>
											<optgroup ng-repeat='disciplina in disciplinas track by $index' label="@{{disciplina.nome}}">
												<option ng-repeat="turma in disciplina.turmas" value="@{{disciplina.id}}">@{{turma.nome}}</option>
											</optgroup>
										</select>	
									</div>
								</div>

								<div class="form-group">
									<md-input-container class="md-block">
										<label>Password</label>
										<div class="col-sm-9">
											<input required md-no-asterisk type="password" name="password" value="@{{ professor.password }}" ng-model="professor.password" minlength="8"/>
											<div ng-messages="frmProfessor.password.$error">
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
					                <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmProfessor.$invalid">Salvar</button>
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
									      			<th> ID : @{{ professor.id }}</th>
									      		</tr>
									      		<tr>
									      			<th> Matricula : @{{ professor.matricula }}</th>
									      		</tr>
									      		<tr>
									      			<th> Nome : @{{ professor.nome }}</th>
									      		</tr>
									      		<tr>
									      			<th> Sobrenome : @{{ professor.sobrenome }}</th>
												</tr>
									      		<tr>
									      			<th> CPF : @{{ professor.cpf }}</th>
									      		</tr>
									      		<tr>
									      			<th> E-MAIL : @{{ professor.email }}</th>
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
		    <script src="{{ asset('angular/app.js') }}"></script>
		    <script src="{{ asset('angular/controller/ProfessorController.js') }}"></script>
		    <script src="{{ asset('angular/controller/DisciplinaController.js') }}"></script>
		
		<!--Script para pagination-->
		    <script src="angular/libs/ui-bootstrap/ui-bootstrap-tpls-2.4.0.js"></script>

		 	<!-- importando os servicos  -->
		    <script src="angular/services/professorAPIService.js"></script>
		    <script src="angular/services/disciplinaAPIService.js"></script>
		    <script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.1/angular-material.min.js"></script>
		    <script src="/js/sweetalert.min.js"></script>
		@stop
</html>
