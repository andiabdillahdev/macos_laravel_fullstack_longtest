<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class MembersRequest extends FormRequest
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
        $rules =  [
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'phone_number' => 'required|numeric|unique:members',
            'date_of_birth' => 'required|date',
        ];

        if ($this->method() == 'POST') {
            return $rules;
        }else{
            $rules['phone_number'] = 'required|numeric';

            return $rules;
        }
        
    }
}
