@extends('layouts.admin')
@section('content')
@can('application_create')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-8">
            
                   
               
           @if ( check_if_applied_county($id) != 1 && check_if_applied_cdf($id) != 1 )
           <a class="btn btn-success" href="{{ route('admin.applications.create') }}">
           
           {{ trans('global.add') }} {{ trans('cruds.application.title_singular') }}
</a>
           @endif

           @if ( check_if_applied_county($id) != 1 && check_if_applied_cdf($id) == 1 )
           <form method="POST" action="{{ route('admin.applications.updatecounty') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{$id}}" name="userid">
            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    Apply for County Bursary
                </button>
            </div>   
           </form>
          
           @endif
           @if ( check_if_applied_cdf($id) != 1  && check_if_applied_county($id) == 1)
           <form method="POST" action="{{ route('admin.applications.updatecdf') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{$id}}" name="userid2">
            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    Apply for CDF Bursary
                </button>
            </div>   
           </form>   @endif
          

         </div>
         
    </div>
@endcan
{{ get_logged_in_role()}}
<div class="row">
    <div class="col-md-8"></div>
@can('can_cdf')
<div class="col-md-4">
    <a class="btn btn-success" href="{{ route('admin.applications.app_cdf') }}">
   Click Here to CDF Award Bursary
         </a>
 </div>
 @endcan
</div>
<div class="card">
    <div class="card-header">
        {{ trans('cruds.application.title_singular') }} {{ trans('global.list') }} : <b>{{$title}} Constituency</b>
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Application">
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
                <tr>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($users as $key => $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Application::DISABILITY_RADIO as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Application::RECEIVED_BURSARY_BEFORE_RADIO as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Application::BOTH_PARENTS_ALIVE_RADIO as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Application::RECOMMENDED_RADIO as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($wards as $key => $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Application::ON_SCHOLARSHIPS_SELECT as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($sub_counties as $key => $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Application::RECOMMENDED_FOR_COUNTY_RADIO as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($financial_years as $key => $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($institutions as $key => $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Application::GENDER_RADIO as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Application::CDF_APPLIED_RADIO as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Application::COUNTY_APPLIED_RADIO as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($courses as $key => $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {

  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('application_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.applications.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

    
    
  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.applications.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'user_name', name: 'user.name' },
{ data: 'user.name', name: 'user.name' },
{ data: 'user.email', name: 'user.email' },
{ data: 'first_name', name: 'first_name' },
{ data: 'last_name', name: 'last_name' },
{ data: 'other_names', name: 'other_names' },
{ data: 'location', name: 'location' },
{ data: 'sub_location', name: 'sub_location' },
{ data: 'tel_no', name: 'tel_no' },
{ data: 'village', name: 'village' },
{ data: 'institution', name: 'institution' },
{ data: 'admission_number', name: 'admission_number' },
{ data: 'form_year', name: 'form_year' },
{ data: 'disability', name: 'disability' },
{ data: 'specify_disability', name: 'specify_disability' },
{ data: 'received_bursary_before', name: 'received_bursary_before' },
{ data: 'both_parents_alive', name: 'both_parents_alive' },
{ data: 'fathers_name', name: 'fathers_name' },
{ data: 'fathers_occupation', name: 'fathers_occupation' },
{ data: 'mothers_name', name: 'mothers_name' },
{ data: 'mothers_occupation', name: 'mothers_occupation' },
{ data: 'fathers_tel_no', name: 'fathers_tel_no' },
{ data: 'mothers_tel_no', name: 'mothers_tel_no' },
{ data: 'total_fees_payable', name: 'total_fees_payable' },
{ data: 'fee_balance', name: 'fee_balance' },
{ data: 'student_grade', name: 'student_grade' },
{ data: 'recommended', name: 'recommended' },
{ data: 'ward_name', name: 'ward.name' },
{ data: 'on_scholarships', name: 'on_scholarships' },
{ data: 'sub_county_name', name: 'sub_county.name' },
{ data: 'voter_card', name: 'voter_card' },
{ data: 'cdf_amount_awarded', name: 'cdf_amount_awarded' },
{data: 'county_amount_awarded', name: 'county_amount_awarded'},
{ data: 'recommended_for_county', name: 'recommended_for_county' }  ,
{ data: 'financial_year_name', name: 'financial_year.name' },
{ data: 'type_name', name: 'type.name' },
{ data: 'gender', name: 'gender' },
{ data: 'cdf_applied', name: 'cdf_applied' },
{ data: 'county_applied', name: 'county_applied' },
{ data: 'fathers_identity_card', name: 'fathers_identity_card', sortable: false, searchable: false },
{ data: 'attach_student_grade', name: 'attach_student_grade', sortable: false, searchable: false },
{ data: 'mothers_identity_card', name: 'mothers_identity_card', sortable: false, searchable: false },
{ data: 'fees_structure', name: 'fees_structure', sortable: false, searchable: false },
{ data: 'fee_balance_attach', name: 'fee_balance_attach', sortable: false, searchable: false },
{ data: 'attach_voter_card', name: 'attach_voter_card', sortable: false, searchable: false },
{ data: 'course_name', name: 'course.name' },
{ data: 'application_no', name: 'application_no' },
{ data: 'upload_application_form', name: 'upload_application_form', sortable: false, searchable: false },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],

   "columnDefs": [
    { "visible": false, "targets": [34,35,40] }
  ],


    orderCellsTop: true,
    order: [[ 1, 'asc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Application').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
});

</script>

@endsection