<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name'=> 'required|alpha|min:5|max:15',
            'email'=> 'required|email|min:10|max:30',
        ];
    }
    public function messages()
    {
        return [
            
            'name.required' => 'El campo Nombre es requerido',
            'name.alpha' => 'El campo Nombre solo admite letras',
            'name.min' => 'El campo Nombre debe tener almenos :min letras',
            'name.max' => 'El campo Nombre debe tener máximo :max letras',
            'email.required' => 'El campo Email es requerido',
            'email.min' => 'El campo Email debe tener almenos :min letras',
            'email.max' => 'El campo Email debe tener máximo :max letras', 
            
           
        ];
    }
}
