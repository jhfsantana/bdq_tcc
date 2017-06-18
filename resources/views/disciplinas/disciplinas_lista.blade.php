<html ng-app="app">

	@extends('templates.admin.template')

		@section('scripts')
			<meta charset="utf-8">
		    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <meta name="viewport" content="width=device-width, initial-scale=1">
		    <title>BDQ - Lista de Disciplinas</title>

		    

		    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		    <!--[if lt IE 9]>
		      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
		      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		    <![endif]-->

		@stop
		

		@section('content')
		@section('titulo')
			<i class="fa fa-book" aria-hidden="true"></i>
			Disciplinas
		@stop
			<div class="container" style="margin-top: 80px;">
			<h3 style="text-align: center;">Lista de Disciplinas</h3>
			    <div id="main"></div>
				<div ng-controller="DisciplinaController">
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
										<a href="#" ng-click="sortType = 'nome'; sortReverse = !sortReverse">
										Nome

										
	            						<span ng-show="sortType == 'nome' && !sortReverse" class="fa fa-caret-down"></span>
	            						<span ng-show="sortType == 'nome' && sortReverse" class="fa fa-caret-up"></span>
									</th>

									<th style="text-align: right;">
										<button id="btn-add" class="btn btn-success btn-md" ng-click="toggle('add', 0)">Nova disciplina</button>
									</th>
								</tr>
							</thead>
							<tbody>
							<div class="input-group col-xs-4" style="margin-bottom: 8px;">
								<span class="input-group-addon" id="sizing-addon2" style="background-color: #ccc;"><i class="glyphicon glyphicon-search"></i></span>
								<input type="text" class="form-control" placeholder="Buscar" aria-describedby="sizing-addon2" ng-model="buscar">
							</div>
								<tr ng-repeat="disciplina in disciplinas | filter:buscar | comecarEm:(currentPage - 1) * pageSize | limitTo:pageSize | orderBy:sortType:sortReverse">
									<td>@{{ disciplina.id }}</td>
									<td>@{{ disciplina.nome }}</td>
									<td style="text-align: right;" title="Editar">
										<button class="btn btn-warning btn-sm btn-detail" ng-click="toggle('edit', disciplina.id)">
											<span class="glyphicon glyphicon-edit"></span>
										</button>

										<button class="btn btn-danger btn-sm btn-delete" ng-click="confirmDelete(disciplina.id)" style="margin-left: 10px;" title="Remover">
											<span class="glyphicon glyphicon-trash"></span>
										</button>

										<a href="/disciplina/config/@{{disciplina.id}}">
											<span class="btn btn-primary btn-sm btn-details"  style="margin-left: 10px;" title="Detalhes">
												<span class="glyphicon glyphicon-search" title="Detalhes">
												</span>
											</span>
										</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
    				<div  style="text-align: center; width: 100%;">
						<ul uib-pagination total-items="disciplinas.length" ng-model="currentPage" items-per-page="pageSize" class="pagination-sm" boundary-links="true""></ul>
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
							<form name="frmDisciplina" class="form-horizontal" novalidate=""> 
							
								<div layout="row">
									<md-input-container class="md-block" flex="50">
										<label>Nome</label>
											<input required  md-no-asterisk type="text" name="nome" value="@{{ disciplina.nome }}" ng-model="disciplina.nome" maxlength="30"/>
											<div ng-messages="frmDisciplina.nome.$error">
          										<div ng-message="required">
          											Campo nome é obrigatório.
          										</div>
         										<div ng-message="maxlength">
          											Tamanho do nome deve ter no máximo 30 caracteres.
          										</div>
											</div>
									</md-input-container>
								</div>
							</form>
								<div class="modal-footer">
					                <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmDisciplina.$invalid">Salvar</button>
					            </div>
							</div>
						</div>
					</div>
				</div>

<!-- 					<div class="modal  fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel" aria-hidden="true"	>
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
									      			<th> ID : @{{ disciplina.id }}</th>
									      		</tr>
									      		<tr>
									      			<th> nome : @{{ disciplina.nome }}</th>
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
		</div> -->
@include('shared.angular_scripts')
			<!-- Script para limpar o modal -->
			<script>
				$(document).ready(function() {
					$('#myModal').on('hidden.bs.modal', function () {
				    	$(this).find("input,textarea").val('').end();

					});
				});
			</script>
		@stop
</html>