<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationStoreRequest extends FormRequest
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
            'service'=> 'required',
            'name'=> 'required',
            'email'=> 'required',
            'date'=> 'required|date|after:yesterday',
            'time'=> 'required|after:8:59|before:20:01',
            'capacity'=> 'required|numeric|min:1|max:5', 
            'state' => 'required',
            'comment'=> 'required|alpha',
            'pay'=> 'required|numeric|min:0|max:30'
        ];
    }
    public function messages()
    {
        return [
            'service.required' => 'El campo Servicio es requerido.',
            'name.required' => 'El campo Nombre es requerido',
            'email.required' => 'El campo Email es requerido', 
            'date.required' => 'El campo Fecha de reservación es requerido',
            'date.after' => 'Las fechas anteriores no son válidas ',
            'time.required' => 'El campo Hora de reservación es requerido',
            'time.after' =>'El horario no puede ser antes de las 9:00 am',
            'time.before' =>'El horario no puede ser después de las 21:00 pm', 
            'capacity.required' => 'El campo Cant. de Usuario es requerido',
            'capacity.numeric' => 'La Cant. de usuarios debe ser un número',
            'capacity.min' =>'La cantidad de usuarios no puede ser menor a :min',
            'capacity.max' =>'La cantidad de usuarios no puede ser mayor a :max',
        ];
    }   

}
