<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\hasMany;
use App\Models\Disciplina;
use App\Models\Turma;
use App\Models\Aluno;
use Illuminate\Support\Facades\DB;
use Auth;
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
        $query = self::join('questoes', 'questoes.professor_id', '=', 'professores.id')
            ->groupBy('professores.nome', 'questoes.created_at')
            ->get(['professores.nome', 'questoes.created_at', DB::raw('count(questoes.id) as total_questoes')]);

        $data = [];

        foreach($query as $professor) 
        {
            $date = \DateTime::createFromFormat('Y-m-d H:i:s', $professor->created_at); // your original DTO
            $newFormat = $date->format('Y-m-d');
            
            $out[$professor->nome]['dataPoints'][] = ['x' => $newFormat,
                                    'y' => $professor->total_questoes];
           

            $aux['dataPoints'] = $out[$professor->nome]['dataPoints'];

            $data[$professor->nome] = [
                                        'type'          => 'line',
                                        'name'          => $professor->nome,
                                        'markerType'    => 'square',
                                        'showInLegend'  => true,
                                        'xValueType'    => "dateTime",
                                        'dataPoints'    => $aux['dataPoints']];

            $root = [];
            foreach ($data as $r) 
            {
                $aux2=  $r;
                $root[] = $aux2;
            }
        }
        
        if(!empty($root))
        {
            return $root;
        }
        else
        {
            return 0;
        }
        
    }

    public static function professorTopQuestoes()
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
                   
        $resultado = DB::select($query);
        return $resultado;
    }



    public static function notas($data, $disciplina)
    {  
        if($disciplina == 'todos')
        {
            $notas = DB::table('avaliacoes')
            ->join('turmas', 'avaliacoes.turma_id', '=', 'turmas.id')
            ->join('aluno_resultado', 'avaliacoes.id', '=', 'aluno_resultado.avaliacao_id')
            ->join('alunos as a', 'aluno_resultado.aluno_id', '=', 'a.id')
            ->join('disciplinas', 'avaliacoes.disciplina_id', '=', 'disciplinas.id')
            ->where('disciplinas.id', '>=', 1)
            ->select('turmas.nome as turma_nome', 'aluno_resultado.nota', 'a.nome as aluno_nome', 'disciplinas.nome as disciplina_nome')
            ->orderBy('aluno_resultado.nota', 'desc')
            ->get();
        }
        else
        {
            $notas = DB::table('avaliacoes')
            ->join('turmas', 'avaliacoes.turma_id', '=', 'turmas.id')
            ->join('aluno_resultado', 'avaliacoes.id', '=', 'aluno_resultado.avaliacao_id')
            ->join('alunos as a', 'aluno_resultado.aluno_id', '=', 'a.id')
            ->join('disciplinas', 'avaliacoes.disciplina_id', '=', 'disciplinas.id')
            ->where('disciplinas.id', '=', $disciplina)
            ->select('turmas.nome as turma_nome', 'aluno_resultado.nota', 'a.nome as aluno_nome', 'disciplinas.nome as disciplina_nome')
            ->orderBy('aluno_resultado.nota', 'desc')
            ->get();
        }

       
        
        return $notas;
    }

   public static function meusAlunos($professor_id)
    {
        $sql = DB::table('alunos')
                        ->join('aluno_disciplina', 'alunos.id', '=', 'aluno_disciplina.aluno_id')
                        ->join('disciplinas', 'aluno_disciplina.disciplina_id', '=', 'disciplinas.id')
                        ->join('disciplina_turma', 'disciplinas.id', '=', 'disciplina_turma.disciplina_id')
                        ->join('turmas', 'disciplina_turma.turma_id', '=', 'turmas.id')
                        ->join('disciplina_professor', 'disciplinas.id', '=', 'disciplina_professor.disciplina_id')
                        ->join('professores', 'disciplina_professor.professor_id', '=', 'professores.id')
                        ->where('professores.id', '=', $professor_id)
                        ->select(DB::raw(count('alunos.id as qtd_alunos')), 'turmas.nome as turma_nome as turma_nome', 'disciplinas.nome as disciplina_nome', 'professores.nome as professor_nome', 'alunos.nome as aluno_nome', 'alunos.id as qtd_alunos')->get();
        return $sql;
    }
    public static function listarAlunos($professor_id)
    {
        $sql = DB::table('alunos')
                ->join('aluno_disciplina', 'alunos.id', '=', 'aluno_disciplina.aluno_id')
                ->join('disciplinas', 'aluno_disciplina.disciplina_id', '=', 'disciplinas.id')
                ->join('disciplina_turma', 'disciplinas.id', '=', 'disciplina_turma.disciplina_id')
                ->join('turmas', 'disciplina_turma.turma_id', '=', 'turmas.id')
                ->join('disciplina_professor', 'disciplinas.id', '=', 'disciplina_professor.disciplina_id')
                ->join('professores', 'disciplina_professor.professor_id', '=', 'professores.id')
                ->where('professores.id', '=', $professor_id)
                ->select('alunos.id as qtd_alunos', 'alunos.id as aluno_id', 'alunos.matricula as matricula', 'turmas.nome as turma_nome as turma_nome', 'disciplinas.nome as disciplina_nome', 'professores.nome as professor_nome', 'alunos.nome as aluno_nome', 'alunos.id as qtd_alunos')->get();
        return $sql;
    }


    public static function  mediaMeusAluno($professor_id)
    {

        $media = DB::table('aluno_resultado')
                     ->join('avaliacoes', 'aluno_resultado.avaliacao_id', '=', 'avaliacoes.id')
                     ->join('alunos', 'aluno_resultado.aluno_id', '=', 'alunos.id')
                     ->select(DB::raw('year(aluno_resultado.created_at) as ano, month(aluno_resultado.created_at) as mes, day(aluno_resultado.created_at) as dia, avg(nota) as y, alunos.nome as aluno_nome, alunos.id'))
                     ->where('avaliacoes.professor_id', '=', $professor_id)
                     ->groupBy(DB::raw('year(aluno_resultado.created_at), month(aluno_resultado.created_at),day(aluno_resultado.created_at), alunos.nome, alunos.id'))
                     ->get();       
        
// SELECT a.id, a.nome, MIN(b.created_at) minDate, avg(b.nota)
//     FROM alunos a, aluno_resultado b
//       WHERE a.id = b.aluno_id
//        and b.created_at >= DATE_SUB(NOW(),INTERVAL 31 DAY) 
//    GROUP BY a.id, a.nome
//    ORDER BY 3 DESC  limit 10 ;        $root = [];
        $data = [];
        $data2 = [];
        $dataPoints = [];
        // foreach ($media as $m)
        // {
        //     $arr[] = $m;
        //     $data_formatada = $m->dia.'-'.$m->mes.'-'.$m->ano;
        //     //dd($arr);
        //     $date = \DateTime::createFromFormat('d-m-Y', $data_formatada); // your original DTO
        //     $newFormat = $date->format('Y-m-d');
            


        //     // for ($i=0; $i < count($arr); $i++) {
        //     //    // dd($arr);
        //     //      $arrAux[$i] = $arr;
        //     //     for ($j=0; $j < count($arrAux[$i][$i]); $j++) {
        //     //         if($arrAux[$j][$j]->id == $arr[$j]->id)
        //     //         {
        //     //            $data2[$i] =  [
        //     //                             'x' => $newFormat,
        //     //                             'y' => $m->y
        //     //                         ];
        //     //         }
        //     //     }
        //     // }
        //     //                  dd($arrAux);

        //     $dataPoints = $data2;

        //     $data[] = [      'type' => 'column',
        //                      'name' => $m->aluno_nome,
        //                      'markerType' => 'square',
        //                      'showInLegend' => true, 
        //                      'dataPoints' => $dataPoints
        //                      ];
        //     $root['data'] = $data;
        // }

        foreach($media as $element) 
        {
            $data_formatada = $element->dia.'-'.$element->mes.'-'.$element->ano;
            $date = \DateTime::createFromFormat('d-m-Y', $data_formatada); // your original DTO
            $newFormat = $date->format('Y-m-d');
            
            $out[$element->aluno_nome]['dataPoints'][] = ['x' => $newFormat,
                                    'y' => $element->y];
           

            $aux['dataPoints'] = $out[$element->aluno_nome]['dataPoints'];

            $data[$element->aluno_nome] = [
                                            'type'          => 'line',
                                            'name'          => $element->aluno_nome,
                                            'markerType'    => 'square',
                                            'showInLegend'  => true,
                                            'xValueType'    => "dateTime",
                                            'dataPoints'    => $aux['dataPoints']];

           // $root['data'][$element->aluno_nome] =  array_shift($data);
            $root = [];
            foreach ($data as $r) 
            {
                $aux2=  $r;
                $root[] = $aux2;
            }
            
        }
      
        if(empty($root))
        {
            return 0;    
        }
        else
        {
            return $root;
        }
        
    }
}
