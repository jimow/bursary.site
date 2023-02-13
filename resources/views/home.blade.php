@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Administrator's Dashboard 
</div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
              
                    <div class="row">
<div class="col-md-6">

<table class="table">

<tr class="bg-success">
<th colspan="2"> <h3>Application Per Sub County - All Sub Counties</h3></th>
</tr>

@foreach ($sub as $su) 


<tr>
<td class="bg-info">{{ $su->sub_county->name }}</td>
<td class="bg-primary text-right">{{ $su->total }}</td>
@php

$count_s += $su->total
@endphp

</tr>
@endforeach
<tr>

<td class="bg-success text-right"><h4> Total Application</h4></td>
<td class="bg-success text-right"><h4>{{ $count_s }}</h4></td>
</tr>



</table>


</div>
<div class="col-md-6" >
<canvas id="myChart2" style="width:400;max-width:400px"></canvas>


</div>
</div>
<!-- Amount Awarded as per subcounty -->
<div class="row">
  <div class="col-md-6">
  
  <table class="table">
  
  <tr class="bg-success">
  <th colspan="2"> <h3>Amount Awarded Per Sub County</h3></th>
  </tr>
  
  @foreach ($amount_awarded as $am_s) 
  
  
  <tr>
  <td class="bg-info">{{ $am_s->sub_county->name }}</td>
  <td class="bg-primary text-right">{{ number_format($am_s->cdf + $am_s->county) }}</td>
  @php
  

  $count_award_s += $am_s->cdf + $am_s->county;
  @endphp
  
  </tr>
  @endforeach
  <tr>
  
  <td class="bg-success text-right"><h4> Total Amount Awarded</h4></td>
  <td class="bg-success text-right"><h4>{{ number_format($count_award_s) }}</h4></td>
  </tr>
  
  
  
  </table>
  
  
  </div>
  <div class="col-md-6" >
  <canvas id="amount_awarded_sub" style="width:400;max-width:400px"></canvas>
  
  
  </div>
  </div>
  <!-- Amount Awarded as per Cours -->
<div class="row">
  <div class="col-md-6">
  
  <table class="table">
  
  <tr class="bg-success">
  <th colspan="2"> <h3>Amount Awarded Per Ward</h3></th>
  </tr>
  
  @foreach ($amount_awarded_per_ward as $am_w) 
  
  
  <tr>
  <td class="bg-info">{{ $am_w->ward->name }}</td>
  <td class="bg-primary text-right">{{ number_format($am_w->sum + $am_w->county) }}</td>
  @php
  

  $count_award_w += $am_w->sum + $am_w->county;
  @endphp
  
  </tr>
  @endforeach
  <tr>
  
  <td class="bg-success text-right"><h4> Total Amount Awarded</h4></td>
  <td class="bg-success text-right"><h4>{{ number_format($count_award_w) }}</h4></td>
  </tr>
  
  
  
  </table>
  
  
  </div>
  <div class="col-md-6" >
  <canvas id="amount_awarded_ward" style="width:500;max-width:500px"></canvas>
  
  
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
  <td class="bg-info">{{ $am_c->course->name ?? 'none'}}</td>
  <td class="bg-primary text-right">{{ number_format($am_c->sum + $am_c->county) }}</td>
  @php
  

  $count_award_c += $am_c->sum + $am_c->county;
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
  <th colspan="2"> <h3>Application As Per Courses</h3></th>
  </tr>
  
  @foreach ($application_per_course as $ap_c) 
  
  
  <tr>
  <td class="bg-info">{{ $ap_c->course->name ?? "None" }}</td>
  <td class="bg-primary text-right">{{ number_format($ap_c->total_course) }}</td>
  @php
  

  $count_app_c += $ap_c->total_course;
  @endphp
  
  </tr>
  @endforeach
  <tr>
  
  <td class="bg-success text-right"><h4> Total Amount Awarded</h4></td>
  <td class="bg-success text-right"><h4>{{ $count_app_c }}</h4></td>
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
<!-- APPLICATION PER WARD -->
<div class="row">
  <div class="col-md-6">
  
  <table class="table">
  
  <tr class="bg-success">
  <th colspan="2"> <h3>Application Per Ward</h3></th>
  </tr>
  
  @foreach ($ward as $wa) 
  
  
  <tr>
  <td class="bg-info">{{ $wa->ward->name }}</td>
  <td class="bg-primary text-right">{{ $wa->total }}</td>
  @php
  $count_w += $wa->total
  @endphp
  
  </tr>
  @endforeach
  <tr>
  
  <td class="bg-success text-right"><h4> Total Application</h4></td>
  <td class="bg-success text-right"><h4>{{ $count_w }}</h4></td>
  </tr>
  
  
  
  </table>
  
  
  </div>
  <div class="col-md-6" >
  <canvas id="ward" style="width:500;max-width:500px"></canvas>
  
  
  </div>
  </div>

                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<script>
