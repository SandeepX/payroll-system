<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Employee;
use App\Models\LogActivity;

class DepartmentController extends Controller
{
	public function index(){
		
		$departmentdata = Department::all('id','department','designation');
			//dd($departmentdata);
		$employeecount = [];
		foreach ($departmentdata as $key => $value) {
			$id = $value->id;
			$employee = Employee::where([['department', $id],['status', 'active' ]])->get();
			$countemployee = count($employee);
			$employeecount[] = $countemployee;
		}
		
		
	
		return view('admin.Department.index')
		->with('departmentdata',$departmentdata)
		->with('employeecount',$employeecount);
	}  

	public function show(){

		return view('admin.Department.createdepartment');
	}  


	public function store(Request $request){
		
		// dd($request->all());
		$this->validate($request,[
			'department' =>'required|unique:departments,department'
			
			
		]);


			foreach ($request->designation as $designation) {
				$degination1 = $designation;
				if($degination1!=null){

					$datadegination[] = $degination1;
				}

			} 
			$data = new Department;
			$data->department =$request->department;
			$data->user_id = auth()->user()->id;
			$data->designation = json_encode($datadegination);

			$status=$data->save();	
				

		
		
		if($status){
			$request->session()->flash('success','department added successfully');
			\LogActivity::addToLog('created deparment with designation.');
			}else{
				$request->session()->flash('error','opps! department not added');
			}
			
        return redirect()->route('department');
	}


	public function edit($id){
		 $data = Department::find($id);
        //dd($data);
        if($data){
            return view('.admin.Department.createdepartment')
            ->with('data', $data);

        }else{

            request()->session()->flash('error','Department with this id not found.');
            return redirect()->route('department');

        }

	}

	public function update(Request $request, $id){
		
		$data = Department::find($id);
		if(!$data){
			$request->session()->flash('error','department not found'); 
        return redirect()->route('department');
		}

		$this->validate($request,[
			'department' =>'required'
			
			
		]);

		foreach ($request->designation as $designation) {
				$degination1 = $designation;
				if($degination1!=null){

					$datadegination[] = $degination1;
				}

			} 

		
		$data->department =$request->department;
		$data->user_id = auth()->user()->id;
		$data->designation = json_encode($datadegination);

		$status=$data->save();	
				

		
		
		if($status){
			$request->session()->flash('success','department updated successfully');
			\LogActivity::addToLog('upadted  deparment .');
			}else{
				$request->session()->flash('error','opps! department not updated');
				\LogActivity::addToLog('upadted deparment failed.');
			}
			
        return redirect()->route('department');


		
	}


	






	public function destroy($id){
		
		$data = Department::find($id);
		if($data){
          $success = $data->delete();
            if($success){
                session()->flash('success','Department deleted successfully');
                \LogActivity::addToLog('Deleted  deparment .');
            }else{
                session()->flash('error','opps! something is wrong');
            }

        }
    return redirect()->route('department');
	}
	
}
