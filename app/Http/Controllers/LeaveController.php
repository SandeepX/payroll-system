<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;
use App\Models\LogActivity;
use Auth;

class LeaveController extends Controller
{
    protected $leave = null;
    public function __construct(Leave $leave){
        $this->leave = $leave;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $data = Leave::paginate(5);
        return view('admin.Leave.viewleavetype')
        ->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
         return view('admin.Leave.Addleavetype');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $rules = $this->leave->getRules();
        $request->validate($rules);

        $data = $request->all();
        $data['added_by']=Auth::user()->id;

        $this->leave->fill($data);

        $status = $this->leave->save();
        if($status){
            $request->session()->flash('success','leave type added successfully');

            \LogActivity::addToLog('leave type created .');

        }else{
             $request->session()->flash('error','leave not added ');
             \LogActivity::addToLog('tried to create leavetype .');

        }
        return redirect()->route('leave.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function show(Leave $leave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leave $leave)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $leave = Leave::find($id);
         //dd($this->leave);
        if(!$leave){
            request()->session()->flash('error', 'leave not found.');
            return redirect()->route('leave.index');
        }

        $success = $leave->delete($id);
        if($success){
            request()->session()->flash('success','leave deleted successfully.');

            \LogActivity::addToLog(' leavetype deleted.');
            
        }else{
             request()->session()->flash('error',' sorry !leave not deleted.');
            \LogActivity::addToLog('Tried to delete leavetype .');

        }
         return redirect()->route('leave.index');
    }
}
