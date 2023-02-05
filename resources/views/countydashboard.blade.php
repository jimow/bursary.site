@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Ward Manager's Dashboard  - <b>{{ $ward_name }}</b>
</div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
<!-- Application per course -->
<div class="row">
    <div class="col-md-6">
    
    <table class="table">
    
    <tr class="bg-success">
    <th colspan="2"> <h3>Application As Per Courses</h3></th>
    </tr>
    
    @foreach ($application_per_course as $ap_c) 
    
    
    <tr>
    <td class="bg-info">{{ $ap_c->course->name }}</td>
    <td class="bg-primary text-right">{{ number_format($ap_c->total_course) }}</td>
    @php
    
  
    $count_app_c += $ap_c->total_course;
    @endphp
    
    </tr>
    @endforeach
    <tr>
    
    <td class="bg-success text-right"><h4> Total Applications </h4></td>
    <td class="bg-success text-right"><h4>{{ $count_app_c }}</h4></td>
    </tr>
    
    
    
    </table>
    
    
    </div>
    <div class="col-md-6" >
    <canvas id="course_app" style="width:500;max-width:500px"></canvas>
    
    
    </div>
    </div>
   <!-- Amount Awarded as per Course -->
<div class="row">
    <div class="col-md-6">
    
    <table class="table">
    
    <tr class="bg-success">
    <th colspan="2"> <h3>Amount Awarded As Per Courses</h3></th>
    </tr>
    
    @foreach ($amount_awarded_per_course as $am_c) 
    
    
    <tr>
    <td class="bg-info">{{ $am_c->course->name }}</td>
    <td class="bg-primary text-right">{{ number_format($am_c->sum) }}</td>
    @php
    
  
    $count_award_c += $am_c->sum;
    @endphp
    
    </tr>
    @endforeach
    <tr>
    
    <td class="bg-success text-right"><h4> Total Amount Awarded</h4></td>
    <td class="bg-success text-right"><h4>{{ number_format($count_award_c) }}</h4></td>
    </tr>
    
    
    
    </table>
    
    
    </div>
    <div class="col-md-6" >
    <canvas id="course_award" style="width:500;max-width:500px"></canvas>
    
    
    </div>
    </div>
     <!-- Application per course -->
  <div class="row">
    <div class="col-md-6">
    
    <table class="table">
    
    <tr class="bg-success">
    <th colspan="2"> <h3>Amount Awarded As Per Gender</h3></th>
    </tr>
    
    @foreach ($amount_awarded_per_gender as $am_g) 
    
    
    <tr>
    <td class="bg-info">{{ $am_g->gender }}</td>
    <td class="bg-primary text-right">{{ number_format($am_g->sum) }}</td>
    @php
    
  
    $c_g += $am_g->sum;
    @endphp
    
    </tr>
    @endforeach
    <tr>
    
    <td class="bg-success text-right"><h4> Total Amount Awarded - Gender</h4></td>
    <td class="bg-success text-right"><h4>{{ $c_g }}</h4></td>
    </tr>
    
    
    
    </table>
    
    
    </div>
    <div class="col-md-6" >
    <canvas id="course_app" style="width:500;max-width:500px"></canvas>
    
    
    </div>
    </div>
       <!-- Application per Gender -->
  <div class="row">
    <div class="col-md-6">
    
    <table class="table">
    
    <tr class="bg-success">
    <th colspan="2"> <h3>Application As Per Gender</h3></th>
    </tr>
    
    @foreach ($application_per_gender as $ap_g) 
    
    
    <tr>
    <td class="bg-info">{{ $ap_g->gender }}</td>
    <td class="bg-primary text-right">{{ $ap_g->total_gender }}</td>
    @php
    
  
    $count_app_g += $ap_g->total_gender;
    @endphp
    
    </tr>
    @endforeach
    <tr>
    
    <td class="bg-success text-right"><h4> Total Applicants</h4></td>
    <td class="bg-success text-right"><h4>{{ number_format($count_app_g) }}</h4></td>
    </tr>
    
    
    
    </table>
    
    
    </div>
    <div class="col-md-6" >
    <canvas id="gender" style="width:300;max-width:300px"></canvas>
    
    
    </div>
    </div>
   
@endsection