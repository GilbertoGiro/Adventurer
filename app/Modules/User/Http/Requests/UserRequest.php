<?php

namespace App\Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        switch($this->method()){
            case 'POST':
                return [
                    'nome'      => 'required|between:1,200',
                    'email'     => 'required|between:1,200|unique:usuario',
                    'idcurso'   => 'nullable|exists:curso,id',
                    'flexterno' => 'required',
                    'idpapel'   => 'exists:papel,id'
                ];
                break;
            case 'PUT':
                return [
                    'nome'    => 'required|between:1,200',
                    'email'   => 'required|between:1,200|unique:usuario,email,' . request('id'),
                    'idpapel' => 'exists:papel,id'
                ];
                break;
        }
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
            'between'  => 'O campo <b>:attribute</b> extrapolou o limite de caracteres permitido',
            'exists'   => 'O <b>:attribute</b> informado não existe',
            'unique'   => 'O :attribute informado já está sendo utilizado.'
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
            'nome'      => 'Nome',
            'email'     => 'E-mail',
            'idcurso'   => 'Curso',
            'idpapel'   => 'Papel',
            'flexterno' => 'Aluno externo'
        ];
    }
}
