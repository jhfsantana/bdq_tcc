<?php

namespace App\Http\Requests\Questao;

use Illuminate\Foundation\Http\FormRequest;

class QuestaoRequest extends FormRequest
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
            'questao' => 'required|unique:questoes',
            'disciplina_id' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'e' => 'required',
            'correta' => 'required'
            'nivel' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'questao.required' => 'Campo questão é obrigatório',
            'questao.unique' => 'Questão já cadastrada',
            'disciplina_id.required' => 'Campo disciplina é obrigatório',
            'a.required' => 'Campo alternativa "a" é obrigatório',
            'b.required' => 'Campo alternativa "b" é obrigatório',
            'c.required' => 'Campo alternativa "c" é obrigatório',
            'd.required' => 'Campo alternativa "d" é obrigatório',
            'e.required' => 'Campo alternativa "e" é obrigatório',
            'correta.required' => 'Por favor, marque a resposta da questão',
            'nivel.required' => 'Por favor, marque o nivel da questão',

        ];
    }
}
