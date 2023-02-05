@extends('layouts.admin')
@section('content')
<div class="content">

<h4>Welcome to User Dashboard</h4>
@if (isset($data))
@foreach($data as $app)
<div class="row">
    <div class="col-md-12">
    
    <table class="table">
    
   
    
  <tr>
    <th colspan="4" class="bg-info">Application Status</th> 
    
  </tr>
    <tr>
    <td >Full Names</td>
    <td><b>{{ $app->first_name}} {{ $app->last_name }}</b></td>
    <td>Tel No</td>
    <td><b>{{ $app->tel_no}}</b></td>
    
    </tr>
    <tr>
        <td >Institution Name</td>
        <td><b>{{ $app->institution}}</b></td>
        <td>Course </td>
        <td><b>{{ $app->course->name}}</b></td>
        
        </tr>
    <tr>
        <td >Ward</td>
        <td><b>{{ $app->ward->name}}</b></td>
        <td>Sub County</td>
        <td><b>{{ $app->sub_county->name}}<b></td>
        
    </tr>
    <tr>
        <td >Applied For CDF</td>
        <td>@if ($app->cdf_applied == 1) <b>Yes</b> @else <b>No</b> @endif</b></td>
        <td>Applied for County Bursary</td>
        <td>@if ($app->county_applied == 1) <b>Yes</b> @else <b>No</b> @endif</td>
        
    </tr>
    <tr>
        <td >CDF Amount Awarded</td>
        <td><b>{{ $app->cdf_amount_awarded}}</b></td>
        <td>County Bursary Amount Awarded</td>
        <td><b>{{ $app->county_amount_awarded}}</b></td>
        
    </tr>
    <tr>
        <th colspan="4" class="bg-info">&nbsp</th> 
        
      </tr>
    </table>
    
    
    </div>
    </div>
    @endforeach
    @endif

</div>
@endsection