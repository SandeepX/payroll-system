<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;

use App\Models\Attendence;
use Illuminate\Http\Request;
use App\Models\LogActivity;
use Carbon\Carbon;
use Auth;

class AttendenceController extends Controller
{
    protected $attendence = null;
    public function __construct(Attendence $attendence){
        $this->attendence = $attendence;
    }
    
    
    public function index()
    {
        return view('employee.Attendence.report');
    }


    public function intime(Request $request)
    {
       
        $attendencedata = Attendence::where('Employeename', Auth::user()->name)
                ->whereDate('date', Carbon::today())
                ->whereNotNull('intime')
                ->get();
        
        if (count($attendencedata) > 0)
        {
            return response()->json(['status'=>false, 'data'=>'working time already started for today ', 'msg'=>null]);
        }

        $data['intime'] = date("H:i:s", strtotime($request->intime));
        $data['date'] = date("Y-m-d", strtotime($request->date));
        $data['AttendenceBy']= Auth::user()->name;
        $data['status'] = 'present';
        $data['Employeename'] = Auth::user()->name;
    
        $this->attendence->fill($data);
        $status = $this->attendence->save();
        if($status){
            \LogActivity::addToLog('started working time');
            return response()->json(['status'=>false, 'data'=>'started working Time ', 'msg'=>null]);
        
            
        }else{

             \LogActivity::addToLog('tried to start working time');
            return response()->json(['status'=>false, 'data'=>'null', 'msg'=>'Working time not started']);
        
            


        }
        

        
    }

    public function update(Request $request ,Attendence $attendence)
    {
        //dd($request->outtime);
        
        $Updateattendence = Attendence::where('Employeename', Auth::user()->name)
            ->WhereDate('date', Carbon::today())
            ->whereNotNull('intime')
            ->whereNull('outtime')
            ->first();

            
            if ($Updateattendence)
            {
                
                $data['outtime'] = date("H:i:s", strtotime($request->outime));

                $Updateattendence->fill($data);
                $status = $Updateattendence->save();

                if($status)
                {
                     \LogActivity::addToLog('Working time stopped');
                    return response()->json(['status'=>false, 'data'=>'Employee working stop time added ', 'msg'=>null]);
                   

                }else{
                     \LogActivity::addToLog('tried to enter stop time');
                    return response()->json(['status'=>false, 'data'=>'null', 'msg'=>'working time not stopped']);

                   
                }
            }
            return response()->json(['data'=>'working time not started or working time already stopped']);
        
    }

    

   

    
}
