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
            'comment'=> 'required|min:10|max:30',
            'pay'=> 'required|numeric|min:5|max:30|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/'
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
            'pay.between' =>'El campo no acepta valores negativos',
            // 'service.unique' =>'El servicio ya fue tomado, debe escoger otro',
        ];
    }
}
