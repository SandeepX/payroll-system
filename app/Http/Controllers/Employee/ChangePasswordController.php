<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use App\Models\User;
use App\Models\LogActivity;

use Auth;


class ChangePasswordController extends Controller
{
    
	  public function __construct()
    {
        $this->middleware('auth');
    }
   

    public function index()
    {

        return view('employee.setting.changepassword');
    } 


    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        $status = User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        if($status){
        	request()->session()->flash('success','password changed successfully');
            \LogActivity::addToLog('Employee changed password');
        }else{
        	request()->session()->flash('error','password not changed');
            \LogActivity::addToLog('Employee tried to change the password');
        }

        return redirect()->back();
        
    }
   

}
