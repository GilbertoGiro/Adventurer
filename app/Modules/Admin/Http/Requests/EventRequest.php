<?php

namespace App\Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'idtema'      => 'required|exists:tema,id',
            'duracao'     => 'required',
            'dtprevista'  => 'required|date',
            'hrinicio'    => 'required',
            'limite'      => 'required|integer',
            'palestrante' => 'required|string',
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
            'exists'   => 'O campo <b>:attribute</b> contém um valor inválido',
            'integer'  => 'O campo <b>:attribute</b> deve conter um número',
            'string'   => 'O campo <b>:attribute</b> deve conter um texto'
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
            'idtema'      => 'Tema',
            'duracao'     => 'Duração',
            'flaberto'    => 'Aberto a todos?',
            'dtprevista'  => 'Data Prevista',
            'hrinicio'    => 'Hora de Início',
            'limite'      => 'Limite de Participantes',
            'palestrante' => 'Palestrante',
        ];
    }
}
