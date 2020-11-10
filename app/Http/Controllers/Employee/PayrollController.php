<?php

namespace App\Http\Controllers\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payroll;
use App\Models\LogActivity;
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
        return view('employee.payroll.managepayroll')->with('data',$data) ;
    }

    

   

   public function show($id)
    {
       
        $data = Payroll::find($id);
       
       
        $pdf = PDF::loadView('employee.payroll.myPDF',$data);
  
        return $pdf->download('payroll.pdf');
    }

   
}
