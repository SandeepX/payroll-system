<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Attendence;
use App\Models\Notice;
use App\Models\Quote;
use App\Models\LogActivity;
use Carbon\Carbon;

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

    
    public function index()
    {
       return redirect()->route(auth()->user()->role);
    }

    public function admin()
    {
        $countEmployee = count( Employee::where('status','active')->get());
        $countDepartment = count(Department::all());
        $countEmployeePresent = count(Attendence::where('status','present')->where('date',Carbon::today())->get() );
        $countEmployeeAbsent = count( Attendence::where('status','absent')->where('date',carbon::today())->get() );
        $logActivity = LogActivity::latest('created_at')->take(20)->get();
        
        return view('admin.dashboard')
            ->with('countEmployee',$countEmployee)
            ->with('countDepartment',$countDepartment)
            ->with('countEmployeeAbsent', $countEmployeeAbsent)
            ->with('countEmployeePresent', $countEmployeePresent);
    }

    public function employee()
    {

        $notice = Notice::latest('created_at')->take(20)->get();
        //dd($notice);
        $quote = Quote::whereDay('created_at',now()->day)->get();
        //dd($quote);
        return view('employee.dashboard')
        ->with('notice',$notice)
        ->with('quote',$quote);
    }


   

 }
