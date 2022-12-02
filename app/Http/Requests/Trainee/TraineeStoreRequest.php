<?php

namespace App\Http\Requests\Trainee;

use Illuminate\Foundation\Http\FormRequest;

class TraineeStoreRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'roll_number' => 'required|numeric|unique:trainees',
            'phone' => 'required|numeric|unique:trainees',
            'email' => 'required|email|unique:users',
            'course_id' => 'required|numeric',
            'gender' => 'in:male,female,other',
            'password' => 'required|min:6',
            'age' => 'numeric|min:1',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string|max:255',
        ];
    }
}
