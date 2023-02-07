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
    return $wid;

}
function check_if_system_is_open() {
    $fy = config('global.settings.fy');

    $sys = FinancialYear::where('name',$fy)->get();

   $open_date = '';// $sys->openning_date;
    foreach($sys as $sy) {
        $open_date = $sy->openning_date;
    }
   $today = date("Y-m-d h:m:s");

   if ($today < $open_date) {
    return true;
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
function result() {
    return 1;
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