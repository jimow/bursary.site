<?php

namespace App\Http\Controllers\Admin;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use App\Models\Application;
use App\Models\Course;
use App\Models\FinancialYear;
use App\Models\Institution;
use App\Models\SubCounty;
use App\Models\User;
use App\Models\Ward;
use Gate;
use DB;
use Illuminate\Support\Facades\Auth;

class HomeController
{
    public function index()
    {
    
        $id = Auth::id();
       

        $s_counties = SubCounty::all();
       
    
        $roles = Auth::user()->roles()->get();
        $title = "";//$role->title;
        foreach($roles as $role) {
            $title = $role->title;
        }
        
        $count_s = 0;
        $count_w = 0;
        $count_award_s = 0;
         $count_award_w = 0; //Count variable for amount awarded to Wards 
        $count_award_c = 0;
        $count_app_c = 0;
        $count_app_g = 0;
      
       foreach($s_counties as $s_county) {
        if ($title == $s_county->name or $title == $s_county->name. " MP") {
          $id = $s_county->id;
          $name =  Application::groupBy('ward_id')
          ->selectRaw('count(*) as total, ward_id')
          ->where('sub_county_id','=', $s_county->id)
          ->where('cdf_applied','=',1)
          ->get();
          $amount_awarded = Application::groupBy('ward_id')
            ->selectRaw('SUM(cdf_amount_awarded) AS sum, ward_id')
            ->where('sub_county_id','=',$id)
            ->where('cdf_applied','=',1)
            ->get();
          $course_amount = Application::groupBy('course_id')
            ->selectRaw('SUM(cdf_amount_awarded) AS course_sum, course_id')
            ->where('sub_county_id','=', $id)
            ->where('cdf_applied','=',1)
            ->get();
          $amount_awarded_per_ward = Application::groupBy('ward_id')
            ->selectRaw('SUM(cdf_amount_awarded) AS sum, ward_id')
            ->where('sub_county_id','=', $id)
            ->where('cdf_applied','=',1)
            ->get();
          $amount_awarded_per_course = Application::groupBy('course_id')
            ->selectRaw('SUM(cdf_amount_awarded) AS sum, course_id')
            ->where('sub_county_id','=', $id)
            ->where('cdf_applied','=',1)
            ->get();
          $application_per_course = Application::groupBy('course_id')
            ->selectRaw('count(*) AS total_course, course_id')
            ->where('sub_county_id','=', $id)
            ->where('cdf_applied','=',1)
            ->get();
          $application_per_gender = Application::groupBy('gender')
            ->selectRaw('count(*) AS total_gender, gender')
            ->where('sub_county_id','=', $id)
            ->where('cdf_applied','=',1)
            ->get();
          $ward_name = Application::groupBy('ward_id')
            ->selectRaw('count(*) as total, ward_id')
            ->where('sub_county_id','=', $id)
            ->where('cdf_applied','=',1)
            ->get();
            $sc = $s_county->name;
             
             if ($title == $s_county->name) {
              $mp = '';
             }
             else {
              $mp = " MP";
             }

             return view('cdfdashboard',compact('mp','ward_name','application_per_gender','count_app_g','application_per_course','count_app_c','amount_awarded_per_course','count_award_c','count_award_s','count_award_w','amount_awarded_per_ward','name','amount_awarded','sc','count_s','count_w'));
         
        
        }
       
       
       }
       $wards = Ward::all();
       
       foreach($wards as $wa) {
        if ($title == $wa->name) {
         
        
          $id = $wa->id;
         
          $name =  Application::groupBy('ward_id')
          ->selectRaw('count(*) as total, ward_id')
          ->where('ward_id','=', $id)
          ->where('county_applied','=',1)
          ->get();
          $amount_awarded = Application::groupBy('ward_id')
            ->selectRaw('SUM(county_amount_awarded) AS sum, ward_id')
            ->where('ward_id','=',$id)
            ->where('county_applied','=',1)
            ->get();
       
          
          $amount_awarded_per_course = Application::groupBy('course_id')
            ->selectRaw('SUM(county_amount_awarded) AS sum, course_id')
            ->where('ward_id','=', $id)
            ->where('county_applied','=',1)
            ->get();
          $amount_awarded_per_gender = Application::groupBy('gender')
            ->selectRaw('SUM(county_amount_awarded) AS sum, gender')
            ->where('ward_id','=', $id)
            ->where('county_applied','=',1)
            ->get();
          $application_per_course = Application::groupBy('course_id')
            ->selectRaw('count(*) AS total_course, course_id')
            ->where('ward_id','=', $id)
            ->where('county_applied','=',1)
            ->get();
          $application_per_gender = Application::groupBy('gender')
            ->selectRaw('count(*) AS total_gender, gender')
            ->where('ward_id','=', $id)
            ->where('county_applied','=',1)
            ->get();
         
            $ward_name = $wa->name;
            $c_g = 0;
        return view('countydashboard',compact('ward_name','c_g','count_app_g','count_app_c','count_award_c','count_award_s','count_award_w','name','count_s','count_w','application_per_gender','application_per_course','amount_awarded_per_course','amount_awarded_per_gender'));
        }
   
       
     
        
       }
       if ($title == "Lafey Ward") {
           $id = 14;
         
          $name =  Application::groupBy('ward_id')
          ->selectRaw('count(*) as total, ward_id')
          ->where('ward_id','=', $id)
          ->where('county_applied','=',1)
          ->get();
          $amount_awarded = Application::groupBy('ward_id')
            ->selectRaw('SUM(county_amount_awarded) AS sum, ward_id')
            ->where('ward_id','=',$id)
            ->where('county_applied','=',1)
            ->get();
       
          
          $amount_awarded_per_course = Application::groupBy('course_id')
            ->selectRaw('SUM(county_amount_awarded) AS sum, course_id')
            ->where('ward_id','=', $id)
            ->where('county_applied','=',1)
            ->get();
          $amount_awarded_per_gender = Application::groupBy('gender')
            ->selectRaw('SUM(county_amount_awarded) AS sum, gender')
            ->where('ward_id','=', $id)
            ->where('county_applied','=',1)
            ->get();
          $application_per_course = Application::groupBy('course_id')
            ->selectRaw('count(*) AS total_course, course_id')
            ->where('ward_id','=', $id)
            ->where('county_applied','=',1)
            ->get();
          $application_per_gender = Application::groupBy('gender')
            ->selectRaw('count(*) AS total_gender, gender')
            ->where('ward_id','=', $id)
            ->where('county_applied','=',1)
            ->get();
         
            $ward_name = "Lafey Ward";
            $c_g = 0;
        return view('countydashboard',compact('ward_name','c_g','count_app_g','count_app_c','count_award_c','count_award_s','count_award_w','name','count_s','count_w','application_per_gender','application_per_course','amount_awarded_per_course','amount_awarded_per_gender'));
        }

        if ($title == "Banissa Ward") {
          $id = 22;
        
         $name =  Application::groupBy('ward_id')
         ->selectRaw('count(*) as total, ward_id')
         ->where('ward_id','=', $id)
         ->where('county_applied','=',1)
         ->get();
         $amount_awarded = Application::groupBy('ward_id')
           ->selectRaw('SUM(county_amount_awarded) AS sum, ward_id')
           ->where('ward_id','=',$id)
           ->where('county_applied','=',1)
           ->get();
      
         
         $amount_awarded_per_course = Application::groupBy('course_id')
           ->selectRaw('SUM(county_amount_awarded) AS sum, course_id')
           ->where('ward_id','=', $id)
           ->where('county_applied','=',1)
           ->get();
         $amount_awarded_per_gender = Application::groupBy('gender')
           ->selectRaw('SUM(county_amount_awarded) AS sum, gender')
           ->where('ward_id','=', $id)
           ->where('county_applied','=',1)
           ->get();
         $application_per_course = Application::groupBy('course_id')
           ->selectRaw('count(*) AS total_course, course_id')
           ->where('ward_id','=', $id)
           ->where('county_applied','=',1)
           ->get();
         $application_per_gender = Application::groupBy('gender')
           ->selectRaw('count(*) AS total_gender, gender')
           ->where('ward_id','=', $id)
           ->where('county_applied','=',1)
           ->get();
        
           $ward_name = "Banissa Ward";
           $c_g = 0;
       return view('countydashboard',compact('ward_name','c_g','count_app_g','count_app_c','count_award_c','count_award_s','count_award_w','name','count_s','count_w','application_per_gender','application_per_course','amount_awarded_per_course','amount_awarded_per_gender'));
       }
       if ($title == 'Admin') {
        $name =  Application::groupBy('ward_id')
          ->selectRaw('count(*) as total, ward_id')
        
          ->get();
          $ward = Application::groupBy('ward_id')
          ->selectRaw('count(*) as total, ward_id')
          ->get();
          $sub = Application::groupBy('sub_county_id')
          ->selectRaw('count(*) as total, sub_county_id')
            ->get();
            $s = "All Sub Counties";
          $amount_awarded = Application::groupBy('sub_county_id')
          ->select([DB::raw("SUM(cdf_amount_awarded) as cdf, sub_county_id"), DB::raw("SUM(county_amount_awarded) as county")])
           
              ->get();

          $amount_awarded_per_ward = Application::groupBy('ward_id')
            //->selectRaw('SUM(cdf_amount_awarded) AS sum, ward_id')
            ->select([DB::raw("SUM(cdf_amount_awarded) as sum, ward_id"), DB::raw("SUM(county_amount_awarded) as county,ward_id")])
           
        
            ->get();
          $amount_awarded_per_course = Application::groupBy('course_id')
             ->select([DB::raw("SUM(cdf_amount_awarded) as sum, course_id"), DB::raw("SUM(county_amount_awarded) as county,course_id")])
         
          
            ->get();
          $application_per_course = Application::groupBy('course_id')
            ->selectRaw('count(*) AS total_course, course_id')
        
            ->get();
            $application_per_gender = Application::groupBy('gender')
            ->selectRaw('count(*) AS total_gender, gender')
        
            ->get();
      
         
          $sc = "Mandera County";
         
          return view('home',compact('ward','application_per_gender','count_app_g','application_per_course','count_app_c','amount_awarded_per_course','count_award_c','count_award_s','count_award_w','amount_awarded_per_ward','name','amount_awarded','sc','count_s','count_w','sub'));
          

           }
       if ($title == 'User') {
        $data= Application::with(['ward', 'sub_county'])
        ->where('user_id','=',$id)
         ->get();
       return view('home2',compact('data'));
     
       }

       $count_s = 0;
       $count_w = 0;
       $count_award_s = 0;
       $s_cdf_award = 0;   //Count variable for amount awarded to Constituencies
       $count_award_w = 0; //Count variable for amount awarded to Wards 
       $count_award_c = 0;
       $count_app_c = 0;
       $count_app_g = 0;        
       

    
       // return view($view,compact('ward_name','sc','application_per_gender','count_app_g','application_per_course','count_app_c','amount_awarded_per_course','count_award_c','count_award_s','count_award_w','amount_awarded_per_ward','name','amount_awarded','ward','sub','count_s','count_w'));
      
      }
}

