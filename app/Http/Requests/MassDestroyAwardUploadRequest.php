<?php

namespace App\Http\Requests;

use App\Models\AwardUpload;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAwardUploadRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('award_upload_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:award_uploads,id',
        ];
    }
}
