<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContatoRequest extends FormRequest
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
        if ($this->method() == 'POST') {
            return [
                'name' => 'required|max:255',
                'email' => 'email|max:255|unique:contatos',
                'phone' => 'max:16',
                'city' => 'max:255',
                'state' => 'max:255',
                'period' => 'max:5'
            ];
        }
    }

    public function messages() {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'email.required' => 'O campo email é obrigatório',
            'email.email' => 'Informe um email válido',
            'email.unique' => 'Contato já foi enviado!!'
        ];
    }
}
