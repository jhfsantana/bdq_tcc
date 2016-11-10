<?php

namespace App\Http\Requests\Disciplina;

use Illuminate\Foundation\Http\FormRequest;

class DisciplinaRequest extends FormRequest
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
            'nome' => 'required',
            'turmas' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Nome da disciplina é obrigatório',
            'turmas.required' => 'Campo turmas é obrigatório',

        ];
    }
}