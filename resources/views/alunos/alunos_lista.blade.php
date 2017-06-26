<html ng-app="app">

	@extends('templates.admin.template')

		@section('scripts')
			<meta charset="utf-8">
		    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <meta name="viewport" content="width=device-width, initial-scale=1">
		    <title>BDQ - Lista de Alunos</title>


		    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		    <!--[if lt IE 9]>
		      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
		      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		    <![endif]-->

		@stop
		
		<style type="text/css">
			input[type="text"][readonly] {
				   color: #2c3e50;
				}
		</style>
		@section('content')
		@section('titulo')
			<i class="fa fa-graduation-cap" aria-hidden="true"></i>
			Alunos
		@stop
			<div class="container" style="margin-top: 40px;">
			<h3 style="text-align: center;">Lista de Alunos</h3>
			<div id="main"></div>
				<div ng-controller="AlunoController">
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
										<button id="btn-add" class="btn btn-success btn-md" ng-click="toggle('add', 0)">Novo aluno</button>
									</th>
								</tr>
							</thead>
							<tbody>
							<div class="input-group col-xs-4" style="margin-bottom: 8px;">
								<span class="input-group-addon" id="sizing-addon2" style="background-color: #ccc;"><i class="glyphicon glyphicon-search"></i></span>
								<input type="text" class="form-control" placeholder="Buscar" aria-describedby="sizing-addon2" ng-model="buscar">
							</div>
								<tr ng-repeat="aluno in alunos  | comecarEm:(currentPage - 1) * pageSize | limitTo:pageSize | orderBy:sortType:sortReverse | filter:buscar">
									<td>@{{ aluno.id }}</td>
									<td>@{{ aluno.matricula }}</td>
									<td>@{{ aluno.nome }}</td>
									<td>@{{ aluno.sobrenome }}</td>
									<td>@{{ aluno.cpf }}</td>
									<td>@{{ aluno.email }}</td>
									<td style="text-align: right;">
										<button class="btn btn-warning btn-sm btn-detail" ng-click="toggle('edit', aluno.id)">
											<span class="glyphicon glyphicon-edit"></span>
										</button>

										<button class="btn btn-danger btn-sm btn-delete" ng-click="confirmDelete(aluno.id)" style="margin-left: 10px;">
											<span class="glyphicon glyphicon-trash"></span>
										</button>
										
										<button class="btn btn-info btn-sm btn-details" ng-click="toggle('details', aluno.id)" style="margin-left: 10px;">
											<span class="glyphicon glyphicon-search"></span>
										</button>

										<a href="/aluno/config/@{{aluno.id}}">
											<span class="btn btn-primary btn-sm btn-config"  style="margin-left: 10px;">
												<span class="glyphicon glyphicon-wrench">
												</span>
											</span>
										</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
    				<div  style="text-align: center; width: 100%;">
						<ul uib-pagination total-items="alunos.length" ng-model="currentPage" items-per-page="pageSize" class="pagination-sm" boundary-links="true""></ul>
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
							<form name="frmaluno" class="form-horizontal" novalidate="">
							<fieldset>
								<legend>
									Dados pessoais
								</legend>
								<div class="form-group">
									<md-input-container class="md-block">
										<label>Matricula</label>
										<div class="col-sm-9">
											<input required dado-unico md-no-asterisk type="number" name="matricula" value="@{{ aluno.matricula }}" ng-model="aluno.matricula" minlength="11" ng-model-options="{updateOn: 'blur'}" />
											<div ng-messages="frmaluno.matricula.$error">
          										<div ng-message="required">
          											Campo matricula é obrigatório.
          										</div>
         										<div ng-message="minlength">
          											Tamanho da matricula deve ser no minimo 11 caracteres.
          										</div>
         										<div ng-message="dadoUnico">
          											Matricula já existente.
          										</div>        										
												<span class="text-success" ng-show="frmaluno.matricula.$valid">
													Matricula disponível.
												</span>
												<span ng-if="frmaluno.matricula.$pending" >
 													<md-progress-circular ng-disabled="!vm.activated" class="md-hue-2" md-diameter="20px"></md-progress-circular>
 												</span>
											</div>
										</div>
									</md-input-container>
								</div>
								<!-- PASSANDO ID DO ALUNO PARA VALIDAR NA HORA DE ALTERAR -->
								<input type="hidden" name="id" id="id" value="@{{ aluno.id }}" ng-model="aluno.id">
								
								<div layout="row">
									<md-input-container class="md-block" flex="50">
										<label>Nome</label>
											<input required md-no-asterisk type="text" name="nome" value="@{{ aluno.nome }}" ng-model="aluno.nome" maxlength="30"/>
											<div ng-messages="frmaluno.nome.$error">
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
											<input required md-no-asterisk type="text" name="sobrenome" value="@{{ aluno.sobrenome }}" ng-model="aluno.sobrenome" maxlength="30"/>
											<div ng-messages="frmaluno.sobrenome.$error">
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
											<input required dado-unico md-no-asterisk type="text" name="cpf" value="@{{ aluno.cpf }}" ng-model="aluno.cpf" maxlength="11" minlength="11" ng-model-options="{updateOn: 'blur'}" />
											<div ng-messages="frmaluno.cpf.$error">
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
          											cpf já existente.
          										</div>        										
												<span class="text-success" ng-show="frmaluno.cpf.$valid">
													cpf disponível.
												</span>
												<span ng-if="frmaluno.cpf.$pending" >
 													<md-progress-circular ng-disabled="!vm.activated" class="md-hue-2" md-diameter="20px"></md-progress-circular>
 												</span>
											</div>
									</md-input-container>

									<md-input-container class="md-block" flex="50">
										<label>E-mail</label>
											<input required  dado-unico md-no-asterisk type="email" name="email" value="@{{ aluno.email }}" ng-model="aluno.email" maxlength="30" ng-model-options="{updateOn: 'blur'}" />
											<div ng-messages="frmaluno.email.$error">
          										<div ng-message="required">
          											Campo email é obrigatório.
          										</div>
         										<div ng-message="maxlength">
          											Tamanho do campo email deve ter no máximo 30 caracteres.
          										</div>
         										<div ng-message="dadoUnico">
          											email já existente.
          										</div>        										
												<span class="text-success" ng-show="frmaluno.email.$valid">
													email disponível.
												</span>
												<span ng-if="frmaluno.email.$pending" >
 													<md-progress-circular ng-disabled="!vm.activated" class="md-hue-2" md-diameter="20px"></md-progress-circular>
 												</span>
											</div>
									</md-input-container>
								</div>
							</fieldset>
							<fieldset>
									<legend>Endereço</legend>
								
								<div class="form-group">
										<label>CEP</label>
										<div class="col-sm-9">
											<input required md-no-asterisk type="text" name="cep" class="zipcode form-control" value="@{{ aluno.cep }}" ng-model="aluno.cep" minlength="8" ng-model-options="{updateOn: 'blur'}" />
											<div ng-messages="frmaluno.cep.$error">
          										<div ng-message="required">
          											Campo cep é obrigatório.
          										</div>
         										<div ng-message="minlength">
          											Tamanho do campo cep deve ter no minimo 8 caracteres.
          										</div>
											</div>
										</div>
								</div>
								<div class="form-group">
										<label>logradouro</label>
										<div class="col-sm-9">
											<input required md-no-asterisk type="text" readonly="true" name="logradouro" value="@{{ aluno.logradouro }}" class="logradouro form-control" ng-model="aluno.logradouro" minlength=3"/>
											<div ng-messages="frmaluno.logradouro.$error">
          										<div ng-message="required">
          											Campo logradouro é obrigatório.
          										</div>
         										<div ng-message="minlength">
          											Tamanho do campo logradouro deve ter no minimo 3 caracteres.
          										</div>
											</div>
										</div>
								</div>
								<div class="form-group">
									<label>Bairro</label>
									<div class="col-sm-9">
										<input required md-no-asterisk type="text" class="form-control" name="bairro" readonly="true" value="@{{ aluno.bairro }}" ng-model="aluno.bairro" class="bairro"/>

										<div ng-messages="frmaluno.bairro.$error">
      										<div ng-message="required">
      											Campo bairro é obrigatório.
      										</div>
										</div>
									</div>
								</div>
								<!-- <md-input-container class="md-block" flex="50">
										<label>Bairro</label>
											<input required md-no-asterisk type="bairro" name="bairro" value="@{{ aluno.bairro }}" ng-model="aluno.bairro" maxlength="30"  ng-model-options="{updateOn: 'blur'}"/>
											<div ng-messages="frmaluno.bairro.$error">
          										<div ng-message="required">
          											Campo bairro é obrigatório.
          										</div>
         										<div ng-message="maxlength">
          											Tamanho do campo bairro deve ter no máximo 30 caracteres.
          										</div>
         										<div ng-message="dadoUnico">
          											E-mail já existente.
          										</div>        										
												<span class="text-success" ng-show="frmaluno.bairro.$valid">
													E-mail disponível.
												</span>
												<span ng-if="frmaluno.bairro.$pending" >
 													<md-progress-circular ng-disabled="!vm.activated" class="md-hue-2" md-diameter="20px"></md-progress-circular>
 												</span>
											</div>
									</md-input-container> -->
								<div class="form-group">
										<label>UF</label>
										<div class="col-sm-9">
											<input required md-no-asterisk type="text" class="uf form-control" name="uf" readonly="true" value="@{{ aluno.uf }}" ng-model="aluno.uf" minlength="2"/>
											<div ng-messages="frmaluno.uf.$error">
          										<div ng-message="required">
          											Campo uf é obrigatório.
          										</div>
         										<div ng-message="minlength">
          											Tamanho do campo uf deve ter no minimo 8 caracteres.
          										</div>
											</div>
										</div>
								</div>
								<div class="form-group">
									<label>Cidade</label>
									<div class="col-sm-9">
										<input required md-no-asterisk type="text" readonly="true" class="cidade form-control" name="cidade" value="@{{ aluno.cidade }}" ng-model="aluno.cidade" minlength="8"/>
										<div ng-messages="frmaluno.cidade.$error">
	  										<div ng-message="required">
	  											Campo cidade é obrigatório.
	  										</div>
	 										<div ng-message="minlength">
	  											Tamanho do campo cidade deve ter no minimo 8 caracteres.
	  										</div>
										</div>
									</div>
								</div>
								</fieldset>
							<fieldset>
								<legend>
									Segurança
								</legend>
								<div class="form-group">
									<md-input-container class="md-block">
										<label>Password</label>
										<div class="col-sm-9">
											<input required md-no-asterisk type="password" name="password" value="@{{ aluno.password }}" ng-model="aluno.password" minlength="8"/>
											<div ng-messages="frmaluno.password.$error">
          										<div ng-message="required">
          											Campo password é obrigatório.
          										</div>
         										<div ng-message="minlength">
          											Tamanho do campo password deve ter no minimo 8 caracteres.
          										</div>
											</div>
										</div>
									</md-input-container>
									<md-input-container class="md-block">
										<label>Confirmar Password</label>
										<div class="col-sm-9">
											<input required md-no-asterisk type="password" name="confirmarPassword" value="@{{ aluno.password }}" ng-model="aluno.confirmarPassword" minlength="8" confirmar-password="aluno.password"/>
											<div ng-messages="frmaluno.confirmarPassword.$error">
          										<div ng-message="required">
          											Campo password é obrigatório.
          										</div>
         										<div ng-message="minlength">
          											Tamanho do campo password deve ter no minimo 8 caracteres.
          										</div>
          										<div ng-message="confirmarPassword">
	          										Confirmação inválida, digite o mesmo password do campo acima.
          										</div>
											</div>
										</div>
									</md-input-container>
								</div>
							</fieldset>
							</form>
								<div class="modal-footer">
					                <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmaluno.$invalid">Salvar</button>
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
									      			<th> ID : @{{ aluno.id }} - Matricula : @{{ aluno.matricula }}</th>
									      		</tr>
									      		<tr>
									      			<th> Nome : @{{ aluno.nome }} @{{ aluno.sobrenome }}</th>
									      		</tr>
									      		<tr>
									      			<th> CPF : @{{ aluno.cpf }}</th>
									      		</tr>
									      		<tr>
									      			<th> E-MAIL : @{{ aluno.email }}</th>
									      		</tr>
									      		<tr>
									      			<th> CEP : @{{ aluno.cep }} /  RUA : @{{ aluno.logradouro }}</th>
									      		</tr>
									      		<tr>
									      			<th> CIDADE : @{{ aluno.cidade }} / BAIRRO : @{{ aluno.bairro }}</th>
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