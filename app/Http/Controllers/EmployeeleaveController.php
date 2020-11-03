<?php

namespace App\Http\Controllers;

use App\Models\Employeeleave;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\leave;

class EmployeeleaveController extends Controller
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
        $data = Employeeleave::paginate(10);
        //dd($data);
        return view('admin.Leave.manageleave')
            ->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leavedata = Leave::pluck('leavetype','id');
        //dd($leavedata);
        $employeedata = Employee::where('status','active')->pluck('name','id');
        //dd($employeedata);
        return view('admin.Leave.addemployeeleave')
            ->with('leavedata',$leavedata)
            ->with('employeedata',$employeedata);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->employeeleave->getRules();
        $request->validate($rules);
        

        $data = $request->all();
        //$data['added_by']=Auth::user()->id;

        $this->employeeleave->fill($data);
        $status = $this->employeeleave->save();
        if($status){
            $request->session()->flash('success','Leave request added successfully');
            \LogActivity::addToLog('leave requested');
        }else{
             $request->session()->flash('error','leave request unsuccessfull ');
             \LogActivity::addToLog('tried to request for leave');

        }
        return redirect()->route('Employeeleave.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employeeleave  $employeeleave
     * @return \Illuminate\Http\Response
     */
   
    public function edit($id)
    {
        $leavedata = Leave::pluck('leavetype','id');
        //dd($leavedata);
        $employeedata = Employee::where('status','active')->pluck('name','id');
        $editdata = Employeeleave::find($id);
 
       if(!$editdata){
            request()->session()->flash('error', 'Employee leave detai; with this id not found.');
            return redirect()->route('Employeeleave.index');
        }
        
        return view('admin.Leave.editemployeeleave')
            ->with('editdata',$editdata)
            ->with('leavedata',$leavedata)
            ->with('employeedata',$employeedata);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employeeleave  $employeeleave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->employeeleave = $this->employeeleave->find($id); 
        
        if (!$this->employeeleave) {
            $request->session()->flash('error','employeeleave data not found'); 
        return redirect()->route('employeeleave.index');
    }   
        $rules = $this->employeeleave->getRules();
        $request->validate($rules);

        $data = $request->all();

        $this->employeeleave->fill($data);

        $status = $this->employeeleave->save();
        if($status){
            $request->session()->flash('success','employeeleave data updated successfully');
            \LogActivity::addToLog('employeeleave updated .');
        }else{
             $request->session()->flash('error','employeeleave data not updated ');
             \LogActivity::addToLog('tried to  update employeeleave.');
        }
        return redirect()->route('Employeeleave.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employeeleave  $employeeleave
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->employeeleave = $this->employeeleave->find($id);
        if(!$this->employeeleave){
            request()->session()->flash('error','Employee data not found');
            \LogActivity::addToLog('tried to delete leave data of employee .');
            return redirect()->route('Employeeleave.index');
        }

        $success = $this->employeeleave->delete($id);
        if($success){

            request()->session()->flash('success','Employee leave data deleted ');
            \LogActivity::addToLog('employeeleave data deleted');
        }else{
             request()->session()->flash('error','Employee leave data not deleted '); 
            \LogActivity::addToLog('tried to delete employeeleave data ');
               
        }
         return redirect()->route('Employeeleave.index');

        
    }
}
