<div class="m-3">
    @can('application_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.applications.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.application.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.application.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-wardApplications">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.application.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.user') }}
                            </th>
                            <th>
                                {{ trans('cruds.user.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.user.fields.email') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.first_name') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.last_name') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.other_names') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.location') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.sub_location') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.tel_no') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.village') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.institution') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.admission_number') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.form_year') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.disability') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.specify_disability') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.received_bursary_before') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.both_parents_alive') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.fathers_name') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.fathers_occupation') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.mothers_name') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.mothers_occupation') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.fathers_tel_no') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.mothers_tel_no') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.total_fees_payable') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.fee_balance') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.student_grade') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.recommended') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.ward') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.on_scholarships') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.sub_county') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.voter_card') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.cdf_amount_awarded') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.county_amount_awarded') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.recommended_for_county') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.financial_year') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.type') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.gender') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.cdf_applied') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.county_applied') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.fathers_identity_card') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.attach_student_grade') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.mothers_identity_card') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.fees_structure') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.fee_balance_attach') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.attach_voter_card') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.course') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.application_no') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.upload_application_form') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($applications as $key => $application)
                            <tr data-entry-id="{{ $application->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $application->id ?? '' }}
                                </td>
                                <td>
                                    {{ $application->user->name ?? '' }}
                                </td>
                                <td>
                                    {{ $application->user->name ?? '' }}
                                </td>
                                <td>
                                    {{ $application->user->email ?? '' }}
                                </td>
                                <td>
                                    {{ $application->first_name ?? '' }}
                                </td>
                                <td>
                                    {{ $application->last_name ?? '' }}
                                </td>
                                <td>
                                    {{ $application->other_names ?? '' }}
                                </td>
                                <td>
                                    {{ $application->location ?? '' }}
                                </td>
                                <td>
                                    {{ $application->sub_location ?? '' }}
                                </td>
                                <td>
                                    {{ $application->tel_no ?? '' }}
                                </td>
                                <td>
                                    {{ $application->village ?? '' }}
                                </td>
                                <td>
                                    {{ $application->institution ?? '' }}
                                </td>
                                <td>
                                    {{ $application->admission_number ?? '' }}
                                </td>
                                <td>
                                    {{ $application->form_year ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Application::DISABILITY_RADIO[$application->disability] ?? '' }}
                                </td>
                                <td>
                                    {{ $application->specify_disability ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Application::RECEIVED_BURSARY_BEFORE_RADIO[$application->received_bursary_before] ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Application::BOTH_PARENTS_ALIVE_RADIO[$application->both_parents_alive] ?? '' }}
                                </td>
                                <td>
                                    {{ $application->fathers_name ?? '' }}
                                </td>
                                <td>
                                    {{ $application->fathers_occupation ?? '' }}
                                </td>
                                <td>
                                    {{ $application->mothers_name ?? '' }}
                                </td>
                                <td>
                                    {{ $application->mothers_occupation ?? '' }}
                                </td>
                                <td>
                                    {{ $application->fathers_tel_no ?? '' }}
                                </td>
                                <td>
                                    {{ $application->mothers_tel_no ?? '' }}
                                </td>
                                <td>
                                    {{ $application->total_fees_payable ?? '' }}
                                </td>
                                <td>
                                    {{ $application->fee_balance ?? '' }}
                                </td>
                                <td>
                                    {{ $application->student_grade ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Application::RECOMMENDED_RADIO[$application->recommended] ?? '' }}
                                </td>
                                <td>
                                    {{ $application->ward->name ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Application::ON_SCHOLARSHIPS_SELECT[$application->on_scholarships] ?? '' }}
                                </td>
                                <td>
                                    {{ $application->sub_county->name ?? '' }}
                                </td>
                                <td>
                                    {{ $application->voter_card ?? '' }}
                                </td>
                                <td>
                                    {{ $application->cdf_amount_awarded ?? '' }}
                                </td>
                                <td>
                                    {{ $application->county_amount_awarded ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Application::RECOMMENDED_FOR_COUNTY_RADIO[$application->recommended_for_county] ?? '' }}
                                </td>
                                <td>
                                    {{ $application->financial_year->name ?? '' }}
                                </td>
                                <td>
                                    {{ $application->type->name ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Application::GENDER_RADIO[$application->gender] ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Application::CDF_APPLIED_RADIO[$application->cdf_applied] ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Application::COUNTY_APPLIED_RADIO[$application->county_applied] ?? '' }}
                                </td>
                                <td>
                                    @if($application->fathers_identity_card)
                                        <a href="{{ $application->fathers_identity_card->getUrl() }}" target="_blank">
                                            {{ trans('global.view_file') }}
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    @if($application->attach_student_grade)
                                        <a href="{{ $application->attach_student_grade->getUrl() }}" target="_blank">
                                            {{ trans('global.view_file') }}
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    @if($application->mothers_identity_card)
                                        <a href="{{ $application->mothers_identity_card->getUrl() }}" target="_blank">
                                            {{ trans('global.view_file') }}
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    @if($application->fees_structure)
                                        <a href="{{ $application->fees_structure->getUrl() }}" target="_blank">
                                            {{ trans('global.view_file') }}
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    @if($application->fee_balance_attach)
                                        <a href="{{ $application->fee_balance_attach->getUrl() }}" target="_blank">
                                            {{ trans('global.view_file') }}
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    @if($application->attach_voter_card)
                                        <a href="{{ $application->attach_voter_card->getUrl() }}" target="_blank">
                                            {{ trans('global.view_file') }}
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    {{ $application->course->name ?? '' }}
                                </td>
                                <td>
                                    {{ $application->application_no ?? '' }}
                                </td>
                                <td>
                                    @if($application->upload_application_form)
                                        <a href="{{ $application->upload_application_form->getUrl() }}" target="_blank">
                                            {{ trans('global.view_file') }}
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    @can('application_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.applications.show', $application->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('application_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.applications.edit', $application->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('application_delete')
                                        <form action="{{ route('admin.applications.destroy', $application->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                        </form>
                                    @endcan

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('application_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.applications.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'asc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-wardApplications:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection