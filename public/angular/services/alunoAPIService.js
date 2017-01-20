angular.module('app').factory('alunoAPI', function($http, API_URL){
	var _getAlunos = function(){
		return $http.get(API_URL + 'alunos');
	};
	var _saveAlunos = function(aluno){
		return $http.post(API_URL + 'alunos', aluno);
	};
	var _deleteAluno = function(id){
		return $http.delete(API_URL + 'alunos/' + id);
	};

	return {
		getAlunos : _getAlunos,
		saveAluno : _saveAlunos,
		deleteAluno : _deleteAluno
	}
});