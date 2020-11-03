<?php

namespace App\Http\Controllers;

use App\Models\Attendence;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Employee;


class AttendenceController extends Controller
{


    protected $attendence = null;
    
    public function __construct(Attendence $attendence){
        $this->attendence = $attendence;
    }
   
    public function index()
    {
        $alldepartments = Department::all();
        //dd($alldepartments);
        return view('admin.Attendence.dailyattendence')
            ->with('alldepartments',$alldepartments);
    }


    public function getEmployee(Request $request)
    {
        
        $data = $request->departmentID;
        $datadate=$request->date;
       
        $Employeelist = Employee::where('department',$data)->where('status','active')->pluck('name','id');
       
        return view('admin.Attendence.Attendenceform')
                ->with('datadate',$datadate)
                ->with('Employeelist',$Employeelist);

        
        
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $rules = $this->attendence->getRules();
        $request->validate($rules);
        

        
        if (count($request->Employeedetail['Employeename'])>0) {
            foreach($request->Employeedetail['Employeename'] as $key => $value)
                $data[$value]=array(
                    'AttendenceBy'=> $request->AttendenceBy,
                    'date'=> $request->date,
                    'Employeename'=>$request->Employeedetail['Employeename'][$key],
                    'intime'=>$request->Employeedetail['intime'][$key],
                    'outtime'=>$request->Employeedetail['outtime'][$key],
                    'status'=>$request->Employeedetail['status'][$key],
                );

            $status = Attendence::insert($data);
            
            if($status){
                request()->session()->flash('success','Attendence taken successfully.');

                \LogActivity::addToLog(' Attendence taken.');
                
            }else{
                 request()->session()->flash('error',' Attendence process failed.');
                \LogActivity::addToLog('Tried to take attendence');

            }
             
        }
        return redirect()->route('Attendence.index');
        

        
        
    
          
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function show(Attendence $attendence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendence $attendence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendence $attendence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendence $attendence)
    {
        //
    }
}
