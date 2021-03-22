<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HistoriaFormRequest extends FormRequest
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
            'medicamentos' => 'required|max:255',
            'notas' => 'required||max:255',
            'altura' => 'required|numeric',
            'peso' => 'required|numeric',
            'rh' => 'required',
            'edad' => 'required|numeric|max:99|min:0',
            'sintoma' => 'required|max:255',
            'descripcion' => 'required|max:255',
            'problema' => 'required|max:255',
        ];
    }
}
