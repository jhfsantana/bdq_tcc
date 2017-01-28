app.controller('DisciplinaController', function($scope, $http, API_URL, disciplinaAPI)
	{
		$scope.pageSize = 5;
		$scope.currentPage = 1;

		disciplinaAPI.getDisciplinas()
		.success(function(response)
		{
			$scope.disciplinas = response;
		});

	$scope.toggle = function(modalstate, id) {
		  $scope.modalstate = modalstate;
		  switch(modalstate) {
		    case 'add':
		      $scope.form_title = "Cadastrar nova Disciplina";
		      break;
		    case 'edit':
		      $scope.form_title = "Alterar Disciplina";
		      $scope.id = id;
		      $http.get(API_URL + 'disciplinas/' + id).success(function(response){
		      $scope.disciplina = response;
		      console.log(response);
		      });
		      break;
			case 'details':
		      $scope.form_title = "Detalhes";
		      $scope.id = id;
		      $http.get(API_URL + 'disciplinas/' + id).success(function(response){
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
				  console.log(response);
				  alert('ocorreu um erro, verifique o log');
				});
			}
			else
			{
				disciplinaAPI.saveDisciplina($scope.disciplina).success(function(response){
				  console.log(response);
				  location.reload();
				}).error(function(response){
				  console.log(response);
				  alert('ocorreu um erro, verifique o log');
				});
			}
		}
		
		$scope.confirmDelete = function(id) {
			var isConfirmDelete = confirm('Tem certeza que deseja excluir essa disciplina?');
			if (isConfirmDelete) {
			 disciplinaAPI.deleteDisciplina(id).success(function(data){
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
  		$scope.disciplina = {};
		});

});
