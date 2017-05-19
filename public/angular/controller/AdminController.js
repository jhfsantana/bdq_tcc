app.controller('AdminController', function($scope, $http, API_URL, adminAPI)
	{
		$scope.pageSize = 5;
		$scope.currentPage = 1;
		adminAPI.getAdministradores()
		.success(function(response)
		{
			$scope.administradores = response;
		});
// show modal Form
		$scope.toggle = function(modalstate, id) {
		  $scope.modalstate = modalstate;
		  switch(modalstate) {
		    case 'add':
		      $scope.form_title = "Cadastrar novo Administrador";
		      break;
		    case 'edit':
		      $scope.form_title = "Alterar Administrador";
		      $scope.id = id;
		      $http.get(API_URL + 'administradores/' + id).success(function(response){
		      $scope.administrador ='';
		      $scope.administrador = response;
		      });
		      break;
 			case 'details':
		      $scope.form_title = "Detalhes";
		      $scope.id = id;
		      $http.get(API_URL + 'administradores/' + id).success(function(response){
		      $scope.administrador = response;
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
			var url = API_URL + "administradores";
			if (modalstate === 'edit') {
				url += "/" + id;
				$http({
				  method: 'PUT',
				  url: url,
				  data: $.param($scope.administrador),
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
				adminAPI.saveAdministrador($scope.administrador).success(function(response){
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
			  title: "Você tem certeza que deseja remover este admin?",
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
			    adminAPI.deleteAdministrador(id).success(function(data){

			   	if (data.message)
			   	{
			   		$('#main').html('<div class="alert alert-danger col-ssm-12" >' + data.message + '</div>');
			   	}

			   	$('#myModal').modal('hide');

				adminAPI.getAdministradores()
				.success(function(response)
				{
					$scope.administradores = response;
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
		      $scope.delete;
		});
	});