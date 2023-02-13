@extends('layouts.admin')
@section('content')

  <div class="row">
    <div class="col-md-5">
      
   <form method="POST" action="{{ route('admin.applications.updatebalance') }}" enctype="multipart/form-data">
    @csrf
      <label  for="amount" class="text-primary"><h3>Allocations:</h3></label>
     <b> {{ number_format(get_ward_allocation(get_ward_id()))}}</b>
     &nbsp;&nbsp;&nbsp;&nbsp;<label  for="amount" class="text-primary"><b>Balance</b></label>
     <b> {{ number_format(get_ward_allocation(get_ward_id()))}}</b>
    
    </div>
    <div class="col-md-2"></div>
    <div class="col-md-4">
      <input type="hidden" name="ward_id" id="ward_id" value="{{get_ward_id()}}">
         <input type="text" name="amount" id="amount" value="" step="0.01" required>
  
    
    
      <button class="btn btn-success" type="submit">
        Allocate Funds
    </button>

</form>
    </div>
  </div>

    <br />
    <h3 >CDF AWARD FORM</h3>
    <br />
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><b>{{$cons}}</b> Application List</h3>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <form method="POST" action="{{ route("admin.applications.updatecounty") }}" enctype="multipart/form-data">
      
          @csrf
          <table id="editable" class="table table-bordered table-striped">
            <thead>
              <tr>
                <td colspan="7"><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name"></td>
              </tr>
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
                <td style="text-align: right">{{ $row->county_amount_awarded }}</td>
              @php
                $ward_sum_counter += $row->county_amount_awarded;  
              @endphp
              
              </tr>
              @endforeach
              <tr class="bg bg-primary">
                <td colspan="6" style="text-align: right">Total Allocation</td>
                <td style="text-align: right"><b>{{ number_format($ward_sum_counter) }}.00</b></td>
              </tr>
            </tbody>
           
          </table>
        </div>
      </form>
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
          //check if the amount is enough

          location.reload();
          if(data.action == 'delete')
          {
            alert("Not Allowed");
          }
        }
      });

    
    
    });

    
    </script>
@endsection
  