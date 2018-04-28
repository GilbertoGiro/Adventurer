<?php

namespace App\Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecoveryRequest extends FormRequest
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
            'senha'  => 'required',
            'repita' => 'required|same:senha',
        ];
    }

    /**
     * Method to get Validation Messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'O campo <b>:attribute</b> é obrigatório.',
            'same'     => 'O campo <b>:attribute</b> e <b>:other</b> não estão iguais'
        ];
    }

    /**
     * Method to get Request Attributes Names
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'senha'  => 'Senha',
            'repita' => 'Repita a Senha',
        ];
    }
}
