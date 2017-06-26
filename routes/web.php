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

Route::get('/teste', function()
	{
		return view('teste');
	});

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
use App\Models\Notificacao;
use App\Models\Aluno;
use App\Models\Turma;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

Route::get('professor/login','Professores\ProfessorController@logintela');

Route::post('professor/login', 'Professores\AuthController@login');

Route::get('/api/administradores/validar/{dado?}/{id?}/{formulario?}', 'Admins\AdminController@validarDados');

///Route::get('/api/disciplinas/professor', 'Disciplinas\DisciplinaController@DisciplinaByProfessor');

Route::group(['middleware'=> ['auth:web_teachers']], function ()
{
	Route::get('/notificacao/visualizada', function()
	{
		$visualizada = Input::get('visualizada');

		if(count(Notificacao::all()->where('professor_id', Auth::user()->id)->where('visualizado', 0)) > 0)
		{
			Notificacao::where('visualizado', '=', false)->where('professor_id', Auth::user()->id)
													 ->update(['visualizado' => $visualizada]);
		}
		else
		{
			return json_encode(false);
		}
	});


	Route::get('/api/meusalunos', function()
	{
		return Professor::mediaMeusAluno(Auth::user()->id);
	});
	Route::get('/api/turmas/{id?}', 'Turmas\TurmaController@indexAPI');


	Route::get('/api/questoes/professor', 'Questoes\QuestaoController@getQuestaoByProfessor');

	Route::get('professor', 'Professores\ProfessorController@bemvindo');

	Route::get('professor/avaliacao', 'Avaliacoes\AvaliacaoController@index');

	Route::get('/professor/avaliacao/finalizada/{id}', 'Avaliacoes\AvaliacaoController@mostrar');

	Route::get('professor/questao/add', 'Questoes\QuestaoController@create');

	Route::post('professor/questao/adicionada', 'Questoes\QuestaoController@store');

	Route::get('professor/avaliacao/gerar', 'Avaliacoes\AvaliacaoController@formulario');

	Route::get('avaliacao/{id}/gerar/buscar/', 'Avaliacoes\AvaliacaoController@trazerQuestao');

	Route::post('professor/avaliacao/gerar/salvar', 'Avaliacoes\AvaliacaoController@salvar');

	Route::get('professor/avaliacao/{id}/gerar/adicionar', 'Avaliacoes\AvaliacaoController@receberQuestao');

	Route::get('professor/questoes', 'Questoes\QuestaoController@index');
	
	Route::post('professor/questao/deletar', 'Questoes\QuestaoController@removerByProfessor');

	Route::post('professor/questao/alterar', 'Questoes\QuestaoController@edit');
	
	Route::post('professor/questao/alterada', 'Questoes\QuestaoController@updateByProfessor');
	
	Route::post('/avaliacao/status', 'Avaliacoes\AvaliacaoController@status');

	Route::get('/professor/alunos', 'Professores\ProfessorController@alunos');
	Route::get('/professor/turmas', 'Professores\ProfessorController@turmas');
	Route::get('/professor/notificacoes', 'Professores\ProfessorController@notificacoes');

	Route::post('/enviar/mensagem', 'Professores\ProfessorController@enviarMensagem');
	
	Route::get('professor/logout', 'Professores\AuthController@logout');

});







