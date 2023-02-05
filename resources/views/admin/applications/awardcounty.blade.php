@extends('layouts.admin')
@section('content')
<div class="container">
    <br />
    <h3 >CDF AWARD FORM</h3>
    <br />
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><b>{{$cons}} Ward Application List</b></h3>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <form method="POST" action="{{ route("admin.applications.updatecounty") }}" enctype="multipart/form-data">
      
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
                <td>{{ $row->county_amount_awarded }}</td>
                @php
                $ward_sum_counter += $row->county_amount_awarded; 
                @endphp
              </tr>
              @endforeach
              {{$ward_sum_counter}}
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
        url:'{{ route("admin.applications.updatecounty") }}',
        dataType:"json",
        columns:{
          identifier:[0, 'id'],
          editable:[[6, 'county_amount_awarded']]
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
  