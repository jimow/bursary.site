@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.awardUpload.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.award-uploads.update", [$awardUpload->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="sub_county_id">{{ trans('cruds.awardUpload.fields.sub_county') }}</label>
                <select class="form-control select2 {{ $errors->has('sub_county') ? 'is-invalid' : '' }}" name="sub_county_id" id="sub_county_id">
                    @foreach($sub_counties as $id => $entry)
                        <option value="{{ $id }}" {{ (old('sub_county_id') ? old('sub_county_id') : $awardUpload->sub_county->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('sub_county'))
                    <span class="text-danger">{{ $errors->first('sub_county') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.awardUpload.fields.sub_county_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ward_id">{{ trans('cruds.awardUpload.fields.ward') }}</label>
                <select class="form-control select2 {{ $errors->has('ward') ? 'is-invalid' : '' }}" name="ward_id" id="ward_id">
                    @foreach($wards as $id => $entry)
                        <option value="{{ $id }}" {{ (old('ward_id') ? old('ward_id') : $awardUpload->ward->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('ward'))
                    <span class="text-danger">{{ $errors->first('ward') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.awardUpload.fields.ward_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.awardUpload.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $awardUpload->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.awardUpload.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="file_uploaded">{{ trans('cruds.awardUpload.fields.file_uploaded') }}</label>
                <div class="needsclick dropzone {{ $errors->has('file_uploaded') ? 'is-invalid' : '' }}" id="file_uploaded-dropzone">
                </div>
                @if($errors->has('file_uploaded'))
                    <span class="text-danger">{{ $errors->first('file_uploaded') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.awardUpload.fields.file_uploaded_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="financial_year_id">{{ trans('cruds.awardUpload.fields.financial_year') }}</label>
                <select class="form-control select2 {{ $errors->has('financial_year') ? 'is-invalid' : '' }}" name="financial_year_id" id="financial_year_id">
                    @foreach($financial_years as $id => $entry)
                        <option value="{{ $id }}" {{ (old('financial_year_id') ? old('financial_year_id') : $awardUpload->financial_year->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('financial_year'))
                    <span class="text-danger">{{ $errors->first('financial_year') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.awardUpload.fields.financial_year_helper') }}</span>
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

@section('scripts')
<script>
    var uploadedFileUploadedMap = {}
Dropzone.options.fileUploadedDropzone = {
    url: '{{ route('admin.award-uploads.storeMedia') }}',
    maxFilesize: 8, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 8
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="file_uploaded[]" value="' + response.name + '">')
      uploadedFileUploadedMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedFileUploadedMap[file.name]
      }
      $('form').find('input[name="file_uploaded[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($awardUpload) && $awardUpload->file_uploaded)
          var files =
            {!! json_encode($awardUpload->file_uploaded) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="file_uploaded[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection