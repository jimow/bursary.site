@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.awardUpload.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.award-uploads.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.awardUpload.fields.id') }}
                        </th>
                        <td>
                            {{ $awardUpload->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.awardUpload.fields.sub_county') }}
                        </th>
                        <td>
                            {{ $awardUpload->sub_county->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.awardUpload.fields.ward') }}
                        </th>
                        <td>
                            {{ $awardUpload->ward->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.awardUpload.fields.user') }}
                        </th>
                        <td>
                            {{ $awardUpload->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.awardUpload.fields.file_uploaded') }}
                        </th>
                        <td>
                            @foreach($awardUpload->file_uploaded as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.awardUpload.fields.financial_year') }}
                        </th>
                        <td>
                            {{ $awardUpload->financial_year->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.award-uploads.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection