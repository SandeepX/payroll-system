<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Holiday;
use Auth;


class HolidayController extends Controller
{
    
	  public function __construct()
    {
        $this->middleware('auth');
    }
   

    public function index()
    {
        $holidaydata = Holiday::paginate(10);
        //dd($data);
        return view('employee.holiday.holidaylist')->with('holidaydata',$holidaydata);
    } 

}
