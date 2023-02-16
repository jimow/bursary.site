<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;

class UserVerificationController extends Controller
{
    public function approve($token)
    {
       $user = User::where(id, 2)->first();
        abort_if(!$user, 404);

        $user->verified           = 1;
         $user->verified_at        = Carbon::now()->format(config('panel.date_format') . ' ' . config('panel.time_format'));
        $user->verification_token = null;
        $user->save();

        return view('login')->with('message', trans('global.emailVerificationSuccess'));
    }
}
