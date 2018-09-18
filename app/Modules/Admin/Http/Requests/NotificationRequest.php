<?php

namespace App\Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotificationRequest extends FormRequest
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
     * Request Validation Rules
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo'        => 'required|string',
            'corpo'         => 'required|string',
            'stnotificacao' => 'required|string'
        ];
    }

    /**
     * Request Validation Attributes
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'titulo'        => 'Título',
            'corpo'         => 'Corpo',
            'stnotificacao' => 'Status'
        ];
    }

    /**
     * Request Validation Messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'O campo <b>:attribute</b> é obrigatório'
        ];
    }
}