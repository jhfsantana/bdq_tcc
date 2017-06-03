app.controller('DisciplinaController', function($scope, $http, API_URL, disciplinaAPI)
	{
		$scope.pageSize = 5;
		$scope.currentPage = 1;
		
		disciplinaAPI.getDisciplinas()
		.success(function(response)
		{
			$scope.disciplinas = response;
		});

		disciplinaAPI.getDisciplinaByProfessor()
		.success(function(response)
		{
			$scope.disciplinasProfessor = response;
		});

		$scope.toggle = function(modalstate, id) {
		  $scope.modalstate = modalstate;
		  switch(modalstate) {
		    case 'add':
		      $scope.form_title = "Cadastrar nova disciplina";
		      break;
		    case 'edit':
		      $scope.form_title = "Alterar disciplina";
		      $scope.id = id;
		      $http.get(API_URL + 'disciplinas/' + id)
		      .success(function(response){
			      $scope.disciplina = response;
			      console.log(response);
		      });
		      break;
			case 'details':
		      $scope.form_title = "Detalhes";
		      $scope.id = id;
		      $http.get(API_URL + 'disciplinas/' + id)
		      .success(function(response){
			      $scope.disciplina = response;
			      console.log(response);
		      });
		      break;
		    default:
		      break;
		  }
		  
		  if(modalstate === 'add' || modalstate === 'edit')
		  {
		  	$('#myModal').modal('show');
		  }
		  else
		  {
		  	$('#detailsModal').modal('show');
		  }
		}

		$scope.save = function(modalstate, id) {
			var url = API_URL + "disciplinas";
			if (modalstate === 'edit') {
				url += "/" + id;
				$http({
				  method: 'post',
				  url: url,
				  data: $.param($scope.disciplina),
				  headers: {'Content-Type': 'application/x-www-form-urlencoded'}
				}).success(function(response){
				  console.log(response);
				  location.reload();
				}).error(function(response){
					if(response.turmas)
					{
						$('#main').html('<div class="alert alert-danger col-ssm-12" >' + response.turmas[0] + '</div>');
					}
				  console.log(response);
				});
			}
			else
			{
				disciplinaAPI.saveDisciplina($scope.disciplina)
				.success(function(response){
					
					if(response.error)
					{
						$('#main').html('<div class="alert alert-danger col-ssm-12" >' + response.message + '</div>');
					}
					else if(response.success)
					{
						$('#main').html('<div class="alert alert-success col-ssm-12" >' + response.message + '</div>');
					}
				disciplinaAPI.getDisciplinas()
				.success(function(response)
				{
					$scope.disciplinas = response;
					
					$(function () {
					   $('#myModal').modal('toggle');
					});
				});
				}).error(function(response){
					alert('ocorreu um erro, verifique o log');
				});
			}
		}
		
		$scope.confirmDelete = function(id) {
			swal({
			  title: "Você tem certeza que deseja remover esta disciplina?",
			  text: "Não será possivel recuperar esse registro, caso seja deletado, cuidado!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Sim, quero deletar!",
			  cancelButtonText: "Não, quero cancelar solicitação!",
			  closeOnConfirm: false,
			  closeOnCancel: false
			},
			function(isConfirm){
			  if (isConfirm) {
			    swal("Deletado!", "Registro foi deletado com sucesso.", "success");
			    disciplinaAPI.deleteDisciplina(id).success(function(data){

			   	if (data.message)
			   	{
			   		$('#main').html('<div class="alert alert-danger col-ssm-12" >' + data.message + '</div>');
			   	}
			   	else
			   	{
					swal("Cancelado", "Ocorreu um erro!	", "error");
					$('#main').html('<div class="alert alert-danger col-ssm-12" >' + data.error + '</div>');
			   	}

			   	$('#myModal').modal('hide');

				disciplinaAPI.getDisciplinas()
				.success(function(response)
				{
					$scope.disciplinas = response;
				});

			 }).error(function(data){
			   	console.log(data);
			    swal("Cancelado", "Ocorreu um erro!	", "error");
			 });

			  } else {
			    swal("Cancelado", "Solicitação cancelada!", "error");
			  }
			});
		}

		$scope.$on('modal.hidden', function() {
  		// Execute action
  		$scope.disciplina = {};
		});

});