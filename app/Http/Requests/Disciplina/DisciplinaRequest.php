<?php

namespace App\Http\Requests\Disciplina;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Input;

class DisciplinaRequest extends FormRequest
{

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
        $disciplina = Input::get('nome');
        return [
                'nome' => 'required',
                ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Nome da disciplina é obrigatório',

        ];
    }
}
