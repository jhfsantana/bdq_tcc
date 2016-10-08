<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

	## ROTA DE MATÉRIAS

/*Route::group(array('prefix' =>'subjects'), function ()
{

	Route::get('create','Subjects\SubjectController@create');
	Route::get('index','Subjects\SubjectController@index');
	Route::post('','Subjects\SubjectController@store');

});*/

## ROTA DE PROFESSORES
/*Route::group(array('prefix' =>'teachers'), function ()
{

	Route::get('create','Teachers\TeacherController@create');
	Route::get('index','Teachers\TeacherController@index');
	Route::post('', 'Teachers\TeacherController@store');
    Route::get('/{id}','Teachers\TeacherController@show');



});




*/
use App\Models\Professor;

Route::get('professor/login','Professores\ProfessorController@logintela');

Route::post('professor/login', 'Professores\AuthController@login');


Route::group(['middleware'=> ['auth:web_teachers']], function ()
{

	Route::get('professor', 'Professores\ProfessorController@bemvindo');


	Route::post('professor/{id}/questao', 'Questoes\QuestaoController@create');

	Route::post('professor/{id}/questao/adicionada', 'Questoes\QuestaoController@store');

	Route::post('professor/avaliacao/{id}/gerar', 'Avaliacoes\AvaliacaoController@formulario');

	Route::get('avaliacao/{id}/gerar/buscar/', 'Avaliacoes\AvaliacaoController@trazerQuestao');

	Route::post('professor/avaliacao/{id}/gerar/salvar', 'Avaliacoes\AvaliacaoController@salvar');
	
	Route::get('professor/logout', 'Professores\AuthController@logout');

});






Route::group(['middleware'=> ['auth:web_admins']], function ()
{

	Route::get('home', function ()
	{
		return view ('admin.index');
	});


	Route::get('aluno/novo','Alunos\AlunoController@create');
	Route::post('students','Alunos\AlunoController@store');
	Route::get('alunos','Alunos\AlunoController@index');
	Route::get('aluno/detalhes/{id}','Alunos\AlunoController@show');
	Route::get('alunos/{id}','Alunos\AlunoController@destroy');



	Route::get('administrador/logout', 'Admins\AuthController@logout');


	Route::get('adm/create', 'Admins\AdminController@create');

	Route::post('adm', 'Admins\AdminController@store');


	Route::get('professor/novo','Professores\ProfessorController@create');
	Route::get('professores','Professores\ProfessorController@index');
	Route::post('teachers/', ['uses'=>'Professores\ProfessorController@store', 'as' => 'professor.store']);
    Route::get('professor/detalhes/{id}','Professores\ProfessorController@show');
    Route::get('professores/{id}','Professores\ProfessorController@destroy');

	Route::get('turma/novo','Turmas\TurmaController@create');
	Route::post('classrooms','Turmas\TurmaController@store');


	Route::get('disciplina/novo','Disciplinas\DisciplinaController@create');
	Route::get('disciplinas','Disciplinas\DisciplinaController@index');
	Route::post('subjects','Disciplinas\DisciplinaController@store');




});






# ROTA DE TURMAS
/*Route::group(array('prefix' =>'classroom'), function ()
{

	Route::get('create','Classrooms\ClassroomController@create');
	Route::post('','Classrooms\ClassroomController@store');

});*/
## ROTA DE ALUNOS

/*Route::group(array('prefix' =>'students'), function ()
{
	
	Route::get('create','Students\StudentController@create');
	Route::post('','Students\StudentController@store');
	Route::get('index','Students\StudentController@index');
	Route::get('/{id}','Students\StudentController@show');

});*/

################

Route::get('admin', function ()
{
	return view('admin.auth');
});

Route::post('admin', 'Admins\AuthController@login');


