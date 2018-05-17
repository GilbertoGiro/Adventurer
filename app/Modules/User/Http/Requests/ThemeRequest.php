<?php

namespace App\Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemeRequest extends FormRequest
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
            'titulo'    => 'required',
            'descricao' => 'required',
            'nmusuario' => 'required',
            'email'     => 'required',
            'idcurso'   => 'required|exists:curso,id',
        ];
    }

    /**
     * Get validation messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'exists'   => 'O valor informado em :attribute não é válido'
        ];
    }

    /**
     * Get validation attributes
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'titulo'    => 'Título',
            'descricao' => 'Descrição',
            'nmusuario' => 'Nome',
            'email'     => 'E-mail',
            'idcurso'   => 'Curso',
        ];
    }
}