const barColors = [
  "#b91d47",
  "#00aba9",
  "#1e7145",
  "#eecc99",
  "#eabcde",
  "#b1b1b1",
  "#3b3b3b",
  "#4d45d3",
  "#3322dd",
  "#eecc99",
  "#eabcde",
  "#b144ee",
  "#4ee4ee",
  "#4d6666",
  "#334422",
  "#887788",
  "#cb2121"
];




const sub =  {{ Js::from($sub) }};


const total_sub = sub.map(function(i) {
  return i.total;
});
const sub_name = sub.map(function(z) {
 return z.sub_county.name;
});



const xValues = sub_name;
const yValues = total_sub;



new Chart("myChart2", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Applications per ward"
    }
  }
});

const ward =  {{ Js::from($ward) }};


let total_w = ward.map(function(i) {
  return i.total;
});
let ward_name = ward.map(function(z) {
 return z.ward.name;
});


var xwValues = ward_name;
var ywValues = total_w;




new Chart("ward", {
  type: "pie",
  data: {
    labels: xwValues,
    datasets: [{
      backgroundColor: barColors,
      data: ywValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Applications as per wards"
    }
  }
});
const course_app =  {{ Js::from($application_per_course) }};


const total_course = course_app.map(function(i) {
  return i.total_course;
});
const course_name = course_app.map(function(z) {
 return z.course.name;
});


var xcValues = course_name;
var ycValues = total_course;




new Chart("course_app", {
  type: "pie",
  data: {
    labels: xcValues,
    datasets: [{
      backgroundColor: barColors,
      data: ycValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Applications as per Courses"
    }
  }
});
const gender =  {{ Js::from($application_per_gender) }};


let total_gender = gender.map(function(i) {
  return i.total_gender;
});
let gender_name = gender.map(function(z) {
 return z.gender;
});


var xgValues = gender_name;
var ygValues = total_gender;




new Chart("gender", {
  type: "pie",
  data: {
    labels: xgValues,
    datasets: [{
      backgroundColor: barColors,
      data: ygValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Applications as per Gender"
    }
  }
});


const amount_awarded_per_course =  {{ Js::from($amount_awarded_per_course) }};


let total_award = amount_awarded_per_course.map(function(i) {
  return i.sum;
});

const course_name_award = amount_awarded_per_course.map(function(z) {
 return z.course.name;
});


const xcaValues = course_name_award;
const ycaValues = total_award;




new Chart("course_award", {
  type: "pie",
  data: {
    labels: xcaValues,
    datasets: [{
      backgroundColor: barColors,
      data: ycaValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Amount awarded as per Course"
    }
  }
});

const amount_awarded =  {{ Js::from($amount_awarded) }};


const sum_award = amount_awarded.map(function(i) {
  return i.cdf;
});
const subcounty = amount_awarded.map(function(z) {
 return z.sub_county.name;
});


const xsubValues = subcounty;
const ysubValues = sum_award;




new Chart("amount_awarded_sub", {
  type: "pie",
  data: {
    labels: xsubValues,
    datasets: [{
      backgroundColor: barColors,
      data: ysubValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Amount awarded as per Sub County"
    }
  }
});

const amount_awarded_w =  {{ Js::from($amount_awarded_per_ward) }};


const sum_award_w = amount_awarded_w.map(function(i) {
  return i.sum;
});
const ward_award = amount_awarded_w.map(function(z) {
 return z.ward.name;
});


const xwaValues = ward_award;
const ywaValues = sum_award_w;




new Chart("amount_awarded_ward", {
  type: "pie",
  data: {
    labels: xwaValues,
    datasets: [{
      backgroundColor: barColors,
      data: ywaValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Amount awarded as per Ward"
    }
  }
});
</script>
@endsection