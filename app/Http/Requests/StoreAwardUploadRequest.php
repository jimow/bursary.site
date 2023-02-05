<?php

namespace App\Http\Requests;

use App\Models\AwardUpload;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAwardUploadRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('award_upload_create');
    }

    public function rules()
    {
        return [
            'file_uploaded' => [
                'array',
            ],
        ];
    }
}
