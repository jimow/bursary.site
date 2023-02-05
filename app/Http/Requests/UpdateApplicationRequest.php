<?php

namespace App\Http\Requests;

use App\Models\Application;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateApplicationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('application_edit');
    }

    public function rules()
    {
        return [
            'first_name' => [
                'string',
                'min:3',
                'max:40',
               
            ],
            'last_name' => [
                'string',
                'min:3',
                'max:40',
                
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
            
            ],
            'admission_number' => [
                'string',
              
                //'unique:applications,admission_number,' . request()->route('application')->id,
            ],
            'form_year' => [
                'string',
                
            ],
            'specify_disability' => [
              
            ],
            'both_parents_alive' => [
                
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
               
            ],
            'fee_balance' => [
                
            ],
            'student_grade' => [
                'string',
            
            ],
            'ward_id' => [
             
                'integer',
            ],
            'voter_card' => [
                'string',
                'nullable',
            ],
            'attach_student_grade' => [
             
            ],
            'fees_structure' => [
               
            ],
            'fee_balance_attach' => [
            
            ],
            'application_no' => [
                'string',
             
              //  'unique:applications,application_no,' . request()->route('application')->id,
            ],
        ];
    }
}
