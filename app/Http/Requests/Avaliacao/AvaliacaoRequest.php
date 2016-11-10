<?php

namespace App\Http\Requests\Avaliacao;

use Illuminate\Foundation\Http\FormRequest;

class AvaliacaoRequest extends FormRequest
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
            'avaliacaoform' => 'required', 
        ];
    }

    public function messages()
    {
        return [
            'qtd.required' => 'Campo quantidade é obrigatório',

        ];
    }
}


