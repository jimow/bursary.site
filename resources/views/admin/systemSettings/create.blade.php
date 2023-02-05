@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.systemSetting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.system-settings.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="financial_year_id">{{ trans('cruds.systemSetting.fields.financial_year') }}</label>
                <select class="form-control select2 {{ $errors->has('financial_year') ? 'is-invalid' : '' }}" name="financial_year_id" id="financial_year_id">
                    @foreach($financial_years as $id => $entry)
                        <option value="{{ $id }}" {{ old('financial_year_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('financial_year'))
                    <span class="text-danger">{{ $errors->first('financial_year') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.systemSetting.fields.financial_year_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.systemSetting.fields.system_status') }}</label>
                @foreach(App\Models\SystemSetting::SYSTEM_STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('system_status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="system_status_{{ $key }}" name="system_status" value="{{ $key }}" {{ old('system_status', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="system_status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('system_status'))
                    <span class="text-danger">{{ $errors->first('system_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.systemSetting.fields.system_status_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection