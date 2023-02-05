<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAwardUploadRequest;
use App\Http\Requests\StoreAwardUploadRequest;
use App\Http\Requests\UpdateAwardUploadRequest;
use App\Models\AwardUpload;
use App\Models\FinancialYear;
use App\Models\SubCounty;
use App\Models\User;
use App\Models\Ward;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class AwardUploadsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('award_upload_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $awardUploads = AwardUpload::with(['sub_county', 'ward', 'user', 'financial_year', 'media'])->get();

        return view('admin.awardUploads.index', compact('awardUploads'));
    }

    public function create()
    {
        abort_if(Gate::denies('award_upload_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sub_counties = SubCounty::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $wards = Ward::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $financial_years = FinancialYear::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.awardUploads.create', compact('financial_years', 'sub_counties', 'users', 'wards'));
    }

    public function store(StoreAwardUploadRequest $request)
    {
        $awardUpload = AwardUpload::create($request->all());

        foreach ($request->input('file_uploaded', []) as $file) {
            $awardUpload->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('file_uploaded');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $awardUpload->id]);
        }

        return redirect()->route('admin.award-uploads.index');
    }

    public function edit(AwardUpload $awardUpload)
    {
        abort_if(Gate::denies('award_upload_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sub_counties = SubCounty::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $wards = Ward::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $financial_years = FinancialYear::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $awardUpload->load('sub_county', 'ward', 'user', 'financial_year');

        return view('admin.awardUploads.edit', compact('awardUpload', 'financial_years', 'sub_counties', 'users', 'wards'));
    }

    public function update(UpdateAwardUploadRequest $request, AwardUpload $awardUpload)
    {
        $awardUpload->update($request->all());

        if (count($awardUpload->file_uploaded) > 0) {
            foreach ($awardUpload->file_uploaded as $media) {
                if (!in_array($media->file_name, $request->input('file_uploaded', []))) {
                    $media->delete();
                }
            }
        }
        $media = $awardUpload->file_uploaded->pluck('file_name')->toArray();
        foreach ($request->input('file_uploaded', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $awardUpload->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('file_uploaded');
            }
        }

        return redirect()->route('admin.award-uploads.index');
    }

    public function show(AwardUpload $awardUpload)
    {
        abort_if(Gate::denies('award_upload_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $awardUpload->load('sub_county', 'ward', 'user', 'financial_year');

        return view('admin.awardUploads.show', compact('awardUpload'));
    }

    public function destroy(AwardUpload $awardUpload)
    {
        abort_if(Gate::denies('award_upload_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $awardUpload->delete();

        return back();
    }

    public function massDestroy(MassDestroyAwardUploadRequest $request)
    {
        AwardUpload::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('award_upload_create') && Gate::denies('award_upload_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new AwardUpload();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
