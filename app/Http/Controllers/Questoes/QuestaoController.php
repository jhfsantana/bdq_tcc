<?php

namespace App\Http\Controllers\Questoes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\Disciplina;
use App\Models\Professor;
use App\Models\Questao;
use App\Models\Turma;
use App\Http\Requests\Questao\QuestaoRequest;
use Auth;

    


class QuestaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questoes = Professor::with('questoes')
                    ->find(Auth::user()->id)->questoes;
        return view('questoes.questao_lista')
                    ->with('questoes', $questoes);
    }

    public function indexAPI($id = null)
    {
        if($id == null)
        {
            $q = DB::table('questoes')->join('disciplinas', 'questoes.disciplina_id', '=', 'disciplinas.id')
            ->select(DB::raw('questoes.*, disciplinas.nome as disciplina_nome'))
            ->get();
            return $q;
        }else
        {
            return $this->show($id);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $professor = Professor::find(Auth::user()->id);
        return view('questoes.formulario_questao')->withProfessor($professor);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, 
            [
                'disciplina_id' => 'required|max:255',
                'nivel'         => 'required',
            ],
            $messages = 
                [
                    'disciplina_id.required' => 'Escolha uma disciplina',
                    'nivel.required'         => 'Nivel de dificuldade é obrigatório',
                ]);
        $questao = new Questao();
        $questao->questao         = $request->questao;
        $questao->alternativaA    = $request->alternativaA;
        $questao->alternativaB    = $request->alternativaB;
        $questao->alternativaC    = $request->alternativaC;
        $questao->alternativaD    = $request->alternativaD;
        $questao->alternativaE    = $request->alternativaE;
        $questao->correta         = $request->correta;
        $questao->nivel           = $request->nivel;
        
        if(\Auth::guard('web_admins')->check())
        {
            $questao->admin()->associate(Auth::guard('web_admins')->user()->id);
        }
        
        if(\Auth::guard('web_teachers')->check())
        {
            $questao->professor()->associate(Auth::guard('web_teachers')->user()->id);
        }

        $questao->disciplina()->associate($request->disciplina_id);

        if($questao->save())
        {
            if($request->trace == 'web')
            {
                $request->session()->flash('alert-success', 'questão adicionada com sucesso!');
                return redirect('/professor');
            }
            else
            {
                return json_encode([
                    'message' => 'Questão com ID '. $questao->id .' cadastrada com sucesso!',
                    'success' => 'success' 
                ]);
            }
        }
    }

    public function show($id)
    {
        return Questao::find($id);
    }


    public function update(Request $request, $id)
    {
        
        $questao = Questao::find($id);

        $questao->questao = $request->questao;
        $questao->alternativaA = $request->alternativaA;
        $questao->alternativaB = $request->alternativaB;
        $questao->alternativaC = $request->alternativaC;
        $questao->alternativaD = $request->alternativaD;
        $questao->alternativaE = $request->alternativaE;
        $questao->correta = $request->correta;
        $questao->nivel = $request->nivel;
        
        if(Auth::guard('web_admins'))
        {
            $questao->admin()->associate(Auth::guard('web_admins')->user()->id);
        }
        elseif(Auth::guard('web_teachers'))
        {
            $questao->professor()->associate(Auth::guard('web_teachers')->user()->id);
        }

        $questao->disciplina()->associate($request->disciplina);

        if($questao->save())
        {
            return json_encode([
                'message' => 'Questão com ID '. $questao->id .' alterada com sucesso!',
                'success' => 'success' 
            ]);
        }
    }

    public function destroy($id)
    {
        $questao = Questao::find($id);
    
        if($questao->delete())
        {
            return json_encode(['message' => 'Questao ' . $questao->nome. ' deletada com sucesso!']);
        }
    }

    public function deletar(Request $request)
    {
        $questao = Questao::find($request->questao_id);
        $questao->delete();
        $request->session()->flash('alert-danger', 'Questão '. $questao->questao .' deletada com sucesso!');

        if(Auth::guard('web_admins'))
        {
            return redirect ('/home');   
        }
        else
        {
            return redirect ('professor');   
        }
    }
    public function buscarQuestao()
    {
        
        /*$questao = Questao::find($disciplina_id);
        $questao = Questao::orderByRaw('RAND()')->take(1)->where($disciplina_id)->get();*/
    }

    public function adminFormQuestao()
    {
        $disciplinas = Disciplina::all();
        return view('questoes.formulario_questao_admin')->with('disciplinas', $disciplinas);
    }

    public function adminQuestaoSalvar(QuestaoRequest $request)
    {

        $questao = new Questao();

        $questao->questao = $request->questao;
        $questao->alternativaA = $request->a;
        $questao->alternativaB = $request->b;
        $questao->alternativaC = $request->c;
        $questao->alternativaD = $request->d;
        $questao->alternativaE = $request->e;
        $questao->correta = $request->correta;
        $questao->nivel = $request->nivel;


        if(isset($request->admin_id))
        {
            $questao->admin()->associate($request->admin_id);
        }


        $questao->disciplina()->associate($request->disciplina);

        if($questao->save())
        {
            $request->session()->flash('alert-success', 'Questão salva com sucesso!');
            return redirect ('/home');
        }
    }

    public function listaTotalQuestoes()
    {
        $questoes = Questao::all();

        return view('questoes.questao_lista_admin')->with('questoes', $questoes);
    }

    public function messages()
    {
        return [
        ];
    }

    public function getQuestaoByProfessor()
    {
        return DB::select('select * from questoes where professor_id = ?', array(Auth::user()->id));
    }

    public function lote()
    {
        return view('admin.lote');
    }

    // public function carregarLote(Request $request)
    // {
    //     ini_set('auto_detect_line_endings', true);
    //     if (isset($_FILES['file'])) {
    //         $ok = true;
    //         $file = $_FILES['file']['tmp_name'];
    //         $handle = fopen($file, "r");
    //         $ext = pathinfo($request->file('file')->getClientOriginalName(), PATHINFO_EXTENSION);

    //         if($ext != 'csv')
    //         {
    //             $request->session()->flash('alert-danger', 'Somente e permitido arquivos com extensão .CSV');
    //             return redirect()->back();  
    //         }
    //         else
    //         {
    //             if ($file == NULL)
    //             {
    //                 error(_('Por favor selecione um arquivo para fazer o upload'));
    //                 return redirect()->back();
    //             }
    //             else 
    //             {

    //                 fgetcsv($handle);      
    //                 $data = array();
    //                 $count = 1;
    //                 $col = 0;
    //                 $aux = 10;
    //                 while(($rows = fgetcsv($handle, 1000, ";")) !== false)
    //                 {
    //                   $count++;
    //                   $arr = array();
    //                   foreach ($rows as $i => $col)
    //                     $col++;
    //                     $aux--;
    //                     $coluna = ($col-$aux);
    //                     $arr['questao'] = $this->tirarAcentos($rows[0]);
    //                     $arr['alternativaA'] = $this->tirarAcentos($rows[1]);
    //                     $arr['alternativaB'] = $this->tirarAcentos($rows[2]);
    //                     $arr['alternativaC'] = $this->tirarAcentos($rows[3]);
    //                     $arr['alternativaD'] = $this->tirarAcentos($rows[4]);
    //                     $arr['alternativaE'] = $this->tirarAcentos($rows[5]);
    //                     $arr['correta'] = $this->tirarAcentos($rows[6]);
    //                     $disciplina = Disciplina::where('nome', $this->tirarAcentos($rows[7]))->first();

    //                     if(!empty($disciplina))
    //                     {
    //                         $arr['disciplina_id'] = $disciplina->id; 
    //                     }
    //                     else
    //                     {
    //                         $request->session()->flash('alert-danger', 'Disciplina informada não encontrada, erro na linha: '. $count . ' coluna: '. $coluna);
    //                         return redirect()->back();
    //                     }

    //                     switch ($this->tirarAcentos(strtolower($rows[8]))) 
    //                     {
    //                         case 'facil':
    //                             $arr['nivel'] = 1;
    //                             break;
    //                         case 'moderado':
    //                             $arr['nivel'] = 2;
    //                             break;
    //                         case 'dificil':
    //                             $arr['nivel'] = 3;
    //                             break;
    //                         case 'muito dificil':
    //                             $arr['nivel'] = 4;
    //                             break;
    //                         default:
    //                             $request->session()->flash('alert-danger', 'Opção inválida para o nivel de dificuldade, erro na linha: ' . $count . ' coluna: ' . $coluna);
    //                             return redirect()->back();
    //                             break;
    //                     }

    //                     $arr['admin_id'] = Auth::user()->id;
    //                     $data[] = $arr;

    //                 }

    //                     if ($ok) 
    //                     {
    //                         $result = Questao::insert($data);
    //                     }
                        
    //                     if($result)
    //                     {
    //                         $request->session()->flash('alert-success', 'Arquivo processado com sucesso!');
    //                         return redirect()->back(); 
    //                     }
    // /*              while(($filesop = fgetcsv($handle, 1000, ";")) !== false)
    //                 {
    //                     foreach ($filesop as $file) {
    //                         $campos['questao'] = $file;
    //                         $campos['alternativaA'] = $file;
    //                         $campos['alternativaB'] = $file;
    //                         $campos['alternativaC'] = $file;
    //                         $campos['alternativaD'] = $file;
    //                         $campos['alternativaE'] = $file;
    //                         $campos['correta'] = $file;
    //                         $campos['disciplina_id'] = $file;
    //                         $campos['nivel'] = $file;
    //                     }
    //                     dd($campos);
    //                     if ($ok) 
    //                     {
    //                         Questao::insert($campos);
    //                     }
    //                     exit;
    //               }*/
    //             }
    //         }
    //     }
    // }

    public function processarXML(Request $request)
    {
        ini_set('auto_detect_line_endings', true);
        $ok = false;
        $file = $request->file('file');

        if(isset($file))
        {
            $ok = true;
            $ext = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);

            if($ext != 'xml')
            {
                $request->session()->flash('alert-danger', ' Extensão inválida, somente .XML');
                return redirect()->back();
            }
            else
            {

                $xml = new \SimpleXMLElement($file, null, true);

                $data = array();
                
                $count = 0;
                foreach($xml->children() as $nodes)
                {
                    $count++;
                    $data['questao']        = $nodes->questao;
                    $data['alternativaA']   = $nodes->alternativaA;
                    $data['alternativaB']   = $nodes->alternativaB;
                    $data['alternativaC']   = $nodes->alternativaC;
                    $data['alternativaD']   = $nodes->alternativaD;
                    $data['alternativaE']   = $nodes->alternativaE;
                    $data['correta']        = $nodes->correta;

                    $disciplina = Disciplina::where('nome', $nodes->disciplina)->first();

                    if(!empty($disciplina))
                    {
                        $data['disciplina_id']  = $disciplina->id;
                    }
                    else
                    {
                        $request->session()->flash('alert-danger', ' Disciplina informada não encontrada');
                        return redirect()->back();
                    }

                    switch ($nodes->nivel) 
                    {
                        case 'facil':
                            $data['nivel'] = 1;
                            break;
                        case 'moderado':
                            $data['nivel'] = 2;
                            break;
                        case 'dificil':
                            $data['nivel'] = 3;
                            break;
                        case 'muito dificil':
                            $data['nivel'] = 4;
                            break;
                        default:
                            $request->session()->flash('alert-danger', 'Opção inválida para o nivel de dificuldade');
                            return redirect()->back();
                            break;
                    }
                    
                    $data['admin_id'] = Auth::user()->id;

                    $data['created_at'] = new \DateTime();

                    $data['updated_at'] = new \DateTime();

                    $campos[] = $data;
                }

                if($ok)
                {
                    Questao::insert($campos);
                    $request->session()->flash('alert-success', ' XML Processado com Sucesso / Total de ' . $count . ' questões adicionadas ao Banco de Dados');
                    return redirect()->back();
                }
            }
        }
        else
        {
            $request->session()->flash('alert-danger', ' Nenhum arquivo encontrado');
            return redirect()->back(); 
        }
    }

    public function downloadArquivo()
    {
        $caminho = 'C:\wamp\www\bq_tcc\resources\assets\bdq_modelo_lote.xlsx';
        set_time_limit(0);
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary"); 
        header("Content-disposition: attachment; filename=\"" . basename($caminho) . "\""); 
        readfile($caminho); // do the double-download-dance (dirty but worky)
    }
}
