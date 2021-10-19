<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AceptReservationStoreRequest extends FormRequest
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
            'state' => 'required',
            'comment'=> 'required|min:1|max:25',
            'pay'=> 'required|numeric'
        ];
    }
    public function messages()
    {
        return [
            
            'state.required' =>'El campo Estado es requerido',
            'comment.min' =>'El campo Observaciones debe tener almenos :min caracteres',
            'comment.max' =>'El campo Observaciones debe tener almenos :max caracteres',
            'pay.required' =>'El campo Valor a pagar es requerido',
            'pay.numeric' =>'El campo Valor a pagar solo admite numeros',
            'pay.min' =>'El campo Valor a pagar no puede ser menor a :min',
            'pay.max' =>'El campo Valor a pagar no puede ser mayor a :max',
        ];
    }
}
