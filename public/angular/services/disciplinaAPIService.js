angular.module('app').factory('disciplinaAPI', function($http, API_URL){
	
	var _getDisciplinas = function(){
		return $http.get(API_URL + 'disciplinas');
	};
	var _saveDisciplina = function(disciplina){
		return $http.post(API_URL + 'disciplinas', disciplina);
	};
	var _updateDisciplina = function(disciplina){
		return $http.post(API_URL + 'disciplinas', disciplina);
	};
	var _deleteDisciplina = function(id){
		return $http.delete(API_URL + 'disciplinas/' + id);
	};

	return {
		getDisciplinas : _getDisciplinas,
		saveDisciplina : _saveDisciplina,
		deleteDisciplina : _deleteDisciplina,
		updateDisciplina : _updateDisciplina
	}
});