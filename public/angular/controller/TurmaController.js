app.controller('TurmaController', function($scope, $http, API_URL, turmaAPI)
	{
		$scope.pageSize = 5;
		$scope.currentPage = 1;
		
		turmaAPI.getTurmas()
		.success(function(response)
		{
			$scope.turmas = response;
		});

		$scope.toggle = function(modalstate, id) {
		  $scope.modalstate = modalstate;
		  switch(modalstate) {
		    case 'add':
		      $scope.form_title = "Cadastrar nova Turma";
		      break;
		    case 'edit':
		      $scope.form_title = "Alterar Turma";
		      $scope.id = id;
		      $http.get(API_URL + 'turmas/' + id).success(function(response){
		      $scope.turma = response;
		      console.log(response);
		      });
		      break;
			case 'details':
		      $scope.form_title = "Detalhes";
		      $scope.id = id;
		      $http.get(API_URL + 'turmas/' + id).success(function(response){
		      $scope.turma = response;
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
			var url = API_URL + "turmas";
			if (modalstate === 'edit') {
				url += "/" + id;
				$http({
				  method: 'post',
				  url: url,
				  data: $.param($scope.turma),
				  headers: {'Content-Type': 'application/x-www-form-urlencoded'}
				}).success(function(response){
				  location.reload();
				}).error(function(response){
				  alert('ocorreu um erro, verifique o log');
				});
			}
			else
			{
				turmaAPI.saveTurma($scope.turma).success(function(response){
				if(response.success)
				{
					$('#main').html('<div class="alert alert-success col-ssm-12" >' + response.success + '</div>');
					$(function () {
					   $('#myModal').modal('toggle');
					});
				}
				turmaAPI.getTurmas()
					.success(function(response)
						{
							$scope.turmas = response;
						});				
			  	}).error(function(response){
					if(response.error)
					{
						$('#main').html('<div class="alert alert-danger col-ssm-12" >' + response.error + '</div>');
						$(function () {
					   $('#myModal').modal('toggle');
					});
					}				
				});
			}
		}
		
		$scope.confirmDelete = function(id) {
			swal({
			  title: "Você tem certeza que deseja remover esta turma?",
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
			    turmaAPI.deleteTurma(id).success(function(data){

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

				turmaAPI.getTurmas()
				.success(function(response)
				{
					$scope.turmas = response;
				});

			 }).error(function(data){
			    swal("Cancelado", "Ocorreu um erro!	", "error");
			 });

			  } else {
			    swal("Cancelado", "Solicitação cancelada!", "error");
			  }
			});
		}

		$scope.$on('modal.hidden', function() {
  		// Execute action
  		$scope.turma = {};
		});

});