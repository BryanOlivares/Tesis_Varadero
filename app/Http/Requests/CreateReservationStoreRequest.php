<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateReservationStoreRequest extends FormRequest
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
            'date'=> 'required',
            'time'=> 'required',
            'capacity'=> 'required',
            'state'=> 'required',
            'comment'=> 'required',
            'pay'=> 'required',
            
        ];
    }
}
