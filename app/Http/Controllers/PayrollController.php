<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Employee;
use Auth;
use PDF;

class PayrollController extends Controller
{
    protected $payroll = null;

    public function __construct(Payroll $payroll){
        $this->payroll = $payroll;
    }
    public function index()
    {
        $data = Payroll::orderBy('created_at','desc')->paginate(10);
        //dd($data);
        return view('admin.payroll.payrolllist')->with('data',$data) ;
    }

    

    public function getEmployee(Request $request)
    {
      //    $id = $request->id;
      // dd($id);
        $employee = Employee::where('department',$request->id)->get();
        //dd($employee);
        if (!$employee) {

            return response()->json(['status'=>false, 'data'=>null, 'msg'=>'Employee not found']);
        }
            $html ='';
            $employeedata = Employee::where('status','active')->where('department',$request->id)->pluck('name','id');
           

            $html.='<option value="">--Select Employee--</option>';
            foreach ($employeedata as $key => $employeeDetail) {
              
                $html.='<option value="'.$employeeDetail.'">'.$employeeDetail.'</option>';
               
            }
            return response()->json(['html'=>$html]);


    }

    public function create()
    {
        $alldepartments = Department::all();
        return view('admin.payroll.createpayslip')->with('alldepartments',$alldepartments);
    }

    
    public function store(Request $request)
    {
        //dd($request>all());
        $rules = $this->payroll->getRules();
        $request->validate($rules);

        $data = $request->all();
        $data['created_by']=Auth::user()->id;

        $this->payroll->fill($data);

        $status = $this->payroll->save();
        if($status){
            $request->session()->flash('success','payslip created successfully');

            \LogActivity::addToLog('Payslip created');

        }else{
             $request->session()->flash('error','payslip not created');
             \LogActivity::addToLog('tried to create payslip');

        }
        return redirect()->route('payroll.index');
    }


    
    
        
      
    
    public function show($id)
    {
        //dd($id);
        $data = Payroll::find($id);
       
       
        $pdf = PDF::loadView('admin.payroll.myPDF',$data);
  
        return $pdf->download('payroll.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function edit(Payroll $payroll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payroll $payroll)
    {
        //
    }

    
    public function destroy($id)
    {
        //dd($id);
        $payslip = Payroll::find($id);
        
        if(!$payslip){
            request()->session()->flash('error', 'payslip not found.');
            return redirect()->route('payroll.index');
        }

        $success = $payslip->delete($id);
        if($success){
            request()->session()->flash('success','payslip deleted successfully.');
            \LogActivity::addToLog('payslip deleted.');
        }else{
             request()->session()->flash('error',' sorry !payslip not deleted.');
            \LogActivity::addToLog('Tried to delete Payroll.');

        }
         return redirect()->route('payroll.index');

    }
}
