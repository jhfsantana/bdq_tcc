<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\hasMany;
use App\Models\Disciplina;
use App\Models\Turma;
use App\Models\Aluno;
use Illuminate\Support\Facades\DB;
class Professor extends User
{
    protected $table = 'professores';
	protected $fillable = array('enrollment', 'name','email', 'password');
    protected $guarded = ['id','password'];

    public function disciplinas()
    {
		return $this->belongsToMany('App\Models\Disciplina');
    }

    public function turmas()
    {
    	return $this->belongsToMany('App\Models\Turma');
    }

    public function avaliacoes()
    {
        return $this->hasMany('App\Models\Avaliacao');
    }

    public function questoes()
    {
        return $this->hasMany('App\Models\Questao');
    }

    public function resultados()
    {
        return $this->hasMany('App\Models\Resultado');
    }

    public static function totalProfessores()
    {
        $total = Professor::all()->count();

        return $total;
    }

    public static function professorComMaiorNumeroDeQuestoes()
    {
        $query = "SELECT p.matricula
                        ,p.nome
                        ,p.email
                        ,d.nome as disciplina_nome
                        ,count(q.questao) as total_questoes
                    FROM professores p
                    JOIN questoes q on (q.professor_id = p.id)
                    JOIN disciplinas d on (d.id = q.disciplina_id)
                   GROUP BY p.matricula, p.nome, p.email, d.nome
                   ORDER BY p.nome";

        $resultado = DB::SELECT($query);

        return $resultado;
    }
}
