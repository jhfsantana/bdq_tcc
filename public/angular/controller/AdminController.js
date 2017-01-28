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
		      $scope.administrador = angular.copy(response);
		      $scope.delete;
		      console.log(response);
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
			var isConfirmDelete = confirm('Tem certeza que deseja excluir esse Administrador?');
			if (isConfirmDelete) {
			 adminAPI.deleteAdministrador(id).success(function(data){
			   console.log(data);
			   location.reload();
			 }).error(function(data){
			   console.log(data);
			   alert('ocorreu um erro');
			 });
			} else {
			 return false;
			}
		}

		$scope.$on('modal.hidden', function() {
  		// Execute action
		      $scope.delete;
		});
	});