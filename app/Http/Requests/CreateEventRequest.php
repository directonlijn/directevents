<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::user() && \Auth::user()->hasRole('administrator');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'days' => 'required',
            'price_ground' => 'required|integer',
            'price_ground_all_days' => 'nullable|integer',
            'price_stand' => 'required|integer',
            'price_stand_all_days' => 'nullable|integer',
            'domain' => 'required|url',
            'address' => 'required',
            'street_number' => 'required|integer',
            'addition' => 'nullable',
            'zipcode' => 'required|min:6|max:7',
            'city' => 'required',
            'country' => 'required'
        ];
    }

    /**
     * Get the messages from the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
//            'name.required' => 'name-required',
//            'days.required' => 'name-min',
        ];
    }
}
