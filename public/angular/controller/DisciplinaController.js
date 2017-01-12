app.controller('DisciplinaController', function($scope, $http, API_URL)
	{
		$http.get(API_URL + "disciplinas")
		.success(function(response)
		{
			$scope.disciplinas = response;
		});
	});
