<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use App\Models\User;
use App\Models\Form;
use App\Rules\MatchOldPassword;
use Carbon\Carbon;
use Session;
use Auth;
use Hash;


class UserManagementController extends Controller
{
    public function index()
    {

        //Comment ni Pranssss
        //Comment Frank
        //Comment sa pinakagwapa 

        if (Auth::user()->role_name=='Admin')
        {
            $data = DB::table('users')->get();
            return view('usermanagement.user_control',compact('data'));
        }
        else if (Auth::user()->role_name=='BHW')
        {
            $data = DB::table('users')->where('role_name', '=', 'Patient')->where('status','=','Disable')->get();
            return view('usermanagement.pending_user_control',compact('data'));
        }
        else
        {
            return redirect()->route('home');
        }
        
    }

    //patient information
    public function index2()
    {
        if(Auth::user()->role_name=='BHW')
        {
            $data = DB::table('users')->where('role_name', '=', 'Patient')->where('status','=','Active')->get();
            return view('usermanagement.pending_user_control',compact('data'));
        }
        else
        {
            return redirect()->route('home');
        }
    }

    //patient sends report
    public function sendReport()
    {

        return view('patientmodule.sendreport');
    }

    //patient see contact hotlines
    public function contactHotlines()
    {

        return view('patientmodule.contacthotline');
    }

    //patient see temperature progress
    public function temperatureProgress()
    {

        return view('patientmodule.temperatureProgress');
    }

    //patient see consultations
    public function consultations()
    {

        return view('patientmodule.consultations');
    }

    //bhw pending accounts
    public function pendingaccounts(){
         if (Auth::user()->role_name=='BHW')
        {
            $data = DB::table('users')->where('role_name', '=', 'Patient')->where('status','=','Disable')->get();
            return view('bhwmodule.pending_user_control',compact('data'));
        }
        else
        {
            return redirect()->route('home');
        }
    }

    //bhw view details of pending accoutn
    public function viewPendingDetail($id)
    {  
        if(Auth::user()->role_name=='BHW')
        {
            $data = DB::table('users')->where('role_name', '=', 'Patient')->where('status','=','Active')->get();
            return view('bhwmodule.active_accounts',compact('data'));
        }
        else
        {
            return redirect()->route('home');
        }
    }

    //bhw view list of active accounts
    public function activeaccounts()
    {
        if(Auth::user()->role_name=='BHW')
        {
            $data = DB::table('users')->where('role_name', '=', 'Patient')->where('status','=','Active')->get();
            return view('bhwmodule.active_accounts',compact('data'));
        }
        else
        {
            return redirect()->route('home');
        }
    }


    //bhw can send report as a patient
    public function sendReportAccount()
    {
        if (Auth::user()->role_name=='BHW')
       {
           $data = DB::table('users')->where('role_name', '=', 'Patient')->where('status','=','Disable')->get();
           return view('bhwmodule.sendReport',compact('data'));
       }
       else
       {
           return redirect()->route('home');
       }
   }

   //bhw view list of patient under quarantine
   public function underQuarantine()
   {
       if(Auth::user()->role_name=='BHW')
       {
           $data = DB::table('users')->where('role_name', '=', 'Patient')->where('status','=','Active')->get();
           return view('bhwmodule.under_quarantine',compact('data'));
       }
       else
       {
           return redirect()->route('home');
       }
   }

   //bhw view list of patient done quarantine
   public function doneQuarantine()
   {
       if(Auth::user()->role_name=='BHW')
       {
           $data = DB::table('users')->where('role_name', '=', 'Patient')->where('status','=','Done')->get();
           return view('bhwmodule.done_quarantine',compact('data'));
       }
       else
       {
           return redirect()->route('home');
       }
   }


   //doctor see patient list
   public function patientList()
   {
       if(Auth::user()->role_name=='Doctor')
       {
           $data = DB::table('users')->where('role_name', '=', 'Patient')->where('status','=','Active')->get();
           return view('doctormodule.patient_list',compact('data'));
       }
       else
       {
           return redirect()->route('home');
       }
   }

   //doctor add medicine
   public function addMedicine()
   {
       if(Auth::user()->role_name=='Doctor')
       {
           return view('doctormodule.add_medicine');
       }
       else
       {
           return redirect()->route('home');
       }
   }

   //doctor view report list
   public function reportList()
   {
       if(Auth::user()->role_name=='Doctor')
       {
           return view('doctormodule.report_list');
       }
       else
       {
           return redirect()->route('home');
       }
   }

