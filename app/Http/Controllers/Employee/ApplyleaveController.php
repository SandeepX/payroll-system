<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;

use App\Models\Employeeleave;
use Illuminate\Http\Request;
use App\Models\leave;
use App\Models\LogActivity;
use Auth;

class ApplyleaveController extends Controller
{
    protected $employeeleave = null;
    public function __construct(Employeeleave $employeeleave){
        $this->employeeleave = $employeeleave;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Employeeleave::orderBy('created_at','desc')->paginate(10);
        //dd($data);
        return view('employee.Leave.manageleave')
            ->with('data', $data);
    }

    
    public function create()
    {
       // dd('hello');
        $leavedata = Leave::pluck('leavetype','id');
        
        return view('employee.leave.Applyleave')
            ->with('leavedata',$leavedata);
            
    }

   
    public function store(Request $request)
    {
       // dd(Auth::user()->id);
        //dd($request->all());
        $rules = $this->employeeleave->getRules();
        
       
        $request->validate($rules);
        

        $data = $request->all();
       

        $this->employeeleave->fill($data);
        $status = $this->employeeleave->save();
        if($status){
            $request->session()->flash('success','Leave request added successfully');
            \LogActivity::addToLog('leave requested');
        }else{
             $request->session()->flash('error','leave request unsuccessfull ');
             \LogActivity::addToLog('tried to request for leave');

        }
        return redirect()->route('Leavelist');
    }

    

   

    
}
