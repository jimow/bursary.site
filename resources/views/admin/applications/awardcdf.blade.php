@extends('layouts.admin')
@section('content')
<div class="container">
  <div class="form-group col-md-4">
    <label  for="amount">{{ trans('cruds.application.fields.fee_balance') }}</label>
    <input class="form-control" type="number" name="amount" id="amount" value="" step="0.01" required>
  </div>
    <br />
    <h3 >CDF AWARD FORM</h3>
    <br />
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><b>{{$cons}} Constituency Application List</b></h3>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <form method="POST" action="{{ route("admin.applications.update_cdf") }}" enctype="multipart/form-data">
      
          @csrf
          <table id="editable" class="table table-bordered table-striped">
            <thead>
              <tr class="bg bg-primary">
         
                <th>ID</th>
                <th>Full Names</th>
                <th>Institution</th>
                <th>Course </th>
                <th>Ward</th>
                <th>Sub County</th>
                <th>Amount Awarded</th>
                
              </tr>
            </thead>
            <tbody>
              @foreach($data as $row)
              <tr>
              
                <td>{{ $row->id }}</td>
                <td>{{ $row->first_name }} {{ $row->last_name}}</td>
                <td>{{ $row->institution}}</td>
                <td>{{$row->course->name }}</td>
                <td>{{ $row->ward->name }}</td>
                <td>{{ $row->sub_county->name }}</td>
                <td>{{ $row->cdf_amount_awarded }}</td>
              
              </tr>
              @endforeach
            </tbody>
           
          </table>
        </div>
      </form>
      </div>
    </div>
  </div>
  @endsection
@section('scripts')
  <script type="text/javascript">
    $(document).ready(function(){
       
      $.ajaxSetup({
        headers:{
          'X-CSRF-Token' : $("input[name=_token]").val()
        }
      });
    
      $('#editable').Tabledit({
        url:'{{ route("admin.applications.update_cdf") }}',
        dataType:"json",
        columns:{
          identifier:[0, 'id'],
          editable:[[6, 'cdf_amount_awarded']]
        },
      
        restoreButton:false,
        onSuccess:function(data, textStatus, jqXHR)
        {
          if(data.action == 'delete')
          {
            alert("Not Allowed");
          }
        }
      });
    
    });
    </script>
@endsection
  