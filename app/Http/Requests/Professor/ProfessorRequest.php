<?php

namespace App\Http\Requests\Professor;

use Illuminate\Foundation\Http\FormRequest;

class ProfessorRequest extends FormRequest
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
        return [
            'matricula' => 'required|numeric',
            'nome' => 'required',
            'sobrenome' => 'required',
            'cpf' => 'required|unique:professores',
            'disciplinas' => 'required',
            'email' => 'required|unique:professores|email',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'matricula.required' => 'Campo matricula é obrigatório',
            'nome.required' => 'Campo nome é obrigatório',
            'sobrenome.required' => 'Campo sobrenome é obrigatório',
            'cpf.required' => 'Campo cpf é obrigatório',
            'disciplinas.required' => 'Campo disciplina é obrigatório',
            'email.required' => 'Campo email é obrigatório',
            'email.unique' => 'Email já cadastrado',
            'email.email' => 'Digite o e-mail em um formato válido',
            'password.required' => 'Campo password é obrigatório',
        ];
    }
}
