<?php

namespace App\Http\Controllers;

use App\Models\Companydetail;

use Illuminate\Http\Request;
use Auth;
use File;

class CompanydetailController extends Controller
{

    protected $companydetail = null;
   

    public function __construct(Companydetail $companydetail ){
        $this->companydetail = $companydetail;
        
    }
    
   
    public function index()
    {
        $companydata = Companydetail::all();

        if(count($companydata)>0){
           // dd('hello');
        return view('admin.setting.editCompanydetail')
            ->with('companydata',$companydata);
            
        }else{
            return view('admin.setting.configuration');
        }
        // dd($companydata);
            //->with('id',$id);
    }


    public function create(){
        return view('admin.setting.logo');
    }

    
    public function store(Request $request)
    {
        //dd($request->all());
        $rules =  $this->companydetail->getRules();
        $request->validate($rules);

        $data = $request->all();
        $data['user_id']=Auth::user()->id;

        $this->companydetail->fill($data);
        $status =  $this->companydetail->save();

        if($status){
            $request->session()->flash('success','company detail added successfully');
            \LogActivity::addToLog('company detail created');
        }else{
             $request->session()->flash('error','company detail not added ');
             \LogActivity::addToLog('tried to add company detail');

        }
        return redirect()->back();
    }

    

   
    public function update(Request $request, $id)
    
    {
        //dd($id);
        $this->companydetail = $this->companydetail->find($id); 
        
        if (!$this->companydetail) {
            $request->session()->flash('error',' Company Detail not found'); 
        return redirect()->route('companydetail.index');
    }   
        $rules = $this->companydetail->getRules();
        $request->validate($rules);

        $data = $request->all();
        $data['user_id']=Auth::user()->id;

        $this->companydetail->fill($data);

        $status = $this->companydetail->save();
        if($status){
            $request->session()->flash('success',' Company Detail updated successfully');
            \LogActivity::addToLog('companydetail updated.');
        }else{
             $request->session()->flash('error','Company Detail not updated ');
            \LogActivity::addToLog('Tried to update Detail.');


        }
        return redirect()->route('configuration.index');
    }


    

  
}
