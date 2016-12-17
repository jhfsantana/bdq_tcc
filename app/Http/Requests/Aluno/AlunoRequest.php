<?php

namespace App\Http\Requests\Aluno;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\Aluno;
class AlunoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $aluno = Aluno::find($this->aluno_id);
        
        switch($this->method())
            {
                case 'GET':
                case 'DELETE':
                {
                    return [];
                }
                case 'POST':
                {
                    return [
                        'matricula' => 'required|numeric',
                        'nome' => 'required',
                        'sobrenome' => 'required',
                        'cpf' => 'required|unique:alunos',
                        'disciplinas' => 'required',
                        'email' => 'required|unique:alunos|email',
                        'password' => 'required',
                    ];
                }

        case 'PUT':
        case 'PATCH':
        {
            return [
                    'matricula' => 'required|numeric',
                    'nome' => 'required',
                    'sobrenome' => 'required',
                    'cpf' => 'required|unique:alunos',
                    'disciplinas' => 'required',
                    'email' => 'required|unique:alunos|email,'.$aluno->id,
                    'password' => 'required',
            ];
        }
        default:break;
    }
    }

    public function messages()
    {
        return [
            'matricula.required' => 'Campo matricula é obrigatório',
            'nome.required' => 'Campo nome é obrigatório',
            'sobrenome.required' => 'Campo sobrenome é obrigatório',
            'cpf.required' => 'Campo cpf é obrigatório',
            'cpf.unique' => 'CPF já cadastrado',
            'disciplinas.required' => 'Campo disciplina é obrigatório',
            'email.required' => 'Campo email é obrigatório',
            'email.unique' => 'Email já cadastrado',
            'email.email' => 'Digite o e-mail em um formato válido',
            'password.required' => 'Campo password é obrigatório',
        ];
    }
}
