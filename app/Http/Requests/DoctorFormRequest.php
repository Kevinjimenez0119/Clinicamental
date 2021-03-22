<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorFormRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|unique:pacientes|max:255',
            'password' => 'min:8',
           
            'apellido' => 'required|max:255',
            'telefono' => 'required|numeric',
            'ocupacion' => 'required|max:255',
            'dir' => 'required|max:255',
            'ciudad' => 'required|max:255',
            'recid' => 'required|max:255',
        ];
    }
}
