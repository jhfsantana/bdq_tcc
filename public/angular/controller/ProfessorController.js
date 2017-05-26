app.controller('ProfessorController', function($scope, $http, API_URL, professorAPI)
	{
		
		$scope.pageSize = 5;
		$scope.currentPage = 1;
		professorAPI.getProfessores()
		.success(function(response)
		{
			$scope.professores = response;
		});
// show modal Form
		$scope.toggle = function(modalstate, id) {
		  $scope.modalstate = modalstate;
		  switch(modalstate) {
		    case 'add':
		      $scope.form_title = "Cadastrar novo Professor";
		      break;
		    case 'edit':
		      $scope.form_title = "Alterar Professor";
		      $scope.id = id;
		      $http.get(API_URL + 'professores/' + id).success(function(response){
		      $scope.professor = response;
		      console.log(response);
		      });
		      break;
 			case 'details':
		      $scope.form_title = "Detalhes";
		      $scope.id = id;
		      $http.get(API_URL + 'professores/' + id).success(function(response){
		      $scope.professor = response;
		      console.log(response);
		  		$('#detailsModal').modal('show');

		      });
		      break;
		    default:
		      break;
		  }
		  if(modalstate === 'add' || modalstate === 'edit')
		  {
		  	$('#myModal').modal('show');
		  }else
		  {
		  	$('#detailsModal').modal('show');
		  }
		}

		// save new supplier and update existing supplier
		$scope.save = function(modalstate, id) {
			var url = API_URL + "professores";
			if (modalstate === 'edit') {
				url += "/" + id;
				$http({
				  method: 'POST',
				  url: url,
				  data: $.param($scope.professor),
				  headers: {'Content-Type': 'application/x-www-form-urlencoded'}
				}).success(function(response){
				  console.log(response);
				  location.reload();
				}).error(function(response){
				  console.log(response);
				  alert('ocorreu um erro, verifique o log');
				});
			}
			else
			{
				professorAPI.saveProfessor($scope.professor).success(function(response){
				  console.log(response);
				  location.reload();
				}).error(function(response){
				  console.log(response);
				  alert('ocorreu um erro, verifique o log');
				});
			}
		}

	 // delete supplier record
		$scope.confirmDelete = function(id) {
			swal({
			  title: "Você tem certeza que deseja remover este professor?",
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
			    professorAPI.deleteProfessor(id).success(function(data){

			   	if (data.message)
			   	{
			   		$('#main').html('<div class="alert alert-danger col-ssm-12" >' + data.message + '</div>');
			   	}

			   	$('#myModal').modal('hide');

				professorAPI.getProfessores()
				.success(function(response)
				{
					$scope.professores = response;
				});

			 }).error(function(data){
			   	console.log(data);
			    swal("Cancelado", "Ocorreu um erro!	", "error");
			 });

			  } else {
			    swal("Cancelado", "Solicitação cancelada!", "error");
			  }
			});



			/*var isConfirmDelete = confirm('Tem certeza que deseja excluir esse professor?');
			if (isConfirmDelete) {
			 professorAPI.deleteProfessor(id).success(function(data){
			   console.log(data);
			   location.reload();
			 }).error(function(data){
			   console.log(data);
			   alert('ocorreu um erro');
			 });
			} else {
			 return false;
			}*/
		}

		$scope.$on('modal.hidden', function() {
  		// Execute action
  		$scope.professor = {};
		});


});