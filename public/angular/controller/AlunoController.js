app.controller('AlunoController', function($scope, $http, API_URL, alunoAPI)
	{
		$scope.pageSize = 5;
		$scope.currentPage = 1;
		alunoAPI.getAlunos()
		.success(function(response)
		{
			$scope.alunos = response;
		});

		$scope.toggle = function(modalstate, id) {
		  $scope.modalstate = modalstate;
		  switch(modalstate) {
		    case 'add':
		      $scope.form_title = "Cadastrar novo Aluno";
		      break;
		    case 'edit':
		      $scope.form_title = "Alterar Aluno";
		      $scope.id = id;
		      $http.get(API_URL + 'alunos/' + id).success(function(response){
		      $scope.aluno = response;
		      console.log(response);
		      });
		      break;
			case 'details':
		      $scope.form_title = "Detalhes";
		      $scope.id = id;
		      $http.get(API_URL + 'alunos/' + id).success(function(response){
		      $scope.aluno = response;
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
			var url = API_URL + "alunos";
			if (modalstate === 'edit') {
				url += "/" + id;
				$http({
				  method: 'post',
				  url: url,
				  data: $.param($scope.aluno),
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
				alunoAPI.saveAluno($scope.aluno).success(function(response){
				  console.log(response);
				  location.reload();
				}).error(function(response){
				  console.log(response);
				  alert('ocorreu um erro, verifique o log');
				});
			}
		}
		
		$scope.confirmDelete = function(id) {
			var isConfirmDelete = confirm('Tem certeza que deseja excluir esse aluno?');
			if (isConfirmDelete) {
			 alunoAPI.deleteAluno(id).success(function(data){
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
  		$scope.aluno = {};
		});

});