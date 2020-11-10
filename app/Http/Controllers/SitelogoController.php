<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sitelogo;
use App\Models\LogActivity;
use Auth;
use File;


class SitelogoController extends Controller
{   

    protected $logo = null;
    
    public function __construct(SiteLogo $logo){
       
        $this->logo = $logo;
    }
    
    public function index()
    {
        $sitelogo = Sitelogo::all();
        //dd($sitelogo);
        if(count($sitelogo)>0){
            
            return view('admin.setting.editlogo')->with('sitelogo',$sitelogo);
        }else{
            
            return view('admin.setting.logo');
        }
    }

    
    public function store(Request $request)
    {

        //dd($request->all());
        $rules = $this->logo->getRules();
        $request->validate($rules);


        $data = $request->all(); 
        $data['user_id'] = Auth::user()->id;

        if($request->logo){
            $upload_dir = public_path().'/uploads/SiteLogo' ;
            if(!File::exists($upload_dir)){
                File::makeDirectory($upload_dir,0777,true,true);
            }
            $file_name = "siteLogo-".date('Ymdhis').rand(0,999).".".$request->logo->getClientOriginalExtension();
            $success = $request->logo->move($upload_dir, $file_name);
            if($success){
                
                $data['logo'] = $file_name;
            } else{
                $data['logo'] = null;
            }

        }
        $this->logo->fill($data);
        $status = $this->logo->save();
        if($status){
            $request->session()->flash('success','Logo added successfully');
        \LogActivity::addToLog('logo Added.');

        }else{
             $request->session()->flash('error','log not added');
        \LogActivity::addToLog('Tried to add logo .');


        }
        return redirect()->route('sitelogo.index');
    }

    
   
    public function update(Request $request, $id)
    {

        $this->logo = $this->logo->find($id); 
        
        if (!$this->logo) {
            $request->session()->flash('error','Logo detail not found'); 
            return redirect()->route('sitelogo.index');
        }
           
        $rules = $this->logo->getRules();
        $request->validate($rules);

        $data = $request->all();

        if($request->logo){
            $upload_dir = public_path().'/uploads/SiteLogo' ;
            if(!File::exists($upload_dir)){
                File::makeDirectory($upload_dir,0777,true,true);
            }
            $file_name = "siteLogo-".date('Ymdhis').rand(0,999).".".$request->logo->getClientOriginalExtension();
            $success = $request->logo->move($upload_dir, $file_name);
            if($success){
                
                $data['logo'] = $file_name; 
                @unlink($upload_dir.'/'.$this->logo->logo); 
                    
            } else{
                $data['logo'] = null;
            }
        }
            $this->logo->fill($data);
            $status = $this->logo->save();
            if($status){
                $request->session()->flash('success','logo updated successfully');
                \LogActivity::addToLog(' logo update activity performed .');
            }else{
                 $request->session()->flash('error','logo not updated ');
                 \LogActivity::addToLog(' tried to update logo detail.');

            }
        return redirect()->route('sitelogo.index');    

    }

    








    
    
    





    public function destroy(Sitelogo $sitelogo)
    {
        
    }



         
}
