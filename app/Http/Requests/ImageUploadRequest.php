<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageUploadRequest extends FormRequest
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
            'gender' => 'required',
            'perma_address' => 'required',
            'dob' => 'required|date',
            'high_school_gpa' => 'required',
            'high_school_name' => 'required',
            'caste' => 'required',
            'parent_id' => 'required',
            'phone_number' => 'required|digits:10|unique:profiles',
            'your_photo' => 'required|image',
            'citizenship_front' => 'required|image',
            'citizenship_back' => 'required|image',
            'marksheet_photo' => 'required|image',
        ];
    }

    public function messages()
    {
        return [
            'gender.required' => 'Please enter your gender.',
            'dob.required' => 'Please enter your date of birth.',
            'perma.required' => 'Please enter your permanent address.',
            'high_school_gpa.required' => 'Please enter your high school gpa.',
            'high_school_name.required' => 'Please enter your high school name.',
            'caste.required' => 'Please enter your caste.',
            'parent_id.required' => 'Please enter your parent ID.',
            'phone_number.required' => 'Please enter your phone number.',
            'phone_number.digits:10' => 'Please enter a 10 digit phone number.',
        
        ];
    }
}
