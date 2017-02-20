	angular.module('app').factory('questaoAPI', function($http, API_URL){
	var _getQuestoes = function(){
		return $http.get(API_URL + 'questoes');
	};

	var _getQuestoesByProfessor = function(){
		return $http.get(API_URL + 'questoes/professor');
	};
	var _saveQuestao = function(questao){
		return $http.post(API_URL + 'questoes', questao);
	};
	var _updateQuestao = function(questao){
		return $http.post(API_URL + 'questoes', questao);
	};
	var _deleteQuestao = function(id){
		return $http.delete(API_URL + 'questoes/' + id);
	};

	return {
		getQuestoes : _getQuestoes,
		saveQuestao : _saveQuestao,
		deleteQuestao : _deleteQuestao,
		updateQuestao : _updateQuestao,
		getQuestoesByProfessor : _getQuestoesByProfessor
	}
});