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
		    default:
		      break;
		  }
		  console.log(id);
		  $('#myModal').modal('show');
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
			var isConfirmDelete = confirm('Tem certeza que deseja excluir esse professor?');
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
			}
		}

		$scope.$on('modal.hidden', function() {
  		// Execute action
  		$scope.professor = {};
		});
	});