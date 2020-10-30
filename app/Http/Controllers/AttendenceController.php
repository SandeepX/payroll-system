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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //dd($datadate);
      

        $Employeelist = Employee::where('department',$data)->get('name');
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
        

        //$Attendencedata = $request->all();
        $Employeedetail = $request->Employeedetail;
        //dd($Employeedetail);
        foreach ($Employeedetail as $key => $value) {
          $attendenceDetail = new Attendence();
          
          $attendenceDetail->date = $request->date;
          $attendenceDetail->AttendenceBy = $request->AttendenceBy;

          $attendenceDetail->Employeename = $value->Employeename;
          dd($attendenceDetail->Employeename);

        }

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
