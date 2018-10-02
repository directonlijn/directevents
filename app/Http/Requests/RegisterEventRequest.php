<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::user() && (\Auth::user()->hasRole('administrator') || \Auth::user()->hasRole('standhouder'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'foodType' => 'required|in:food,non-food',
            'groundSpots' => 'required|integer|min:0',
            'stalls' => 'required|integer|min:0',
            'sellTypes' => 'required'
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
            'foodType.in' => 'food type niet geldig',
            'foodType.required' => 'food type is verplicht',
            'groundSpots.min' => 'Grondplekken kan niet lager dan 0 zijn',
            'groundSpots.required' => 'Grondplekken is verplicht om in te vullen',
            'groundSpots.integer' => 'Grondplekken moet een getal zijn',
            'stalls.min' => 'Kramen kan niet lager dan 0 zijn',
            'stalls.required' => 'Kramen is verplicht om in te vullen',
            'stalls.integer' => 'Kramen moet een getal zijn',
            'sellTypes.required' => 'Selecteer in ieder geval 1 product type'
        ];
    }
}
