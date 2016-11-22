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
            'name' => 'required',
            'sobrenome' => 'required',
            'cpf' => 'required|unique:admins',
            'email' => 'required|unique:admins',
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
            'cpf.unique' => 'CPF já cadastrado!',
            'email.required' => 'Campo email é obrigatório',
            'email.unique' => 'Já existe um usuário com esse email!',
            'password.required' => 'Campo password é obrigatório',
        ];
    }
























}
