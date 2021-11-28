<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role_name == 'Patient')
        {
        $current_time = (int) date('Hi');
            if(($current_time <= 1159) && ( Auth::user()->count_report != '1')){
                Toastr::warning('You need to send a Report for Morning','Warning');
            }
            elseif(($current_time >= 1200) && ($current_time <= 1659) && ( Auth::user()->count_report != '2')){
                Toastr::warning('You need to send a Report for Afternoon','Warning');
            }
            elseif(($current_time >= 1700) && ($current_time <= 2359) && ( Auth::user()->count_report != '3')){
                Toastr::warning('You need to send a Report for Evening','Warning');
            }
        }
        $staff = DB::table('staff')->count();
        $users = DB::table('users')->count();
        $user_activity_logs = DB::table('user_activity_logs')->count();
        $activity_logs = DB::table('activity_logs')->count();
        return view('home',compact('staff','users','user_activity_logs','activity_logs'));
    }
}
