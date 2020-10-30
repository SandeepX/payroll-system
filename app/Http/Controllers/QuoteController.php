<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;
use Auth;

class QuoteController extends Controller
{
    protected $quote = null;
    public function __construct(Quote $quote){
        $this->quote = $quote;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quote = Quote::all();
        return view('admin.Daily.manageQuotes')
        ->with('quote',$quote);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Daily.Addquotes');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->quote->getRules();
        $request->validate($rules);

        $data = $request->all();
        $data['added_by']=Auth::user()->id;

        $this->quote->fill($data);

        $status = $this->quote->save();
        if($status){
            $request->session()->flash('success','quote added successfully');
        }else{
             $request->session()->flash('error','quote not added ');

        }
        return redirect()->route('quote.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function show(Quote $quote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $editdata = Quote::find($id);
        
        if(!$editdata){
            request()->session()->flash('error', 'quote with this id not found.');
            return redirect()->route('quote.index');
        }
        return view('admin.Daily.Editquote')->
        with('editdata',$editdata);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->quote = $this->quote->find($id); 
        
        if (!$this->quote) {
            $request->session()->flash('error','Quote not found'); 
        return redirect()->route('quote.index');
    }   
        $rules = $this->quote->getRules();
        $request->validate($rules);

        $data = $request->all();

        $this->quote->fill($data);

        $status = $this->quote->save();
        if($status){
            $request->session()->flash('success','Quote updated successfully');
        }else{
             $request->session()->flash('error','Quote not updated ');

        }
        return redirect()->route('quote.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $quote = Quote::find($id);
         //dd($this->quote);
        if(!$quote){
            request()->session()->flash('error', 'quote not found.');
            return redirect()->route('quote.index');
        }

        $success = $quote->delete($id);
        if($success){
            request()->session()->flash('success','quote deleted successfully.');
        }else{
             request()->session()->flash('error',' sorry !quote not deleted.');
        }
         return redirect()->route('quote.index');
    }
}
