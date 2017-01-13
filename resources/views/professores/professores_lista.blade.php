<html ng-app="getProfessor">

	@extends('templates.admin.template')

		@section('scripts')
			<meta charset="utf-8">
		    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <meta name="viewport" content="width=device-width, initial-scale=1">
		    <title>Laravel 5 and Angular CRUD Application</title>

		    <!-- Bootstrap -->
		    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		    <link rel="stylesheet" type="text/css" href="/css/style.css">

		    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		    <!--[if lt IE 9]>
		      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
		      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		    <![endif]-->

		@stop
		
		@section('content')
			<div class="container" style="margin-top: 150px;">
			<h3 style="text-align: center;">Lista de Professores</h3>
				<div ng-controller="ProfessorController">
					<table class="table table-striped table-responsive">
						<thead>
							<tr>
								<th>ID</th>
								<th>Matricula</th>
								<th>Nome</th>
								<th>Sobrenome</th>
								<th>CPF</th>
								<th>E-MAIL</th>
								<th>
									<button id="btn-add" class="btn btn-success btn-md" ng-click="toggle('add', 0)">Novo Professor</button>
								</th>
							</tr>
						</thead>
						<tbody>
							<div class="input-group col-xs-4">
								<span class="input-group-addon" id="sizing-addon2" style="background-color: #ccc;"><i class="glyphicon glyphicon-search"></i></span>
								<input type="text" class="form-control" placeholder="Buscar" aria-describedby="sizing-addon2" ng-model="buscar">
							</div>
							<tr ng-repeat="professor in professores | filter:buscar">
								<td>@{{ professor.id }}</td>
								<td>@{{ professor.matricula }}</td>
								<td>@{{ professor.nome }}</td>
								<td>@{{ professor.sobrenome }}</td>
								<td>@{{ professor.cpf }}</td>
								<td>@{{ professor.email }}</td>
								<td>
									<button class="btn btn-warning btn-sm btn-detail" ng-click="toggle('edit', professor.id)">
										<span class="glyphicon glyphicon-edit"></span>
									</button>

									<button class="btn btn-danger btn-sm btn-delete" ng-click="confirmDelete(professor.id)" style="margin-left: 10px;">
										<span class="glyphicon glyphicon-trash"></span>
									</button>
								</td>
							</tr>
						</tbody>
					</table>


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
											<label class="col-sm-3 control-label">Matricula</label>
											<div class="col-sm-9">
												<input type="text" name="matricula" id="matricula" class="form-control" placeholder="Matricula" value="@{{ professor.matricula }}" ng-model="professor.matricula" ng-required="true">
						                        <span ng-show="frmProfessor.matricula.$invalid && frmProfessor.matricula.$touched">O campo matricula é obrigatório</span>

											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label">Nome</label>
											<div class="col-sm-9">
												<input type="text" name="nome" id="nome" class="form-control" placeholder="Digite o nome" value="@{{ professor.nome }}" ng-model="professor.nome" ng-required="true">
						                        <span ng-show="frmProfessor.nome.$invalid && frmProfessor.nome.$touched">O campo nome é obrigatório</span>
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label">Sobrenome</label>
											<div class="col-sm-9">
												<input type="text" name="sobrenome" id="sobrenome" class="form-control" placeholder="Digite o sobrenome" value="@{{ professor.sobrenome }}" ng-model="professor.sobrenome" ng-required="true">
						                        <span ng-show="frmProfessor.sobrenome.$invalid && frmProfessor.sobrenome.$touched">O campo sobrenome é obrigatório</span>
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label">CPF</label>
											<div class="col-sm-9">
												<input type="text" name="cpf" id="cpf" class="form-control" placeholder="Digite o CPF" value="@{{ professor.cpf }}" ng-model="professor.cpf" ng-required="true">
						                        <span class="alert-danger" ng-show="frmProfessor.cpf.$invalid && frmProfessor.cpf.$touched">O campo cpf é obrigatório</span>
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label">E-mail</label>
											<div class="col-sm-9">
												<input type="text" name="email" id="email" class="form-control" placeholder="Digite o e-mail" value="@{{ professor.email }}" ng-model="professor.email" ng-required="true">
						                        <span ng-show="frmProfessor.email.$invalid && frmProfessor.email.$touched">O campo email é obrigatório</span>
											</div>
										</div>

										<div class="form-group" ng-controller="DisciplinaController">
											<label class="col-sm-3 control-label">Turma e Disciplina</label>
											<div class="col-sm-9">
												<div ng-controller="DisciplinaController" ng-model="professor.disciplinas">
<!-- 												<select multiple class="form-control" ng-model="professor.disciplinas" ng-options="disciplina.id as disciplina.nome for disciplina in disciplinas">
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
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label">Password</label>
											<div class="col-sm-9">
												<input type="password" name="password" id="password" class="form-control" placeholder="Digite a password" value="@{{ professor.email }}" ng-model="professor.password" ng-required="true">
						                        <span ng-show="frmProfessor.password.$invalid && frmProfessor.password.$touched">O campo password é obrigatório</span>
											</div>
										</div>

									</form>
									<div class="modal-footer">
						                <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmProfessor.$invalid">Salvar</button>
						            </div>
								</div>
							</dir>
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
		    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
		    <script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.1/angular-material.min.js"></script>

		    <!-- Angular Application Scripts Load  -->
		    <script src="{{ asset('angular/app.js') }}"></script>
		    <script src="{{ asset('angular/controller/ProfessorController.js') }}"></script>
		    <script src="{{ asset('angular/controller/DisciplinaController.js') }}"></script>
		@stop
</html>