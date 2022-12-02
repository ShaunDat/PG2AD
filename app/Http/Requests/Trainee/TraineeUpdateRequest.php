<?php

namespace App\Http\Requests\Trainee;

use App\AllParent;
use App\Trainee;
use Illuminate\Foundation\Http\FormRequest;

class TraineeUpdateRequest extends FormRequest
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
        $current_user = Trainee::find($this->trainee);

        return [
            'name' => 'required|string|max:255',
            'roll_number' => 'required|numeric|unique:trainees,roll_number,'. $this->trainee,
            'phone' => 'required|numeric|unique:trainees,phone,'. $this->trainee,
            'email' => 'required|email|unique:users,email,'. $current_user->user_id,
            'course_id' => 'required|numeric',
            'gender' => 'in:male,female,other',
            'password' => 'nullable|min:6',
            'age' => 'numeric|min:1',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string|max:255',
        ];
    }
}
