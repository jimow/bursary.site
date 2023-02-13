<?php
use App\Models\Application;
use App\Models\FinancialYear;
use App\Models\Ward;
function test() {

    echo "This is my helper function";
}

function check_if_applied_cdf($id) {

    $app = Application::where('user_id','=', $id)
    ->where('cdf_applied','=', 1)
    ->count();

   if ($app >= 1) {
    return true;
   }
}
function get_ward_id() {
    $rol = get_logged_in_role();
    $app = Ward::where('name','=', $rol)
    
    ->get();
    $wid = '';
    foreach($app as $ap) {
        $wid = $ap->id;
    }
    if ($rol == "Lafey Ward") {
        $wid = 14;
    }
    if ($rol == "Banissa Ward") {
        $wid = 22;
    }
    return $wid;

}
function check_if_system_is_open() {
    $fy = config('global.settings.fy');

    $sys = FinancialYear::where('name',$fy)->get();

   $open_date = '';// $sys->openning_date;
    foreach($sys as $sy) {
        $open_date = $sy->openning_date;
    }
   //$today = date("Y-m-d h:m:s");
   $today = date("Y-m-d H:i:s");
  if ($open_date < $today) {
   return true. " " .$open_date . " " .$today ;
  }
  else {
    return false;
  }
}
    
function get_logged_in_role () {
    $roles = Auth::user()->roles()->get();
        $title = "";//$role->title;
        foreach($roles as $role) {
            $title = $role->title;
        }
    return $title;
}
function get_logged_in_name () {
    $roles = Auth::user()->roles()->get();
        $title = "";//$role->title;
        foreach($roles as $role) {
            $title = $role->name;
        }
    return $title;
}
function result() {
    return 1;
}
function get_if_county_or_cdf() {
    $types = Auth::user()->roles()->get();
    $ty = "";//$role->title;
    foreach($types as $type) {
        $ty = $type->type;
    }
    return $ty;
}
function get_ward_allocation($id) {
    $wa = Ward::where('id','=',$id)->get(); //find($id)->get();
   $am = 10;
    foreach ($wa as $w) {
        $am = $w->amount;
    }
    return $am;
}
function check_if_applied_county($id) {
    $app = Application::where('user_id','=', $id)
    ->where('county_applied','=', 1)
    ->count();

   if ($app >= 1) {
    return true;
   }
}
?>