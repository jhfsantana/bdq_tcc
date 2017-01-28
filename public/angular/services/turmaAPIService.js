angular.module('app').factory('turmaAPI', function($http, API_URL)
{
	
	var _getTurmas = function(){
		return $http.get(API_URL + 'turmas');
	};
	var _saveTurma = function(turma){
		return $http.post(API_URL + 'turmas', turma);
	};
	var _updateTurma = function(turma){
		return $http.post(API_URL + 'turmas', turma);
	};
	var _deleteTurma = function(id){
		return $http.delete(API_URL + 'turmas/' + id);
	};

	return {
		getTurmas : _getTurmas,
		saveTurma : _saveTurma,
		deleteTurma : _deleteTurma,
		updateTurma : _updateTurma
	}
});