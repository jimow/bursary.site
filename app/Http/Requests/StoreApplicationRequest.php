<?php

namespace App\Http\Requests;

use App\Models\Application;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreApplicationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('application_create');
    }

    public function rules()
    {
        return [
            'first_name' => [
                'string',
                'min:3',
                'max:40',
                'required',
            ],
            'last_name' => [
                'string',
                'min:3',
                'max:40',
                'required',
            ],
            'other_names' => [
                'string',
                'nullable',
            ],
            'location' => [
                'string',
                'nullable',
            ],
            'sub_location' => [
                'string',
                'nullable',
            ],
            'tel_no' => [
                'string',
                'nullable',
            ],
            'village' => [
                'string',
                'nullable',
            ],
            'institution' => [
                'string',
                'required',
            ],
            'admission_number' => [
                'string',
                'required',
                'unique:applications',
            ],
            'form_year' => [
                'string',
                'required',
            ],
            'specify_disability' => [
                'required',
            ],
            'both_parents_alive' => [
                'required',
            ],
            'fathers_name' => [
                'string',
                'nullable',
            ],
            'fathers_occupation' => [
                'string',
                'nullable',
            ],
            'mothers_name' => [
                'string',
                'nullable',
            ],
            'mothers_occupation' => [
                'string',
                'nullable',
            ],
            'fathers_tel_no' => [
                'string',
                'nullable',
            ],
            'mothers_tel_no' => [
                'string',
                'nullable',
            ],
            'total_fees_payable' => [
                'required',
            ],
            'fee_balance' => [
                'required',
            ],
            'student_grade' => [
                'string',
                'required',
            ],
            'ward_id' => [
                'required',
                'integer',
            ],
            'course_id' => [
                'required',
               
            ],
            'voter_card' => [
                'string',
                'nullable',
            ],
            'attach_student_grade' => [
                'required',
            ],
            'fees_structure' => [
                'required',
            ],
            'fee_balance_attach' => [
                'required',
            ],
           
        ];
    }
}
