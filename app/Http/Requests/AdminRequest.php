<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'email' => 'required',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'matricula.required' => 'Campo matricula é obrigatório',
            'nome.required' => 'Campo nome é obrigatório',
            'sobrenome.required' => 'Campo sobrenome é obrigatório',
            'email.required' => 'Campo email é obrigatório',
            'password.required' => 'Campo password é obrigatório',
        ];
    }
























}