   //doctor view patient quarantine information
   public function quarantineInformation($id)
    {  
        if(Auth::user()->role_name=='Doctor')
        {
            $data = DB::table('users')->where('role_name', '=', 'Patient')->where('status','=','Active')->get();
            return view('doctormodule.quarantine_information',compact('data'));
        }
        else
        {
            return redirect()->route('home');
        }
    }



    // view detail 
    public function viewDetail($id)
    {  
        if (Auth::user()->role_name=='Admin')
        {
            $data = DB::table('users')->where('id',$id)->get();
            $roleName = DB::table('role_type_users')->get();
            $userStatus = DB::table('user_types')->get();
            return view('usermanagement.view_users',compact('data','roleName','userStatus'));
        }
        else if (Auth::user()->role_name=='BHW')
        {
            $data = DB::table('users')->where('id',$id)->get();
            $roleName = DB::table('role_type_users')->get();
            $userStatus = DB::table('user_types')->get();
            return view('usermanagement.view_users',compact('data','roleName','userStatus'));
        }
        else
        {
            return redirect()->route('home');
        }
    }
    // use activity log
    public function activityLog()
    {
        $activityLog = DB::table('user_activity_logs')->get();
        return view('usermanagement.user_activity_log',compact('activityLog'));
    }
    // activity log
    public function activityLogInLogOut()
    {
        $activityLog = DB::table('activity_logs')->get();
        return view('usermanagement.activity_log',compact('activityLog'));
    }

    // profile user
    public function profile()
    {
        return view('usermanagement.profile_user');
    }
   
    // add new user
    public function addNewUser()
    {
        return view('usermanagement.add_new_user');
    }

     // save new user
     public function addNewUserSave(Request $request)
     {

        $request->validate([
            'name'      => 'required|string|max:255',
            'image'     => 'required|image',
            'email'     => 'required|string|email|max:255|unique:users',
            'phone'     => 'required|min:11|numeric',
            'role_name' => 'required|string|max:255',
            'password'  => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $image = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $image);

        $user = new User;
        $user->name         = $request->name;
        $user->avatar       = $image;
        $user->email        = $request->email;
        $user->phone_number = $request->phone;
        $user->role_name    = $request->role_name;
        $user->password     = Hash::make($request->password);
 
        $user->save();

        Toastr::success('Create new account successfully :)','Success');
        return redirect()->route('userManagement');
    }
    
    // update
    public function update(Request $request)
    {
        $id           = $request->id;
        $fullName     = $request->fullName;
        $email        = $request->email;
        $phone_number = $request->phone_number;
        $status       = $request->status;
        $role_name    = $request->role_name;

        $dt       = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();
        
        $old_image = User::find($id);

        $image_name = $request->hidden_image;
        $image = $request->file('image');

        if($old_image->avatar=='photo_defaults.jpg')
        {
            if($image != '')
            {
                $image_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $image_name);
            }
        }
        else{
            
            if($image != '')
            {
                $image_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $image_name);
                unlink('images/'.$old_image->avatar);
            }
        }
        
        
        $update = [

            'id'           => $id,
            'name'         => $fullName,
            'avatar'       => $image_name,
            'email'        => $email,
            'phone_number' => $phone_number,
            'status'       => $status,
            'role_name'    => $role_name,
        ];

        $activityLog = [

            'user_name'    => $fullName,
            'email'        => $email,
            'phone_number' => $phone_number,
            'status'       => $status,
            'role_name'    => $role_name,
            'modify_user'  => 'Update',
            'date_time'    => $todayDate,
        ];

        DB::table('user_activity_logs')->insert($activityLog);
        User::where('id',$request->id)->update($update);
        Toastr::success('User updated successfully :)','Success');
        return redirect()->route('userManagement');
    }
    // delete
    public function delete($id)
    {
        $user = Auth::User();
        Session::put('user', $user);
        $user=Session::get('user');

        $fullName     = $user->name;
        $email        = $user->email;
        $phone_number = $user->phone_number;
        $status       = $user->status;
        $role_name    = $user->role_name;

        $dt       = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();

        $activityLog = [

            'user_name'    => $fullName,
            'email'        => $email,
            'phone_number' => $phone_number,
            'status'       => $status,
            'role_name'    => $role_name,
            'modify_user'  => 'Delete',
            'date_time'    => $todayDate,
        ];

        DB::table('user_activity_logs')->insert($activityLog);

        $delete = User::find($id);
        unlink('images/'.$delete->avatar);
        $delete->delete();
        Toastr::success('User deleted successfully :)','Success');
        return redirect()->route('userManagement');
    }

    // view change password
    public function changePasswordView()
    {
        return view('usermanagement.change_password');
    }
    
    // change password in db
    public function changePasswordDB(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        Toastr::success('User change successfully :)','Success');
        return redirect()->route('home');
    }
}









