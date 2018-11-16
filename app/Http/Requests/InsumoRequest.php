<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsumoRequest extends FormRequest
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
            'ID_LOTE' => 'required',
            'NOMBRE' => 'required|String|unique:insumo',
            'ID_LABORATORIO' => 'required',
            'EXISTENCIA' => 'required'
        ];
    }
}