Route::group(['middleware'=> ['auth:web_admins']], function ()
{
	
	//API CURRENTUSER admin

	Route::get('/api/admin/currentadminID', function()
		{
			return Auth::user()->id;
		});

	//API DOS PROFESSORES 
	Route::get('/api/questoes/professor', 'Questoes\QuestaoController@getQuestaoByProfessor');
	Route::get('/api/professores/{id?}', 'Professores\ProfessorController@indexAPI');
	Route::post('/api/professores', 'Professores\ProfessorController@store');
    Route::post('/api/professores/{id}', 'Professores\ProfessorController@update');
    Route::delete('/api/professores/{id}', 'Professores\ProfessorController@destroy');
    
    Route::get('/api/disciplinas', function()
    {
		return \App\Models\Disciplina::with('turmas')->get();
    });
    // API PARA ALUNOS

    Route::get('/api/alunos/{id?}', 'Alunos\AlunoController@indexAPI');
    Route::post('/api/alunos', 'Alunos\AlunoController@store');
    Route::post('/api/alunos/{id}', 'Alunos\AlunoController@update');
    Route::delete('/api/alunos/{id}', 'Alunos\AlunoController@destroy');

/*    API ADMINISTRADORES
*/
	Route::get('/api/administradores/{id?}', 'Admins\AdminController@indexAPI');
    Route::post('/api/administradores', 'Admins\AdminController@store');
    Route::put('/api/administradores/{id}', 'Admins\AdminController@update');
    Route::delete('/api/administradores/{id}', 'Admins\AdminController@destroy');

/*    API TURMAS
*/
	Route::get('/api/turmas/{id?}', 'Turmas\TurmaController@indexAPI');
    Route::post('/api/turmas', 'Turmas\TurmaController@store');
    Route::post('/api/turmas/{id}', 'Turmas\TurmaController@update');
    Route::delete('/api/turmas/{id}', 'Turmas\TurmaController@destroy');

/*    API DISCIPLINAS
*/
    Route::get('/api/disciplinas/{id?}', 'Disciplinas\DisciplinaController@indexAPI');
    Route::post('/api/disciplinas', 'Disciplinas\DisciplinaController@store');
    Route::post('/api/disciplinas/{id}', 'Disciplinas\DisciplinaController@update');
    Route::delete('/api/disciplinas/{id}', 'Disciplinas\DisciplinaController@destroy');
    Route::get('/api/disciplinas/validar/{nome}/{turma}', 'Disciplinas\DisciplinaController@validarDisciplinaNaTurma');

/*    API QUESTOES
*/
	Route::get('/api/questoes/{id?}', 'Questoes\QuestaoController@indexAPI');
    Route::post('/api/questoes', 'Questoes\QuestaoController@store');
    Route::post('/api/questoes/{id}', 'Questoes\QuestaoController@update');
    Route::delete('/api/questoes/{id}', 'Questoes\QuestaoController@destroy');

#####################################################################################
	
	Route::get('/disciplina/config/{id}','Disciplinas\DisciplinaController@config');
	Route::get('home','Admins\AdminController@index');
	Route::get('/download/arquivo/modelo','Questoes\QuestaoController@downloadArquivo');


	Route::get('aluno/novo','Alunos\AlunoController@create');
	Route::post('students','Alunos\AlunoController@store');
	Route::get('alunos','Alunos\AlunoController@index');
	Route::get('aluno/detalhes/{id}','Alunos\AlunoController@show');
	Route::post('alunos/{id}','Alunos\AlunoController@destroy');

	Route::get('/aluno/alterar/{id}','Alunos\AlunoController@formularioAlterar');
	
	Route::post('/aluno/dados/alterados','Alunos\AlunoController@update');

	Route::post('/aluno/disciplina/desassociar', 'Alunos\AlunoController@desassociarDisciplina');
	Route::get('/aluno/config/{id}','Alunos\AlunoController@config');
	Route::post('/aluno/config/save','Alunos\AlunoController@configSave');
	Route::post('/aluno/config/remover','Alunos\AlunoController@limparConfig');



	Route::get('administrador/logout', 'Admins\AuthController@logout');


	Route::get('administrador/novo', 'Admins\AdminController@create');

	Route::post('adm', 'Admins\AdminController@store');


	Route::get('professor/novo','Professores\ProfessorController@create');
	Route::get('professores','Professores\ProfessorController@index');
	Route::post('teachers/', ['uses'=>'Professores\ProfessorController@store', 'as' => 'professor.store']);
    Route::post('professor/detalhes/{id}','Professores\ProfessorController@show');
    Route::post('professores/{id}','Professores\ProfessorController@destroy');
    Route::post('/professor/upload','Professores\ProfessorController@uploadPerfil');
	Route::get('/professor/config/{id}','Professores\ProfessorController@config');
	Route::post('/professor/config/save','Professores\ProfessorController@configSave');
	Route::post('/professor/config/remover','Professores\ProfessorController@limparConfig');
	

	Route::get('/turmas','Turmas\TurmaController@index');
	Route::get('/turma/config/{id}','Turmas\TurmaController@config');
	Route::post('classrooms','Turmas\TurmaController@store');

	Route::get('disciplina/novo','Disciplinas\DisciplinaController@create');
	Route::get('disciplinas','Disciplinas\DisciplinaController@index');
	Route::post('subjects','Disciplinas\DisciplinaController@store');
	Route::post('disciplina/config/remover', 'Disciplinas\DisciplinaController@removerProfessor');
	Route::post('disciplina/config/removerAluno', 'Disciplinas\DisciplinaController@removerAluno');

	Route::get('/relatorio', 'Admins\AdminController@relatorio');

	
	Route::get('/relatorio/questao', 'Admins\AdminController@relatorioQuestao');
	
	Route::get('/relatorio/notas/{id}', 'Admins\AdminController@relatorioNotas');
	
	Route::get('/relatorio/notas', 'Admins\AdminController@relatorioNotas');
		
	Route::get('/relatorio/questao/{limite}', 'Admins\AdminController@relatorioQuestao');
	

	
	Route::get('/admin/questao/novo', 'Questoes\QuestaoController@adminFormQuestao');

	Route::post('/admin/questao/adicionada', 'Questoes\QuestaoController@adminQuestaoSalvar');

	Route::get('questoes', 'Questoes\QuestaoController@listaTotalQuestoes');
	
	Route::get('/administradores', 'Admins\AdminController@lista');


	Route::post('/admin/questao/deletar', 'Questoes\QuestaoController@deletar');

	Route::post('admin/questao/alterar/{id}', 'Questoes\QuestaoController@edit');

	Route::post('admin/questao/alterada', 'Questoes\QuestaoController@update');

	Route::get('admin/lote', 'Questoes\QuestaoController@lote');

	Route::post('admin/carregar/lote', 'Questoes\QuestaoController@processarXML'); //carregarLote




});

Route::group(['middleware'=> ['auth:web_students']], function ()
{
	Route::get('api/mediaAluno', function()
	{
		return  json_encode(Aluno::mediaAluno());
	});
	Route::get('aluno', 'Alunos\AlunoController@bemvindo');
	
	Route::get('aluno/logout', 'Alunos\AuthController@logout');

	Route::get('aluno/avaliacoes', 'Alunos\AlunoController@avaliacoesDisponiveis');

	Route::post('aluno/avaliacao/online', 'Alunos\AlunoController@avaliacao');

	Route::post('aluno/avaliacao/finalizada', 'Alunos\AlunoController@correcao');
	
	Route::get('aluno/avaliacao/resultado/{id}', 'Avaliacoes\AvaliacaoController@paginaResultado');
	
	Route::get('aluno/avaliacoes/realizadas', 'Avaliacoes\AvaliacaoController@realizadas');

	Route::get('aluno/mensagens', 'Alunos\AlunoController@mensagens');
	
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


Route::get('/admin', ['uses' => 'Admins\AdminController@loginTela', 'as' => 'admin.login']);

Route::post('admin', 'Admins\AuthController@login');


