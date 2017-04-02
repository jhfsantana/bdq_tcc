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
				<div id="main"></div>
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

									<th style="text-align: right; margin-bottom: 10px; padding: 5px;">
										<md-button id="btn-add"  class="md-raised md-primary" ng-click="toggle('add', 0)">Nova Questão</md-button>
										
										<a href="/admin/lote"><md-button id="btn-add"  class="md-raised md-warn">CADASTRAR EM LOTE</md-button></a>
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
							<form name="frmAdmin" class="form-horizontal" novalidate="" onsubmit="parent.scrollTo(0, 0); return true"> 
							<div id="campo_vazio"></div>
							<div layout="row" flex="90" layout-align="center center" style="margin-left: auto; margin-right: auto;">
								<div class="panel panel-default">
									<div class="panel-heading">Escolha um nivel de dificuldade</div>
									<div class="panel-body">
										<div layout="row">
											<md-radio-group required ng-model="questao.nivel" layout="row" >
												<md-radio-button value="1" class="md-warn" checked="checked">Facil</md-radio-button>
												<md-radio-button value="2" class="md-warn">Moderada</md-radio-button>
												<md-radio-button value="3" class="md-warn">Dificil</md-radio-button>
												<md-radio-button value="4" class="md-warn">Muito Dificil</md-radio-button>
											</md-radio-group>									
										</div>
									</div>
								</div>
							</div>
							
							<div layout="row" layout-align="center center">
								<div class="form-group" ng-controller="DisciplinaController" flex="70">
									<select class="form-control" name="disciplina_id" ng-model="questao.disciplina_id" ng-options="disciplina.id as disciplina.nome for disciplina in disciplinas">
    									<option style="display:none" value="">Selecione uma disciplina</option>
									</select>
								</div>
							</div>
							<div layout="row" layout-align="center center">
								<div class="form-group" flex="90">
									<md-icon md-svg-src="/images/q.svg/" style="margin-bottom: 8px; margin-left: 5px;	"></md-icon>
									<md-input-container class="md-block">
										<label>Enunciado</label>
											<textarea required md-no-asterisk md-maxlength="535" name="questao" rows="5" value="@{{ questao.questao }}" ng-model="questao.questao" minlength="8"  md-select-on-focus>
											</textarea>
											<div ng-messages="frmAdmin.questao.$error">
          										<div ng-message="required">
          											Campo enunciado é obrigatório.
          										</div>
         										<div ng-message="minlength">
          											Tamanho da enunciado deve ser no minimo 8 caracteres.
          										</div>
         										<div ng-message="maxlength">
          											Limite maximo de 200 caracteres
          										</div>
											</div>
									</md-input-container>
								</div>
							</div>

								<div layout="row" layout-align="center center" style="margin-top: 10px;">
									<md-input-container class="md-block" flex="90">
										<label>Alternativa A</label>
										<md-icon md-svg-src="/images/a.svg/" style="margin-bottom: 8px; margin-left: 5px;	"></md-icon>
											<input required md-no-asterisk type="text" name="a" ng-model="questao.alternativaA" maxlength="250" value="@{{ questao.alternativaA }}" />
											<div ng-messages="frmAdmin.name.$error">
          										<div ng-message="required">
          											Campo nome é obrigatório.
          										</div>
         										<div ng-message="minlength">
          											Tamanho do nome deve ser no minimo 11 caracteres.
          										</div>
											</div>
									</md-input-container>
								</div>

								<div layout="row" layout-align="center center">
									<md-input-container class="md-block" flex="90">
										<label>Alternativa B</label>
										<md-icon md-svg-src="/images/.svg/" style="margin-bottom: 8px; margin-left: 5px;	"></md-icon>
											<input required md-no-asterisk type="text" name="b" ng-model="questao.alternativaB" maxlength="250" value="@{{ questao.alternativaB }}" />
											<div ng-messages="frmAdmin.name.$error">
          										<div ng-message="required">
          											Campo nome é obrigatório.
          										</div>
         										<div ng-message="minlength">
          											Tamanho do nome deve ser no minimo 11 caracteres.
          										</div>
											</div>
									</md-input-container>
								</div>

								<div layout="row" layout-align="center center">
									<md-input-container class="md-block" flex="90">
										<label>Alternativa C</label>
										<md-icon md-svg-src="/images/.svg/" style="margin-bottom: 8px; margin-left: 5px;	"></md-icon>
											<input required md-no-asterisk type="text" name="c" ng-model="questao.alternativaC" maxlength="250" value="@{{ questao.alternativaC }}" />
											<div ng-messages="frmAdmin.name.$error">
          										<div ng-message="required">
          											Campo nome é obrigatório.
          										</div>
         										<div ng-message="minlength">
          											Tamanho do nome deve ser no minimo 11 caracteres.
          										</div>
											</div>
									</md-input-container>
								</div>

								<div layout="row" layout-align="center center">
									<md-input-container class="md-block" flex="90">
										<label>Alternativa D</label>
										<md-icon md-svg-src="/images/.svg/" style="margin-bottom: 8px; margin-left: 5px;	"></md-icon>
											<input required md-no-asterisk type="text" name="d" ng-model="questao.alternativaD" maxlength="250" value="@{{ questao.alternativaD }}" />
											<div ng-messages="frmAdmin.name.$error">
          										<div ng-message="required">
          											Campo nome é obrigatório.
          										</div>
         										<div ng-message="minlength">
          											Tamanho do nome deve ser no minimo 11 caracteres.
          										</div>
											</div>
									</md-input-container>
								</div>


								<div layout="row" layout-align="center center">
									<md-input-container class="md-block" flex="90">
										<label>Alternativa E</label>
										<md-icon md-svg-src="/images/.svg/" style="margin-bottom: 8px; margin-left: 5px;	"></md-icon>
											<input required md-no-asterisk type="text" name="e" ng-model="questao.alternativaE" maxlength="250" value="@{{ questao.alternativaE }}" />
											<div ng-messages="frmAdmin.name.$error">
          										<div ng-message="required">
          											Campo nome é obrigatório.
          										</div>
         										<div ng-message="minlength">
          											Tamanho do nome deve ser no minimo 11 caracteres.
          										</div>
											</div>
									</md-input-container>

								</div>
							<div class="panel panel-info">
								<div class="panel-heading">Alternativa correta</div>
								<div class="panel-body">
									<div layout="row" style="margin-left: 28px;" layout-align="center center">
										<md-radio-group required ng-model="questao.correta" layout="row" >
											<md-radio-button value="a" class="md-warn">A</md-radio-button>
											<md-radio-button value="b" class="md-warn">B</md-radio-button>
											<md-radio-button value="c" class="md-warn">C</md-radio-button>
											<md-radio-button value="d" class="md-warn">D</md-radio-button>
											<md-radio-button value="e" class="md-warn">E</md-radio-button>
										</md-radio-group>									
									</div>
								</div>
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
		    <script src="/angular/services/disciplinaAPIService.js"></script>
		    <script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.1/angular-material.min.js"></script>
		@stop
</html>