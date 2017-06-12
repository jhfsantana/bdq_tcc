<html ng-app="app">

	@extends('templates.admin.template')

		@section('scripts')
			<meta charset="utf-8">
		    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <meta name="viewport" content="width=device-width, initial-scale=1">
		    <title>BDQ - Lista de Administradores</title>

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
		@section('titulo')
			<i class="fa fa-cogs" title="Edit"></i>
			Administradores
		@stop
		@section('content')
			<div class="container" style="margin-top: 5px;">
    		<div id="main
    		"></div>
		    @if(!empty($errors->all()))
		    <div class="alert alert-danger" role="alert-danger">
		        @foreach($errors->all() as $error)
		            <ul>
		                <li> {{$error}}</li>
		            </ul>
		        @endforeach
		    </div>
		    @endif
				<div ng-controller="AdminController">
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
										<a href="#" ng-click="sortType = 'name'; sortReverse = !sortReverse">
										Nome
	            						<span ng-show="sortType == 'name' && !sortReverse" class="fa fa-caret-down"></span>
	            						<span ng-show="sortType == 'name' && sortReverse" class="fa fa-caret-up"></span>
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
										<button id="btn-add" class="btn btn-success btn-md" ng-click="toggle('add', 0)">Novo administrador</button>
									</th>
								</tr>
							</thead>
							<tbody>
							<div class="input-group col-xs-4" style="margin-bottom: 8px;">
								<span class="input-group-addon" id="sizing-addon2" style="background-color: #ccc;"><i class="glyphicon glyphicon-search"></i></span>
								<input type="text" class="form-control" placeholder="Buscar" aria-describedby="sizing-addon2" ng-model="buscar">
							</div>
								<tr ng-repeat="administrador in administradores | filter:buscar | comecarEm:(currentPage - 1) * pageSize | limitTo:pageSize | orderBy:sortType:sortReverse">
									<td>@{{ administrador.id }}</td>
									<td>@{{ administrador.matricula }}</td>
									<td>@{{ administrador.name }}</td>
									<td>@{{ administrador.sobrenome }}</td>
									<td>@{{ administrador.cpf }}</td>
									<td>@{{ administrador.email }}</td>
									<td style="text-align: right;">
										<button class="btn btn-warning btn-sm btn-detail" ng-click="toggle('edit', administrador.id)">
											<span class="glyphicon glyphicon-edit"></span>
										</button>

										<button class="btn btn-danger btn-sm btn-delete" ng-click="confirmDelete(administrador.id)" style="margin-left: 10px;">
											<span class="glyphicon glyphicon-trash"></span>
										</button>

										<button class="btn btn-info btn-sm btn-details" ng-click="toggle('details', administrador.id)" style="margin-left: 10px;">
											<span class="glyphicon glyphicon-search"></span>
										</button>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
    				<div  style="text-align: center; width: 100%;">
						<ul uib-pagination total-items="administradores.length" ng-model="currentPage" items-per-page="pageSize" class="pagination-sm" boundary-links="true""></ul>
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
							<fieldset>
								<legend>
									Dados pessoais
								</legend>
								<div layout="row">
									<md-input-container class="md-block"  flex="50">
										<label>Matricula</label>
										<md-icon md-svg-src="/images/admin/matricula.svg" class="name"></md-icon>
											<input required dado-unico md-no-asterisk type="text" name="matricula" value="@{{ administrador.matricula }}" ng-model="administrador.matricula" minlength="11" ng-model-options="{updateOn: 'blur'}"/>
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
									</md-input-container>
								</div>
		
		
							
								<div layout="row">
									<md-input-container class="md-block" flex="50">
										<label>Nome</label>
											<md-icon md-svg-src="/images/admin/name.svg" class="name"></md-icon>
											<input required md-no-asterisk type="text" name="name" value="@{{ administrador.name }}" ng-model="administrador.name" maxlength="30"/>
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
											<md-icon md-svg-src="/images/admin/sobrenome.svg" class="name"></md-icon>										
											<input required md-no-asterisk type="text" name="sobrenome" value="@{{ administrador.sobrenome }}" ng-model="administrador.sobrenome" maxlength="30"/>
											<div ng-messages="frmAdmin.sobrenome.$error">
          										<div ng-message="required">
          											Campo sobrename é obrigatório.
          										</div>
         										<div ng-message="maxlength">
          											Tamanho do campo sobrenome deve ter no máximo 30 caracteres.
          										</div>
											</div>
									</md-input-container>
								<!-- ID DO ADMIN CAMPO HIDDEN -->
								<input type="hidden" name="id" id="id" value="@{{ administrador.id }}" ng-model="administrador.id">
								</div>



								<div layout="row">
									<md-input-container class="md-block" flex="50">
										<label>CPF</label>
											<md-icon md-svg-src="/images/admin/cpf.svg" class="name"></md-icon>
											<input required dado-unico md-no-asterisk type="text" name="cpf" value="@{{ administrador.cpf }}" ng-model="administrador.cpf" minlength="11" ng-model-options="{updateOn: 'blur'}"/>
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
         										<div ng-message="dadoUnicoNovo">
          											cpf já existente.
          										</div>          										
												<span class="text-success" ng-show="frmAdmin.cpf.$valid">
													cpf disponível.
												</span>
												<span ng-if="frmAdmin.cpf.$pending" >
 													<md-progress-circular ng-disabled="!vm.activated" class="md-hue-2" md-diameter="20px"></md-progress-circular>
 												</span>
											</div>
									</md-input-container>

									<md-input-container class="md-block" flex="50">
										<label>E-MAIL</label>
											<md-icon md-svg-src="/images/admin/email.svg" class="name"></md-icon>
											<input dado-unico required md-no-asterisk type="text" name="email" value="@{{ administrador.email }}" ng-model="administrador.email"  minlength="11" ng-model-options="{updateOn: 'blur'}"/>
											<div ng-messages="frmAdmin.email.$error">
          										<div ng-message="required">
          											Campo email é obrigatório.
          										</div>
         										<div ng-message="dadoUnico">	
          											email já existente.
          										</div>
												<span ng-if="frmAdmin.email.$pending" >
 													<md-progress-circular ng-disabled="!vm.activated" class="md-hue-2" md-diameter="20px"></md-progress-circular>
 												</span>
												<span class="text-success" ng-show="frmAdmin.email.$valid">
													email disponível.
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
											<input required md-no-asterisk type="text" name="cep" class="zipcode form-control" value="@{{ administrador.cep }}" ng-model="administrador.cep" minlength="8" ng-model-options="{updateOn: 'blur'}"/>
											<div ng-messages="frmAdmin.cep.$error">
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
											<input required md-no-asterisk type="text" readonly="true" name="logradouro" value="@{{ administrador.logradouro }}" class="logradouro form-control" ng-model="administrador.logradouro" minlength="8"/>
											
										</div>
								</div>
								<div class="form-group">
									<label>Bairro</label>
									<div class="col-sm-9">
										<input required md-no-asterisk type="text" class="form-control" name="bairro" readonly="true" value="@{{ administrador.bairro }}" ng-model="administrador.bairro" class="bairro" minlength="8"/>

										
									</div>
								</div>
								<!-- <md-input-container class="md-block" flex="50">
										<label>Bairro</label>
											<input required md-no-asterisk type="bairro" name="bairro" value="@{{ professor.bairro }}" ng-model="professor.bairro" maxlength="30"  ng-model-options="{updateOn: 'blur'}"/>
											<div ng-messages="frmProfessor.bairro.$error">
          										<div ng-message="required">
          											Campo bairro é obrigatório.
          										</div>
         										<div ng-message="maxlength">
          											Tamanho do campo bairro deve ter no máximo 30 caracteres.
          										</div>
         										<div ng-message="dadoUnico">
          											E-mail já existente.
          										</div>        										
												<span class="text-success" ng-show="frmProfessor.bairro.$valid">
													E-mail disponível.
												</span>
												<span ng-if="frmProfessor.bairro.$pending" >
 													<md-progress-circular ng-disabled="!vm.activated" class="md-hue-2" md-diameter="20px"></md-progress-circular>
 												</span>
											</div>
									</md-input-container> -->
								<div class="form-group">
										<label>UF</label>
										<div class="col-sm-9">
											<input required md-no-asterisk type="text" class="uf form-control" name="uf" readonly="true" value="@{{ administrador.uf }}" ng-model="administrador.uf" minlength="2"/>
											
										</div>
								</div>
								<div class="form-group">
									<label>Cidade</label>
									<div class="col-sm-9">
										<input required md-no-asterisk type="text" readonly="true" class="cidade form-control" name="cidade" value="@{{ administrador.cidade }}" ng-model="administrador.cidade" minlength="8"/>
										
									</div>
								</div>
							</fieldset>
							<fieldset>
								<legend>
									Segurança
								</legend>
								<div layout="row">
									<md-input-container class="md-block">
										<label>Password</label>
											<md-icon md-svg-src="/images/admin/cpf.svg" class="name"></md-icon>
											<input required md-no-asterisk type="password" name="password" value="@{{ administrador.password }}" ng-model="administrador.password" minlength="8"/>
											<div ng-messages="frmAdmin.password.$error">
          										<div ng-message="required">
          											Campo password é obrigatório.
          										</div>
         										<div ng-message="minlength">
          											Tamanho do campo password deve ter no minimo 8 caracteres.
          										</div>
											</div>
									</md-input-container>
									<md-input-container class="md-block">
										<label>Confirmar Password</label>
											<md-icon md-svg-src="/images/admin/cpf.svg" class="name"></md-icon>
											<input required md-no-asterisk type="password" name="confirmarPassword" value="@{{ administrador.password }}" ng-model="administrador.confirmarPassword" minlength="8" confirmar-password="administrador.password"/>
											<div ng-messages="frmAdmin.confirmarPassword.$error">
          										<div ng-message="required">
          											Campo password é obrigatório.
          										</div>
         										<div ng-message="minlength">
          											Tamanho do campo password deve ter no minimo 8 caracteres.
          										</div>
          										<div ng-message="confirmarPassword">
          											Confirmação inválida, o password deverá se igual ao do campo ao lado.
          										</div>
											</div>
									</md-input-container>
								</div>
							</fieldset>
							</form>
								<div class="modal-footer">
									<div ng-if="modalstate == 'add'" >
					                	<button type="button"  class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmAdmin.$invalid">Salvar</button>
					                </div>
					                <div ng-if="modalstate == 'edit'" >
					                	<button type="button"  class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)">Salvar</button>
					                </div>
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
								          <label class="button-position">
								            <input id="file" name="file" type="file" style="display:none;" onchange="$('#upload-file-info').html($(this).val());">
								          </label>
								        </a>
								      </div>
								      </div>
								    </div>
								      	<table class="table" style="position: relative; margin-top: 60px;">
								      		<thead>
									      		<tr>
									      			<th> ID : @{{ administrador.id }}</th>
									      		</tr>
									      		<tr>
									      			<th> Matricula : @{{ administrador.matricula }}</th>
									      		</tr>
									      		<tr>
									      			<th> name : @{{ administrador.name }}</th>
									      		</tr>
									      		<tr>
									      			<th> Sobrenome : @{{ administrador.sobrenome }}</th>
												</tr>
									      		<tr>
									      			<th> CPF : @{{ administrador.cpf }}</th>
									      		</tr>
									      		<tr>
									      			<th> E-MAIL : @{{ administrador.email }}</th>
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
		@stop
</html>