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
use App\Models\Aluno;
use App\Models\Turma;


Route::get('professor/login','Professores\ProfessorController@logintela');

Route::post('professor/login', 'Professores\AuthController@login');


Route::group(['middleware'=> ['auth:web_teachers']], function ()
{

	Route::get('professor', 'Professores\ProfessorController@bemvindo');

	Route::post('professor/avaliacao/{id}', 'Avaliacoes\AvaliacaoController@index');

	Route::get('professor/avaliacao/finalizada/{id}', 'Avaliacoes\AvaliacaoController@mostrar');

	Route::post('professor/{id}/questao', 'Questoes\QuestaoController@create');

	Route::post('professor/{id}/questao/adicionada', 'Questoes\QuestaoController@store');

	Route::post('professor/avaliacao/{id}/gerar', 'Avaliacoes\AvaliacaoController@formulario');

	Route::get('avaliacao/{id}/gerar/buscar/', 'Avaliacoes\AvaliacaoController@trazerQuestao');

	Route::post('professor/avaliacao/{id}/gerar/salvar', 'Avaliacoes\AvaliacaoController@salvar');

	Route::get('professor/avaliacao/{id}/gerar/adicionar', 'Avaliacoes\AvaliacaoController@receberQuestao');

	Route::post('professor/{id}/questoes', 'Questoes\QuestaoController@index');
	
	Route::post('professor/questao/deletar/{id}', 'Questoes\QuestaoController@deletar');

	Route::post('professor/questao/alterar/{id}', 'Questoes\QuestaoController@edit');
	
	Route::post('professor/questao/alterada', 'Questoes\QuestaoController@update');

	Route::get('professor/logout', 'Professores\AuthController@logout');

});







Route::group(['middleware'=> ['auth:web_admins']], function ()
{

	Route::get('home','Admins\AdminController@index');


	Route::get('aluno/novo','Alunos\AlunoController@create');
	Route::post('students','Alunos\AlunoController@store');
	Route::get('alunos','Alunos\AlunoController@index');
	Route::get('aluno/detalhes/{id}','Alunos\AlunoController@show');
	Route::get('alunos/{id}','Alunos\AlunoController@destroy');



	Route::get('administrador/logout', 'Admins\AuthController@logout');


	Route::get('administrador/novo', 'Admins\AdminController@create');

	Route::post('adm', 'Admins\AdminController@store');


	Route::get('professor/novo','Professores\ProfessorController@create');
	Route::get('professores','Professores\ProfessorController@index');
	Route::post('teachers/', ['uses'=>'Professores\ProfessorController@store', 'as' => 'professor.store']);
    Route::post('professor/detalhes/{id}','Professores\ProfessorController@show');
    Route::post('professores/{id}','Professores\ProfessorController@destroy');

	Route::get('turma/novo','Turmas\TurmaController@create');
	Route::post('classrooms','Turmas\TurmaController@store');


	Route::get('disciplina/novo','Disciplinas\DisciplinaController@create');
	Route::get('disciplinas','Disciplinas\DisciplinaController@index');
	Route::post('subjects','Disciplinas\DisciplinaController@store');

	Route::get('/relatorio', 'Admins\AdminController@relatorio');

	Route::get('/relatorio/{id}', 'Admins\AdminController@relatorio');

/*	Route::get('/turmas', function () {
	    $turmas = Turma::all();
	    return view('turmas.formulario_turmas')->with('turmas', $turmas);
	});
*/


});

Route::group(['middleware'=> ['auth:web_students']], function ()
{
	Route::get('aluno', 'Alunos\AlunoController@bemvindo');
	
	Route::get('aluno/logout', 'Alunos\AuthController@logout');

	Route::post('aluno/avaliacoes/{id}', 'Alunos\AlunoController@avaliacoesDisponiveis');

	Route::post('aluno/avaliacao/online', 'Alunos\AlunoController@avaliacao');

	Route::post('aluno/avaliacao/finalizada', 'Alunos\AlunoController@correcao');
	
	Route::get('aluno/avaliacao/resultado/{id}', 'Avaliacoes\AvaliacaoController@paginaResultado');
	
	Route::post('aluno/avaliacoes/realizadas/{id}', 'Avaliacoes\AvaliacaoController@realizadas');
	
});

Route::get('aluno/login','Alunos\AlunoController@logintela');
Route::post('aluno/login', 'Alunos\AuthController@login');




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


