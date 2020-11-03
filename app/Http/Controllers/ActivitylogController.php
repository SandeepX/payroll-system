<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogActivity;
use \Carbon\Carbon;

class ActivitylogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        LogActivity::where('created_at', '<=', Carbon::now()->subDays(30))->delete();
        $logs = \LogActivity::logActivityLists();
        return view('logActivity',compact('logs'));
    
    }

   
    public function destroy($id)
    {
       $Activitylog = LogActivity::find($id);
         //dd($this->Activitylog);
        if(!$Activitylog){
            request()->session()->flash('error', 'Activitylog not found.');
            return redirect()->route('Activitylog.index');
        }

        $success = $Activitylog->delete($id);
            if($success){
                request()->session()->flash('success','Activitylog deleted successfully.');
               
            }else{
                 request()->session()->flash('error',' sorry !Activitylog not deleted.');
                
            }
         return redirect()->route('logActivity.index');
          
    }

    
}
