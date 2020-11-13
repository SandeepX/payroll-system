<?php

namespace App\Http\Controllers;

use App\Models\Attendence;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Support\Facades\Validator;


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

    public function reportform()
    {
        
        return view('admin.Attendence.reportform');
    }

    public function reportList(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'from' => 'date',
            'to' => 'date|after_or_equal:from',
        ]);

        //dd('hello');
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $empatts = Attendence::where(function ($query) use ($request) {

        if (! empty($request->from))
        {
            $query->whereBetween('date', [$request->from, $request->to]);
        }

        })->get()->groupBy('date');

        //dd($empatts);

        return view('admin.Attendence.adminreport',compact('empatts'));
    }


    public function getEmployee(Request $request)
    {
        
        $data = $request->departmentID;
        $datadate=$request->date;
       
        $Employeelist = Employee::where('department',$data)->where('status','active')->pluck('name','id');
        //dd($Employeelist);
        if((count($Employeelist) > 0)){

            return view('admin.Attendence.Attendenceform')
                ->with('datadate',$datadate)
                ->with('Employeelist',$Employeelist);
        }else{
            
            request()->session()->flash('error','Department wihtout Employee');
            return redirect()->back();

        }
        
            

        
        
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
        // $v = Validator::make($request->all(), [
        // 'AttendenceBy'=>'required',
        // 'date'=>'required|date',
        // 'Employeedetail.Employeename.0' => 'required|string',
        // 'Employeedetail.status.0' => 'required|in:present,absent,onleave',
        // 'Employeedetail.intime.0' => 'required',

        // ]);

        $rules = $this->attendence->getRules();
        $request->validate($rules);
        

        //$valid_data = $request->Employeedetail['Employeename'];
        //dd($request->all());

        

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
