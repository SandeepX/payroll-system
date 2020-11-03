<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use Illuminate\Http\Request;
use App\Models\LogActivity;
use Auth;

class HolidayController extends Controller
{
    protected $holiday = null;
    public function __construct(Holiday $holiday){
        $this->holiday = $holiday;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $holidaydata = Holiday::paginate(10);
        return view('admin.Holiday.holidayview')
        ->with('holidaydata',$holidaydata);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.Holiday.Addholiday');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = $this->holiday->getRules();
        $request->validate($rules);
        

        $data = $request->all();
        $data['added_by']=Auth::user()->id;

        $this->holiday->fill($data);

        $status = $this->holiday->save();

        if($status){
            $request->session()->flash('success','holiday added successfully');
            \LogActivity::addToLog('holiday created.');
        }else{
             $request->session()->flash('error','holiday not added ');
             \LogActivity::addToLog('tried to createa holiday.');

        }
        return redirect()->route('holiday.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Holiday  $holiday
     * @return \Illuminate\Http\Response
     */
    public function show(Holiday $holiday)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Holiday  $holiday
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editdata = Holiday::find($id);
        
        if(!$editdata){
            request()->session()->flash('error', 'holiday with this id not found.');
            return redirect()->route('holiday.index');
        }
        
        return view('admin.Holiday.Editholiday')->
        with('editdata',$editdata);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Holiday  $holiday
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->holiday = $this->holiday->find($id); 
        
        if (!$this->holiday) {
            $request->session()->flash('error','Holiday not found'); 
        return redirect()->route('holiday.index');
    }   
        $rules = $this->holiday->getRules();
        $request->validate($rules);

        $data = $request->all();

        $this->holiday->fill($data);

        $status = $this->holiday->save();
        if($status){
            $request->session()->flash('success','Holiday updated successfully');
            \LogActivity::addToLog('holiday updated .');
        }else{
             $request->session()->flash('error','Holiday not updated ');
             \LogActivity::addToLog('tried to  update holiday.');
        }
        return redirect()->route('holiday.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Holiday  $holiday
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $holiday = Holiday::find($id);
         //dd($this->holiday);
        if(!$holiday){
            request()->session()->flash('error', 'holiday not found.');
            \LogActivity::addToLog('tried to delete holiday .');
            return redirect()->route('holiday.index');
        }

        $success = $holiday->delete($id);
        if($success){
            request()->session()->flash('success','holiday deleted successfully.');
            \LogActivity::addToLog('holiday delete.');
        }else{
             request()->session()->flash('error',' sorry !holiday not deleted.');
             \LogActivity::addToLog('tried to delete holiday .');
        }
         return redirect()->route('holiday.index');
    }
}
