<html ng-app="app">

	@extends('templates.admin.template')

		@section('scripts')
			<meta charset="utf-8">
		    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <meta name="viewport" content="width=device-width, initial-scale=1">
		    <meta name="csrf-token" content="{{ csrf_token() }}" />

		    <title>BDQ - Lista de Professores</title>

		@stop
		<style type="text/css">
			input[type="text"][readonly] {
				   color: #2c3e50;
				}
		</style>

		@section('content')
		@section('titulo')
			<i class="fa fa-pencil" title="Edit"></i>
			Professores
		@stop
			<div class="container" style="margin-top: 40px;">
			<div id="main"></div>
			<i id="hasAngular"></i>
				<div ng-controller="ProfessorController">
					<div class="table-responsive">
						<table class="table table-bordered table-striped" style="border: 2px;">
							<thead>
								<tr>
									<th>
										<a href="#" ng-click="sortType = 'id'; sortReverse = !sortReverse">
										ID
										</a>
										<span ng-show="sortType == 'id' && !sortReverse" class="fa fa-caret-down"></span>
										<span ng-show="sortType == 'id' && sortReverse" class="fa fa-caret-up"></span>
									</th>

									<th>
										<a href="#" ng-click="sortType = 'matricula'; sortReverse = !sortReverse">
										Matricula</a>
	       								 <span ng-show="sortType == 'matricula' && !sortReverse" class="fa fa-caret-down"></span>
	      								 <span ng-show="sortType == 'matricula' && sortReverse" class="fa fa-caret-up"></span>
									</th>

									<th>
										<a href="#" ng-click="sortType = 'nome'; sortReverse = !sortReverse">
										Nome</a>
	            						<span ng-show="sortType == 'nome' && !sortReverse" class="fa fa-caret-down"></span>
	            						<span ng-show="sortType == 'nome' && sortReverse" class="fa fa-caret-up"></span>
									</th>

									<th>
										<a href="#" ng-click="sortType = 'sobrenome'; sortReverse = !sortReverse">
										Sobrenome</a>
	            						<span ng-show="sortType == 'sobrenome'  && !sortReverse" class="fa fa-caret-down"></span>
	            						<span ng-show="sortType == 'sobrenome'  && sortReverse" class="fa fa-caret-up"></span>
									</th>

									<th>
										<a href="#" ng-click="sortType = 'cpf'; sortReverse = !sortReverse">
										CPF</a>
	            						<span ng-show="sortType == 'cpf' && !sortReverse" class="fa fa-caret-down"></span>
	            						<span ng-show="sortType == 'cpf' && sortReverse" class="fa fa-caret-up"></span>
									</th>

									<th>
										<a href="#" ng-click="sortType = 'email'; sortReverse = !sortReverse">
										E-MAIL</a>
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

										<a href="/professor/config/@{{professor.id}}">
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
						<ul uib-pagination total-items="professores.length" ng-model="currentPage" items-per-page="pageSize" class="pagination-sm" boundary-links="true""></ul>
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
								      <span ng-if="professor.img_perfil !== null">
										<img class="perfil" src="@{{ professor.img_perfil }}">
								      </span>
								      <span ng-if="professor.img_perfil === null">
										<img class="perfil" style="width: 100%; height: 100%;" src="/images/semfoto.svg">
								      </span>
								        <a href="#">
								          <label class="button-position">
								          <form method="POST" action="/professor/upload" id="formPerfil" enctype="multipart/form-data">
								            <input id="file" name="file" type="file" style="display:none;" onchange="uploadPerfil(this);">
								            <input type="hidden" name="professor_id" value="@{{ professor.id }}">
								            <input name="_token" id="token" type="hidden" value="{{ csrf_token() }}">
								            <input type="submit" name="go" value="go">
								          </form>
								          </label>
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
									      			<th> name : @{{ professor.name }}</th>
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
								<fieldset style="width: 93%;">
									<legend>Dados Pessoais</legend>
									<md-input-container class="md-block">
										<label>Matricula</label>
											<md-icon md-svg-src="/images/admin/matricula.svg" class="name"></md-icon>
											<input required dado-unico md-no-asterisk type="text" name="matricula" value="@{{ professor.matricula }}" ng-model="professor.matricula" minlength="11" ng-model-options="{updateOn: 'blur'}" />
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
									</md-input-container>
		
								
								<div layout="row">
									<md-input-container class="md-block" flex="50">
										<label>Nome</label>
											<md-icon md-svg-src="/images/admin/name.svg" class="name"></md-icon>
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
											<md-icon md-svg-src="/images/admin/name.svg" class="name"></md-icon>
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
											<md-icon md-svg-src="/images/admin/cpf.svg" class="name"></md-icon>
											<input required dado-unico md-no-asterisk type="text" name="cpf" value="@{{ professor.cpf }}" ng-model="professor.cpf" maxlength="11" minlength="11" ng-model-options="{updateOn: 'blur'}"/>
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
											<md-icon md-svg-src="/images/admin/email.svg" class="name"></md-icon>
											<input required dado-unico md-no-asterisk type="email" name="email" value="@{{ professor.email }}" ng-model="professor.email" maxlength="30"  ng-model-options="{updateOn: 'blur'}"/>
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
								<!-- <div layout="row">
									<div class="form-group" ng-controller="DisciplinaController" flex="95" style="margin-left: auto; margin-right: auto;">										
										<select multiple class="form-control" ng-model="professor.disciplinas">
											<option value="" disabled="true">Selecione uma turma</option>
											<optgroup ng-repeat='disciplina in disciplinas track by $index' label="@{{disciplina.nome}}">
												<option ng-repeat="turma in disciplina.turmas" value="@{{disciplina.id}}">@{{turma.nome}}</option>
											</optgroup>
										</select>	
									</div>
								</div> -->
								</fieldset>
								<fieldset>
									<legend>Endereço</legend>
								
								<div class="form-group">
										<label>CEP</label>
										<div class="col-sm-9">
											<input required md-no-asterisk type="text" name="cep" class="zipcode form-control" value="@{{ professor.cep }}" ng-model="professor.cep" minlength="8"/>
											<div ng-messages="frmProfessor.cep.$error">
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
											<input required md-no-asterisk type="text" readonly="true" name="logradouro" value="@{{ professor.logradouro }}" class="logradouro form-control" ng-model="professor.logradouro" minlength="8"/>
											<div ng-messages="frmProfessor.logradouro.$error">
          										<div ng-message="required">
          											Campo logradouro é obrigatório.
          										</div>
         										<div ng-message="minlength">
          											Tamanho do campo logradouro deve ter no minimo 8 caracteres.
          										</div>
											</div>
										</div>
								</div>
								<div class="form-group">
									<label>Bairro</label>
									<div class="col-sm-9">
										<input required md-no-asterisk type="text" class="form-control" name="bairro" readonly="true" value="@{{ professor.bairro }}" ng-model="professor.bairro" class="bairro" minlength="8"/>

										<div ng-messages="frmProfessor.bairro.$error">
      										<div ng-message="required">
      											Campo bairro é obrigatório.
      										</div>
     										<div ng-message="minlength">
      											Tamanho do campo bairro deve ter no minimo 8 caracteres.
      										</div>
										</div>
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
											<input required md-no-asterisk type="text" class="uf form-control" name="uf" readonly="true" value="@{{ professor.uf }}" ng-model="professor.uf" minlength="8"/>
											<div ng-messages="frmProfessor.uf.$error">
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
										<input required md-no-asterisk type="text" readonly="true" class="cidade form-control" name="cidade" value="@{{ professor.cidade }}" ng-model="professor.cidade" minlength="8"/>
										<div ng-messages="frmProfessor.cidade.$error">
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
									
									<md-input-container class="md-block" flex="50">
										<label>E-mail</label>
											<md-icon md-svg-src="/images/admin/email.svg" class="name"></md-icon>
											<input required  md-no-asterisk type="password" name="password" value="@{{ professor.password }}" ng-model="professor.password" maxlength="30"  ng-model-options="{updateOn: 'blur'}"/>
											<div ng-messages="frmProfessor.password.$error">
          										<div ng-message="required">
          											Campo password é obrigatório.
          										</div>
         										<div ng-message="maxlength">
          											Tamanho do campo password deve ter no máximo 30 caracteres.
          										</div>
         										<div ng-message="dadoUnico">
          											E-mail já existente.
          										</div>        										
												<span class="text-success" ng-show="frmProfessor.password.$valid">
													E-mail disponível.
												</span>
												<span ng-if="frmProfessor.password.$pending" >
 													<md-progress-circular ng-disabled="!vm.activated" class="md-hue-2" md-diameter="20px"></md-progress-circular>
 												</span>
											</div>
									</md-input-container>
										<md-input-container class="md-block">
											<label>Confirmar Password</label>
											<md-icon md-svg-src="/images/admin/cpf.svg" class="name"></md-icon>
												<input required md-no-asterisk type="password" name="confirmPassword" value="@{{ professor.password }}" ng-model="professor.confirmPassword" minlength="8" confirmar-password="professor.password"/>
												<div ng-messages="frmProfessor.confirmPassword.$error">
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
										</md-input-container>
								</fieldset>
							</form>
								<div class="modal-footer">
					                <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmProfessor.$invalid">Salvar</button>
					            </div>
							</div>
						</div>
					</div>
				</div>

				</div>	
			</div>
		</div>
		    @include('shared.angular_scripts')
			<!-- Script para limpar o modal -->
			<script type="text/javascript">
				$(document).ready(function() {
					$('#myModal').on('hidden.bs.modal', function () {
				    	$(this).find("input,textarea").val('').end();

					});
				});


				function uploadPerfil(input)
				{
					 if (input.files && input.files[0]) {
				        var reader = new FileReader();

				        reader.onload = function (e) {
				            $('.perfil').attr('src', e.target.result);
				        }

				        reader.readAsDataURL(input.files[0]);
				    }

				}
				
				$("#uploadForm").on('submit',(function(e) {
				    e.preventDefault();
				    $.ajax({
				        url: $('#uploadForm').attr('action'),
				        type: "POST",
				        data:  new FormData(this),
				        contentType: false,
				        cache: false,
				        processData: false,
				        success: function(data){
				            console.log(data);
				        }           
				    });
				}));

			</script>
		@stop
</html>
