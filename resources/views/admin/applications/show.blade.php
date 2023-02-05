@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.application.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.applications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.id') }}
                        </th>
                        <td>
                            {{ $application->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.user') }}
                        </th>
                        <td>
                            {{ $application->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.first_name') }}
                        </th>
                        <td>
                            {{ $application->first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.last_name') }}
                        </th>
                        <td>
                            {{ $application->last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.other_names') }}
                        </th>
                        <td>
                            {{ $application->other_names }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.location') }}
                        </th>
                        <td>
                            {{ $application->location }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.sub_location') }}
                        </th>
                        <td>
                            {{ $application->sub_location }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.tel_no') }}
                        </th>
                        <td>
                            {{ $application->tel_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.village') }}
                        </th>
                        <td>
                            {{ $application->village }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.institution') }}
                        </th>
                        <td>
                            {{ $application->institution }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.admission_number') }}
                        </th>
                        <td>
                            {{ $application->admission_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.form_year') }}
                        </th>
                        <td>
                            {{ $application->form_year }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.disability') }}
                        </th>
                        <td>
                            {{ App\Models\Application::DISABILITY_RADIO[$application->disability] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.specify_disability') }}
                        </th>
                        <td>
                            {{ $application->specify_disability }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.received_bursary_before') }}
                        </th>
                        <td>
                            {{ App\Models\Application::RECEIVED_BURSARY_BEFORE_RADIO[$application->received_bursary_before] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.both_parents_alive') }}
                        </th>
                        <td>
                            {{ App\Models\Application::BOTH_PARENTS_ALIVE_RADIO[$application->both_parents_alive] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.fathers_name') }}
                        </th>
                        <td>
                            {{ $application->fathers_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.fathers_occupation') }}
                        </th>
                        <td>
                            {{ $application->fathers_occupation }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.mothers_name') }}
                        </th>
                        <td>
                            {{ $application->mothers_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.mothers_occupation') }}
                        </th>
                        <td>
                            {{ $application->mothers_occupation }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.fathers_tel_no') }}
                        </th>
                        <td>
                            {{ $application->fathers_tel_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.mothers_tel_no') }}
                        </th>
                        <td>
                            {{ $application->mothers_tel_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.total_fees_payable') }}
                        </th>
                        <td>
                            {{ $application->total_fees_payable }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.fee_balance') }}
                        </th>
                        <td>
                            {{ $application->fee_balance }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.student_grade') }}
                        </th>
                        <td>
                            {{ $application->student_grade }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.recommended') }}
                        </th>
                        <td>
                            {{ App\Models\Application::RECOMMENDED_RADIO[$application->recommended] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.ward') }}
                        </th>
                        <td>
                            {{ $application->ward->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.on_scholarships') }}
                        </th>
                        <td>
                            {{ App\Models\Application::ON_SCHOLARSHIPS_SELECT[$application->on_scholarships] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.sub_county') }}
                        </th>
                        <td>
                            {{ $application->sub_county->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.voter_card') }}
                        </th>
                        <td>
                            {{ $application->voter_card }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.cdf_amount_awarded') }}
                        </th>
                        <td>
                            {{ $application->cdf_amount_awarded }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.county_amount_awarded') }}
                        </th>
                        <td>
                            {{ $application->county_amount_awarded }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.recommended_for_county') }}
                        </th>
                        <td>
                            {{ App\Models\Application::RECOMMENDED_FOR_COUNTY_RADIO[$application->recommended_for_county] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.financial_year') }}
                        </th>
                        <td>
                            {{ $application->financial_year->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.type') }}
                        </th>
                        <td>
                            {{ $application->type->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Models\Application::GENDER_RADIO[$application->gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.cdf_applied') }}
                        </th>
                        <td>
                            {{ App\Models\Application::CDF_APPLIED_RADIO[$application->cdf_applied] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.county_applied') }}
                        </th>
                        <td>
                            {{ App\Models\Application::COUNTY_APPLIED_RADIO[$application->county_applied] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.fathers_identity_card') }}
                        </th>
                        <td>
                            @if($application->fathers_identity_card)
                                <a href="{{ $application->fathers_identity_card->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.attach_student_grade') }}
                        </th>
                        <td>
                            @if($application->attach_student_grade)
                                <a href="{{ $application->attach_student_grade->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.mothers_identity_card') }}
                        </th>
                        <td>
                            @if($application->mothers_identity_card)
                                <a href="{{ $application->mothers_identity_card->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.fees_structure') }}
                        </th>
                        <td>
                            @if($application->fees_structure)
                                <a href="{{ $application->fees_structure->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.fee_balance_attach') }}
                        </th>
                        <td>
                            @if($application->fee_balance_attach)
                                <a href="{{ $application->fee_balance_attach->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.attach_voter_card') }}
                        </th>
                        <td>
                            @if($application->attach_voter_card)
                                <a href="{{ $application->attach_voter_card->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.course') }}
                        </th>
                        <td>
                            {{ $application->course->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.application_no') }}
                        </th>
                        <td>
                            {{ $application->application_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.upload_application_form') }}
                        </th>
                        <td>
                            @if($application->upload_application_form)
                                <a href="{{ $application->upload_application_form->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.applications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection