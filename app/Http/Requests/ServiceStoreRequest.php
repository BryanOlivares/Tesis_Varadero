<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceStoreRequest extends FormRequest
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
          
            'service'=>'required|string|min:4|max:20',
            'description'=>'required|string|min:10|max:25',
            'time1'=>'required|after:8:59',
            'time2'=>'required|before:21:01',
            'date1'=>'required|date|after:yesterday',
            'date2'=>'required|date|after:Yesterday',
         
        ];
    }

    public function messages()
    {
        return [
            'service.required' => 'El campo Servicio es requerido.',
            'service.min' => 'El campo nombre del servicio debe tener mínimo :min',
            'service.max' => 'El campo nombre del servicio debe tener máximo :max',
            'description.required' => 'El campo Descripción es requerido',
            'description.min' => 'La Descripción debe tener mínimo :min',
            'description.max' => 'La Descripción debe tener máximo :max',
            'time1.required' => 'El campo Hora de inicio es requerido',
            'time1.after' =>'El horario no puede ser antes de las 9:00 am',
            'time2.required' => 'El campo Hora fin es requerido',
            'time2.before' =>'El horario no puede ser después de las 21:00 pm', 
            'date1.required' => 'El campo Fecha de inicio es requerido',
            'date1.after' => 'Las fechas anteriores no son válidas ',
            'date2.required' => 'El campo Fecha de final es requerido',
            'date2.after' => 'Las fechas anteriores no son válidas ',
           
        ];
    }
}
