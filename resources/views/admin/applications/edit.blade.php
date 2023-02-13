@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.application.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.applications.update", [$application->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @can('can_user')
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.application.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $application->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="first_name">{{ trans('cruds.application.fields.first_name') }}</label>
                <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" value="{{ old('first_name', $application->first_name) }}" required>
                @if($errors->has('first_name'))
                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.first_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="last_name">{{ trans('cruds.application.fields.last_name') }}</label>
                <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" id="last_name" value="{{ old('last_name', $application->last_name) }}" required>
                @if($errors->has('last_name'))
                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.last_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="other_names">{{ trans('cruds.application.fields.other_names') }}</label>
                <input class="form-control {{ $errors->has('other_names') ? 'is-invalid' : '' }}" type="text" name="other_names" id="other_names" value="{{ old('other_names', $application->other_names) }}">
                @if($errors->has('other_names'))
                    <span class="text-danger">{{ $errors->first('other_names') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.other_names_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="location">{{ trans('cruds.application.fields.location') }}</label>
                <input class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" type="text" name="location" id="location" value="{{ old('location', $application->location) }}">
                @if($errors->has('location'))
                    <span class="text-danger">{{ $errors->first('location') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.location_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sub_location">{{ trans('cruds.application.fields.sub_location') }}</label>
                <input class="form-control {{ $errors->has('sub_location') ? 'is-invalid' : '' }}" type="text" name="sub_location" id="sub_location" value="{{ old('sub_location', $application->sub_location) }}">
                @if($errors->has('sub_location'))
                    <span class="text-danger">{{ $errors->first('sub_location') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.sub_location_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tel_no">{{ trans('cruds.application.fields.tel_no') }}</label>
                <input class="form-control {{ $errors->has('tel_no') ? 'is-invalid' : '' }}" type="text" name="tel_no" id="tel_no" value="{{ old('tel_no', $application->tel_no) }}">
                @if($errors->has('tel_no'))
                    <span class="text-danger">{{ $errors->first('tel_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.tel_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="village">{{ trans('cruds.application.fields.village') }}</label>
                <input class="form-control {{ $errors->has('village') ? 'is-invalid' : '' }}" type="text" name="village" id="village" value="{{ old('village', $application->village) }}">
                @if($errors->has('village'))
                    <span class="text-danger">{{ $errors->first('village') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.village_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="institution">{{ trans('cruds.application.fields.institution') }}</label>
                <input class="form-control {{ $errors->has('institution') ? 'is-invalid' : '' }}" type="text" name="institution" id="institution" value="{{ old('institution', $application->institution) }}" required>
                @if($errors->has('institution'))
                    <span class="text-danger">{{ $errors->first('institution') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.institution_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="admission_number">{{ trans('cruds.application.fields.admission_number') }}</label>
                <input class="form-control {{ $errors->has('admission_number') ? 'is-invalid' : '' }}" type="text" name="admission_number" id="admission_number" value="{{ old('admission_number', $application->admission_number) }}" required>
                @if($errors->has('admission_number'))
                    <span class="text-danger">{{ $errors->first('admission_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.admission_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="form_year">{{ trans('cruds.application.fields.form_year') }}</label>
                <input class="form-control {{ $errors->has('form_year') ? 'is-invalid' : '' }}" type="text" name="form_year" id="form_year" value="{{ old('form_year', $application->form_year) }}" required>
                @if($errors->has('form_year'))
                    <span class="text-danger">{{ $errors->first('form_year') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.form_year_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.application.fields.disability') }}</label>
                @foreach(App\Models\Application::DISABILITY_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('disability') ? 'is-invalid' : '' }}">
                        <input  type="radio" id="disability_{{ $key }}" name="disability" value="{{ $key }}" {{ old('disability', $application->disability) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="disability_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
               
                @if($errors->has('disability'))
                    <span class="text-danger">{{ $errors->first('disability') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.disability_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="specify_disability">{{ trans('cruds.application.fields.specify_disability') }}</label>
                <textarea class="form-control {{ $errors->has('specify_disability') ? 'is-invalid' : '' }}" name="specify_disability" id="specify_disability" required>{{ old('specify_disability', $application->specify_disability) }}</textarea>
                @if($errors->has('specify_disability'))
                    <span class="text-danger">{{ $errors->first('specify_disability') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.specify_disability_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.application.fields.received_bursary_before') }}</label>
                @foreach(App\Models\Application::RECEIVED_BURSARY_BEFORE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('received_bursary_before') ? 'is-invalid' : '' }}">
                        <input type="radio" id="received_bursary_before_{{ $key }}" name="received_bursary_before" value="{{ $key }}" {{ old('received_bursary_before', $application->received_bursary_before) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="received_bursary_before_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('received_bursary_before'))
                    <span class="text-danger">{{ $errors->first('received_bursary_before') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.received_bursary_before_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.application.fields.both_parents_alive') }}</label>
                @foreach(App\Models\Application::BOTH_PARENTS_ALIVE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('both_parents_alive') ? 'is-invalid' : '' }}">
                        <input  type="radio" id="both_parents_alive_{{ $key }}" name="both_parents_alive" value="{{ $key }}" {{ old('both_parents_alive', $application->both_parents_alive) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="both_parents_alive_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('both_parents_alive'))
                    <span class="text-danger">{{ $errors->first('both_parents_alive') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.both_parents_alive_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fathers_name">{{ trans('cruds.application.fields.fathers_name') }}</label>
                <input class="form-control {{ $errors->has('fathers_name') ? 'is-invalid' : '' }}" type="text" name="fathers_name" id="fathers_name" value="{{ old('fathers_name', $application->fathers_name) }}">
                @if($errors->has('fathers_name'))
                    <span class="text-danger">{{ $errors->first('fathers_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.fathers_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fathers_occupation">{{ trans('cruds.application.fields.fathers_occupation') }}</label>
                <input class="form-control {{ $errors->has('fathers_occupation') ? 'is-invalid' : '' }}" type="text" name="fathers_occupation" id="fathers_occupation" value="{{ old('fathers_occupation', $application->fathers_occupation) }}">
                @if($errors->has('fathers_occupation'))
                    <span class="text-danger">{{ $errors->first('fathers_occupation') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.fathers_occupation_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mothers_name">{{ trans('cruds.application.fields.mothers_name') }}</label>
                <input class="form-control {{ $errors->has('mothers_name') ? 'is-invalid' : '' }}" type="text" name="mothers_name" id="mothers_name" value="{{ old('mothers_name', $application->mothers_name) }}">
                @if($errors->has('mothers_name'))
                    <span class="text-danger">{{ $errors->first('mothers_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.mothers_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mothers_occupation">{{ trans('cruds.application.fields.mothers_occupation') }}</label>
                <input class="form-control {{ $errors->has('mothers_occupation') ? 'is-invalid' : '' }}" type="text" name="mothers_occupation" id="mothers_occupation" value="{{ old('mothers_occupation', $application->mothers_occupation) }}">
                @if($errors->has('mothers_occupation'))
                    <span class="text-danger">{{ $errors->first('mothers_occupation') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.mothers_occupation_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fathers_tel_no">{{ trans('cruds.application.fields.fathers_tel_no') }}</label>
                <input class="form-control {{ $errors->has('fathers_tel_no') ? 'is-invalid' : '' }}" type="text" name="fathers_tel_no" id="fathers_tel_no" value="{{ old('fathers_tel_no', $application->fathers_tel_no) }}">
                @if($errors->has('fathers_tel_no'))
                    <span class="text-danger">{{ $errors->first('fathers_tel_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.fathers_tel_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mothers_tel_no">{{ trans('cruds.application.fields.mothers_tel_no') }}</label>
                <input class="form-control {{ $errors->has('mothers_tel_no') ? 'is-invalid' : '' }}" type="text" name="mothers_tel_no" id="mothers_tel_no" value="{{ old('mothers_tel_no', $application->mothers_tel_no) }}">
                @if($errors->has('mothers_tel_no'))
                    <span class="text-danger">{{ $errors->first('mothers_tel_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.mothers_tel_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="total_fees_payable">{{ trans('cruds.application.fields.total_fees_payable') }}</label>
                <input class="form-control {{ $errors->has('total_fees_payable') ? 'is-invalid' : '' }}" type="number" name="total_fees_payable" id="total_fees_payable" value="{{ old('total_fees_payable', $application->total_fees_payable) }}" step="0.01" required>
                @if($errors->has('total_fees_payable'))
                    <span class="text-danger">{{ $errors->first('total_fees_payable') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.total_fees_payable_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fee_balance">{{ trans('cruds.application.fields.fee_balance') }}</label>
                <input class="form-control {{ $errors->has('fee_balance') ? 'is-invalid' : '' }}" type="number" name="fee_balance" id="fee_balance" value="{{ old('fee_balance', $application->fee_balance) }}" step="0.01" required>
                @if($errors->has('fee_balance'))
                    <span class="text-danger">{{ $errors->first('fee_balance') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.fee_balance_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="student_grade">{{ trans('cruds.application.fields.student_grade') }}</label>
                <input class="form-control {{ $errors->has('student_grade') ? 'is-invalid' : '' }}" type="text" name="student_grade" id="student_grade" value="{{ old('student_grade', $application->student_grade) }}" required>
                @if($errors->has('student_grade'))
                    <span class="text-danger">{{ $errors->first('student_grade') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.student_grade_helper') }}</span>
            </div>
           
            <div class="form-group">
                <label class="required" for="ward_id">{{ trans('cruds.application.fields.ward') }}</label>
                <select class="form-control select2 {{ $errors->has('ward') ? 'is-invalid' : '' }}" name="ward_id" id="ward_id" required>
                    @foreach($wards as $id => $entry)
                        <option value="{{ $id }}" {{ (old('ward_id') ? old('ward_id') : $application->ward->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('ward'))
                    <span class="text-danger">{{ $errors->first('ward') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.ward_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.application.fields.on_scholarships') }}</label>
                <select class="form-control {{ $errors->has('on_scholarships') ? 'is-invalid' : '' }}" name="on_scholarships" id="on_scholarships">
                    <option value disabled {{ old('on_scholarships', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Application::ON_SCHOLARSHIPS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('on_scholarships', $application->on_scholarships) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('on_scholarships'))
                    <span class="text-danger">{{ $errors->first('on_scholarships') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.on_scholarships_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sub_county_id">{{ trans('cruds.application.fields.sub_county') }}</label>
                <select class="form-control select2 {{ $errors->has('sub_county') ? 'is-invalid' : '' }}" name="sub_county_id" id="sub_county_id">
                    @foreach($sub_counties as $id => $entry)
                        <option value="{{ $id }}" {{ (old('sub_county_id') ? old('sub_county_id') : $application->sub_county->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('sub_county'))
                    <span class="text-danger">{{ $errors->first('sub_county') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.sub_county_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="voter_card">{{ trans('cruds.application.fields.voter_card') }}</label>
                <input class="form-control {{ $errors->has('voter_card') ? 'is-invalid' : '' }}" type="text" name="voter_card" id="voter_card" value="{{ old('voter_card', $application->voter_card) }}">
                @if($errors->has('voter_card'))
                    <span class="text-danger">{{ $errors->first('voter_card') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.voter_card_helper') }}</span>
            </div>
           
            
            <div class="form-group">
                <label for="financial_year_id">{{ trans('cruds.application.fields.financial_year') }}</label>
                <select class="form-control select2 {{ $errors->has('financial_year') ? 'is-invalid' : '' }}" name="financial_year_id" id="financial_year_id">
                    @foreach($financial_years as $id => $entry)
                        <option value="{{ $id }}" {{ (old('financial_year_id') ? old('financial_year_id') : $application->financial_year->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('financial_year'))
                    <span class="text-danger">{{ $errors->first('financial_year') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.financial_year_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="type_id">{{ trans('cruds.application.fields.type') }}</label>
                <select class="form-control select2 {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type_id" id="type_id">
                    @foreach($types as $id => $entry)
                        <option value="{{ $id }}" {{ (old('type_id') ? old('type_id') : $application->type->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.application.fields.gender') }}</label>
                @foreach(App\Models\Application::GENDER_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('gender') ? 'is-invalid' : '' }}">
                        <input type="radio" id="gender_{{ $key }}" name="gender" value="{{ $key }}" {{ old('gender', $application->gender) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="gender_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('gender'))
                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.gender_helper') }}</span>
            </div>
            
           
            <div class="form-group">
                <label for="fathers_identity_card">{{ trans('cruds.application.fields.fathers_identity_card') }}</label>
                <div class="needsclick dropzone {{ $errors->has('fathers_identity_card') ? 'is-invalid' : '' }}" id="fathers_identity_card-dropzone">
                </div>
                @if($errors->has('fathers_identity_card'))
                    <span class="text-danger">{{ $errors->first('fathers_identity_card') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.fathers_identity_card_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="attach_student_grade">{{ trans('cruds.application.fields.attach_student_grade') }}</label>
                <div class="needsclick dropzone {{ $errors->has('attach_student_grade') ? 'is-invalid' : '' }}" id="attach_student_grade-dropzone">
                </div>
                @if($errors->has('attach_student_grade'))
                    <span class="text-danger">{{ $errors->first('attach_student_grade') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.attach_student_grade_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mothers_identity_card">{{ trans('cruds.application.fields.mothers_identity_card') }}</label>
                <div class="needsclick dropzone {{ $errors->has('mothers_identity_card') ? 'is-invalid' : '' }}" id="mothers_identity_card-dropzone">
                </div>
                @if($errors->has('mothers_identity_card'))
                    <span class="text-danger">{{ $errors->first('mothers_identity_card') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.mothers_identity_card_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fees_structure">{{ trans('cruds.application.fields.fees_structure') }}</label>
                <div class="needsclick dropzone {{ $errors->has('fees_structure') ? 'is-invalid' : '' }}" id="fees_structure-dropzone">
                </div>
                @if($errors->has('fees_structure'))
                    <span class="text-danger">{{ $errors->first('fees_structure') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.fees_structure_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fee_balance_attach">{{ trans('cruds.application.fields.fee_balance_attach') }}</label>
                <div class="needsclick dropzone {{ $errors->has('fee_balance_attach') ? 'is-invalid' : '' }}" id="fee_balance_attach-dropzone">
                </div>
                @if($errors->has('fee_balance_attach'))
                    <span class="text-danger">{{ $errors->first('fee_balance_attach') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.fee_balance_attach_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="attach_voter_card">{{ trans('cruds.application.fields.attach_voter_card') }}</label>
                <div class="needsclick dropzone {{ $errors->has('attach_voter_card') ? 'is-invalid' : '' }}" id="attach_voter_card-dropzone">
                </div>
                @if($errors->has('attach_voter_card'))
                    <span class="text-danger">{{ $errors->first('attach_voter_card') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.attach_voter_card_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="course_id">{{ trans('cruds.application.fields.course') }}</label>
                <select class="form-control select2 {{ $errors->has('course') ? 'is-invalid' : '' }}" name="course_id" id="course_id">
                    @foreach($courses as $id => $entry)
                        <option value="{{ $id }}" {{ (old('course_id') ? old('course_id') : $application->course->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('course'))
                    <span class="text-danger">{{ $errors->first('course') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.course_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="upload_application_form">{{ trans('cruds.application.fields.upload_application_form') }}</label>
                <div class="needsclick dropzone {{ $errors->has('upload_application_form') ? 'is-invalid' : '' }}" id="upload_application_form-dropzone">
                </div>
                @if($errors->has('upload_application_form'))
                    <span class="text-danger">{{ $errors->first('upload_application_form') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.upload_application_form_helper') }}</span>
            </div>
           @endcan


          

            

       
     
              <!-- CDF -->
              @can('can_cdf')
             
              <div class="form-group">
                  <label for="cdf_amount_awarded">{{ trans('cruds.application.fields.cdf_amount_awarded') }}</label>
                  <input class="form-control {{ $errors->has('cdf_amount_awarded') ? 'is-invalid' : '' }}" type="number" name="cdf_amount_awarded" id="cdf_amount_awarded" value="{{ old('cdf_amount_awarded', $application->cdf_amount_awarded) }}" step="0.01">
                  @if($errors->has('cdf_amount_awarded'))
                      <span class="text-danger">{{ $errors->first('cdf_amount_awarded') }}</span>
                  @endif
                  <span class="help-block">{{ trans('cruds.application.fields.cdf_amount_awarded_helper') }}</span>
              </div>
            @endcan

            @can('can_county')
             
            <div class="form-group">
                <label for="county_amount_awarded">{{ trans('cruds.application.fields.county_amount_awarded') }}</label>
                <input class="form-control {{ $errors->has('county_amount_awarded') ? 'is-invalid' : '' }}" type="number" name="county_amount_awarded" id="county_amount_awarded" value="{{ old('county_amount_awarded', $application->county_amount_awarded) }}" step="0.01">
                @if($errors->has('county_amount_awarded'))
                    <span class="text-danger">{{ $errors->first('county_amount_awarded') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.county_amount_awarded_helper') }}</span>
            </div>
          @endcan
             
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
    Dropzone.options.fathersIdentityCardDropzone = {
    url: '{{ route('admin.applications.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="fathers_identity_card"]').remove()
      $('form').append('<input type="hidden" name="fathers_identity_card" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="fathers_identity_card"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($application) && $application->fathers_identity_card)
      var file = {!! json_encode($application->fathers_identity_card) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="fathers_identity_card" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
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
<script>
    Dropzone.options.attachStudentGradeDropzone = {
    url: '{{ route('admin.applications.storeMedia') }}',
    maxFilesize: 8, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 8
    },
    success: function (file, response) {
      $('form').find('input[name="attach_student_grade"]').remove()
      $('form').append('<input type="hidden" name="attach_student_grade" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="attach_student_grade"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($application) && $application->attach_student_grade)
      var file = {!! json_encode($application->attach_student_grade) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="attach_student_grade" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
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
<script>
    Dropzone.options.mothersIdentityCardDropzone = {
    url: '{{ route('admin.applications.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="mothers_identity_card"]').remove()
      $('form').append('<input type="hidden" name="mothers_identity_card" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="mothers_identity_card"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($application) && $application->mothers_identity_card)
      var file = {!! json_encode($application->mothers_identity_card) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="mothers_identity_card" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
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
<script>
    Dropzone.options.feesStructureDropzone = {
    url: '{{ route('admin.applications.storeMedia') }}',
    maxFilesize: 8, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 8
    },
    success: function (file, response) {
      $('form').find('input[name="fees_structure"]').remove()
      $('form').append('<input type="hidden" name="fees_structure" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="fees_structure"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($application) && $application->fees_structure)
      var file = {!! json_encode($application->fees_structure) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="fees_structure" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
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
<script>
    Dropzone.options.feeBalanceAttachDropzone = {
    url: '{{ route('admin.applications.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="fee_balance_attach"]').remove()
      $('form').append('<input type="hidden" name="fee_balance_attach" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="fee_balance_attach"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($application) && $application->fee_balance_attach)
      var file = {!! json_encode($application->fee_balance_attach) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="fee_balance_attach" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
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
<script>
    Dropzone.options.attachVoterCardDropzone = {
    url: '{{ route('admin.applications.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="attach_voter_card"]').remove()
      $('form').append('<input type="hidden" name="attach_voter_card" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="attach_voter_card"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($application) && $application->attach_voter_card)
      var file = {!! json_encode($application->attach_voter_card) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="attach_voter_card" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
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
<script>
    Dropzone.options.uploadApplicationFormDropzone = {
    url: '{{ route('admin.applications.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="upload_application_form"]').remove()
      $('form').append('<input type="hidden" name="upload_application_form" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="upload_application_form"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($application) && $application->upload_application_form)
      var file = {!! json_encode($application->upload_application_form) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="upload_application_form" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
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