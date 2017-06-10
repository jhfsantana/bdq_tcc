<html ng-app="app">

	@extends('templates.admin.template')

		@section('scripts')
			<meta charset="utf-8">
		    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <meta name="viewport" content="width=device-width, initial-scale=1">
		    <title>BDQ - Lista de Turmas</title>

		    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		    <!--[if lt IE 9]>
		      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
		      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		    <![endif]-->

		@stop
		

		@section('content')
		@section('titulo')
			<i class="fa fa-users" aria-hidden="true"></i>
			Turmas
		@stop
			<div class="container" style="margin-top: 80px;">
			<h3 style="text-align: center;">Lista de Turmas</h3>
    		<div id="main"></div>
		    @if(!empty($errors->all()))
		    <div class="alert alert-danger" role="alert-danger">
		        @foreach($errors->all() as $error)
		            <ul>
		                <li> {{$error}}</li>
		            </ul>
		        @endforeach
		    </div>
		    @endif
				<div ng-controller="TurmaController">
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
										<a href="#" ng-click="sortType = 'name'; sortReverse = !sortReverse">
										Nome / Númeração

										
	            						<span ng-show="sortType == 'name' && !sortReverse" class="fa fa-caret-down"></span>
	            						<span ng-show="sortType == 'name' && sortReverse" class="fa fa-caret-up"></span>
									</th>

									<th style="text-align: right;">
										<button id="btn-add" class="btn btn-success btn-md" ng-click="toggle('add', 0)">Novo turma</button>
									</th>
								</tr>
							</thead>
							<tbody>
							<div class="input-group col-xs-4" style="margin-bottom: 8px;">
								<span class="input-group-addon" id="sizing-addon2" style="background-color: #ccc;"><i class="glyphicon glyphicon-search"></i></span>
								<input type="text" class="form-control" placeholder="Buscar" aria-describedby="sizing-addon2" ng-model="buscar">
							</div>
								<tr ng-repeat="turma in turmas | filter:buscar | comecarEm:(currentPage - 1) * pageSize | limitTo:pageSize | orderBy:sortType:sortReverse">
									<td>@{{ turma.id }}</td>
									<td>@{{ turma.nome }}</td>
									<td style="text-align: right;">
										<button class="btn btn-warning btn-sm btn-detail" ng-click="toggle('edit', turma.id)">
											<span class="glyphicon glyphicon-edit"></span>
										</button>

										<button class="btn btn-danger btn-sm btn-delete" ng-click="confirmDelete(turma.id)" style="margin-left: 10px;">
											<span class="glyphicon glyphicon-trash"></span>
										</button>
										
										<a href="/turma/config/@{{turma.id}}">
											<span class="btn btn-primary btn-sm btn-config"  style="margin-left: 10px;">
												<span class="glyphicon glyphicon-search">
												</span>
											</span>
										</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
    				<div  style="text-align: center; width: 100%;">
						<ul uib-pagination total-items="turmas.length" ng-model="currentPage" items-per-page="pageSize" class="pagination-sm" boundary-links="true""></ul>
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
							<form name="frmTurma" class="form-horizontal" novalidate=""> 
							
								<div layout="row">
									<md-input-container class="md-block" flex="50">
										<label>Nome</label>
											<input required md-no-asterisk type="text" name="nome" value="@{{ turma.nome }}" ng-model="turma.nome" maxlength="30"/>
											<div ng-messages="frmTurma.nome.$error">
          										<div ng-message="required">
          											Campo nome é obrigatório.
          										</div>
         										<div ng-message="maxlength">
          											Tamanho do nome deve ter no máximo 30 caracteres.
          										</div>
											</div>
									</md-input-container>
									</div>
									<div layout="row">
									<!-- <div class="form-group" ng-controller="DisciplinaController" flex="95" style="margin-left: auto; margin-right: auto;">
										<select multiple  class="form-control" ng-model="turma.disciplinas" >
											<option ng-repeat='disciplina in disciplinas' value="@{{disciplina.id}}">@{{disciplina.nome}}</option>
											@{{ disciplina.id }}
										</select>

									</div> -->
								</div>

							</form>
								<div class="modal-footer">
					                <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmTurma.$invalid">Salvar</button>
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
									      			<th> ID : @{{ turma.id }}</th>
									      		</tr>
									      		<tr>
									      			<th> Matricula : @{{ turma.matricula }}</th>
									      		</tr>
									      		<tr>
									      			<th> name : @{{ turma.name }}</th>
									      		</tr>
									      		<tr>
									      			<th> Sobrename : @{{ turma.sobrename }}</th>
												</tr>
									      		<tr>
									      			<th> CPF : @{{ turma.cpf }}</th>
									      		</tr>
									      		<tr>
									      			<th> E-MAIL : @{{ turma.email }}</th>
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
<<<<<<< HEAD
			</script>
=======

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
		    <script src="{{ asset('angular/controller/TurmaController.js') }}"></script>
		    <script src="{{ asset('angular/controller/DisciplinaController.js') }}"></script>
		
		<!--Script para pagination-->
		    <script src="angular/libs/ui-bootstrap/ui-bootstrap-tpls-2.4.0.js"></script>
		    <script src="angular/services/TurmaAPIService.js"></script>
		    <script src="angular/services/disciplinaAPIService.js"></script>
		    <script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.1/angular-material.min.js"></script>
		    <script src="/js/sweetalert.min.js"></script>

>>>>>>> 9f41b1cee2d726564aeb23d1335af614eff1d469
		@stop
</html>