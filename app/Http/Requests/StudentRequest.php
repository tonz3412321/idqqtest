<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StudentRequest extends Request
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
            'first_name' => 'required|unique_with:students,last_name',
            'last_name' => 'required|unique_with:students,first_name',
            'address' => 'required',
            'age' => 'required|integer',
            'zip' => 'required',
            'city' => 'required',
            'states_id' => 'required|exists:states,id',
            'email' => 'required|email|unique:students',
            'level_id' => 'required|exists:levels,id',
            'section_id' => 'required|exists:sections,id',
        ];
    }
}
