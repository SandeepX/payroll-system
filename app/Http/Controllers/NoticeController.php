<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;
use App\Models\LogActivity;

class NoticeController extends Controller
{
     protected $notice = null;
    public function __construct(Notice $notice){
        $this->notice = $notice;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = Notice::paginate(10);
        return view('admin.Daily.managenotice')
        ->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.Daily.Addnotice');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->notice->getRules();
        $request->validate($rules);

        $data = $request->all();
        //$data['added_by']=Auth::user()->id;

        $this->notice->fill($data);

        $status = $this->notice->save();
        if($status){
            $request->session()->flash('success','notice added successfully');
            \LogActivity::addToLog('notice created.');
        }else{
             $request->session()->flash('error','notice not added ');
            \LogActivity::addToLog('Tried tp  create notice.');


        }
        return redirect()->route('notice.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function show(Notice $notice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editdata = Notice::find($id);
        
        if(!$editdata){
            request()->session()->flash('error', 'notice with this id not found.');
            return redirect()->route('notice.index');
        }
        
        return view('admin.Daily.Editnotice')->
        with('editdata',$editdata);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->notice = $this->notice->find($id); 
        
        if (!$this->notice) {
            $request->session()->flash('error','Notice not found'); 
        return redirect()->route('notice.index');
    }   
        $rules = $this->notice->getRules();
        $request->validate($rules);

        $data = $request->all();

        $this->notice->fill($data);

        $status = $this->notice->save();
        if($status){
            $request->session()->flash('success','Notice updated successfully');
            \LogActivity::addToLog('notice updated.');
        }else{
             $request->session()->flash('error','Notice not updated ');
            \LogActivity::addToLog('Tried to update Notice.');


        }
        return redirect()->route('notice.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $notice = Notice::find($id);
         //dd($this->notice);
        if(!$notice){
            request()->session()->flash('error', 'notice not found.');
            return redirect()->route('notice.index');
        }

        $success = $notice->delete($id);
        if($success){
            request()->session()->flash('success','notice deleted successfully.');
            \LogActivity::addToLog('notice deleted.');
        }else{
             request()->session()->flash('error',' sorry !notice not deleted.');
            \LogActivity::addToLog('Tried to delete notice.');

        }
         return redirect()->route('notice.index');
    }
}
