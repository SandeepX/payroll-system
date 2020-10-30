<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Department;
use File;

class EmployeeController extends Controller
{


    protected $employee = null;
    
    public function __construct(Employee $employee){
        $this->employee = $employee;
    }
    
    public function index()
    {
     
       $EmployeeDetail = Employee::all();
       //dd($EmployeeDetail);
       return view('admin.AdminEmployee.Employee')
       ->with('EmployeeDetail',$EmployeeDetail);
      
    }

    
    public function create()
    {
        $departmentdata = Department::all();


        return view('admin.AdminEmployee.AddEmployee')
         ->with('departmentdata',$departmentdata);
    }

    public function getdesignation(Request $request)
    {
        
        
        $department = Department::find($request->id);
         
      
        if (!$department) {

            return response()->json(['status'=>false, 'data'=>null, 'msg'=>'Department not found']);
        }
            $html ='';
            $Departmentdata = Department::where('id',$request->id)->get();
            // $data = $dapartmentdata[0]->designation;

            $html.='<option value="">--Select designation--</option>';
            foreach ($Departmentdata as $key => $DepartmentDetail) {
                foreach (json_decode($DepartmentDetail->designation) as $key => $designation) {

                    $html.='<option value="'.$designation.'">'.$designation.'</option>';
                }
            }
            return response()->json(['html'=>$html]);





        //return response()->json(['status'=>true, 'data'=> $data, 'msg'=>'']);                                                           
    
    } 

        
    
    public function store(Request $request)
    {
        //dd($request->all());
        $rules = $this->employee->getRules();
        $request->validate($rules);

        $data = $request->all();
        $data['added_by']= auth()->user()->id;
        
       

        

        if($request->photo){
            $upload_dir = public_path().'/uploads/employeephoto' ;
            if(!File::exists($upload_dir)){
                File::makeDirectory($upload_dir,0777,true,true);
            }
            $file_name = "Employee-".date('Ymdhis').rand(0,999).".".$request->photo->getClientOriginalExtension();
            $success = $request->photo->move($upload_dir, $file_name);
            if($success){
                // Image::make($upload_dir."/". $file_name)-> resize(150, 150, function ($constraint) {
                //     $constraint->aspectRatio();
                // })-> save($upload_dir.'/Thumb-'.$file_name);
                $data['photo'] = $file_name;
            } else{
                $data['photo'] = null;
            }



        }


        if($request->resumefile){
            $upload_dir = public_path().'/uploads/Resumefile' ;
            if(!File::exists($upload_dir)){
                File::makeDirectory($upload_dir,0777,true,true);
            }
            $file_name = "Employee-".date('Ymdhis').rand(0,999).".".$request->resumefile->getClientOriginalExtension();
            $success = $request->resumefile->move($upload_dir, $file_name);
            if($success){
                
                $data['resumefile'] = $file_name;
            } else{
                $data['resumefile'] = null;
            }



        }

        if($request->joiningletter){
            $upload_dir = public_path().'/uploads/joiningletter' ;
            if(!File::exists($upload_dir)){
                File::makeDirectory($upload_dir,0777,true,true);
            }
            $file_name = "Employee-".date('Ymdhis').rand(0,999).".".$request->joiningletter->getClientOriginalExtension();
            $success = $request->joiningletter->move($upload_dir, $file_name);
            if($success){
               
                $data['joiningletter'] = $file_name;
            } else{
                $data['joiningletter'] = null;
            }



        }

        if($request->offerletter){
            $upload_dir = public_path().'/uploads/Offerletter' ;
            if(!File::exists($upload_dir)){
                File::makeDirectory($upload_dir,0777,true,true);
            }
            $file_name = "Employee-".date('Ymdhis').rand(0,999).".".$request->offerletter->getClientOriginalExtension();
            $success = $request->offerletter->move($upload_dir, $file_name);
            if($success){
                
                $data['offerletter'] = $file_name;
            } else{
                $data['offerletter'] = null;
            }



        }

        if($request->contractletter){
            $uplaod_dir = public_path().'/uploads/Contarctletter';
            if(!File::exists($upload_dir)){
                File::makeDirectory($uplaod_dir,0777,true,true);
            }
            $file_name = "Employee-".date('Ymdhis').rand(0,999).".".$request->contractletter->getClientoriginalExtension();
            $success =$request->contractletter->move($uplaod_dir,$filename);

            if ($success) {
                $data['contractletter'] = $file_name;
            }else{
                $data['contractletter'] = null;
            }
        }

        

        
        $this->employee->fill($data);
        $status = $this->employee->save();
        if($status){
            $request->session()->flash('success','Employee Detail added successfully');
        }else{
             $request->session()->flash('error','Employee Detail not added ');

        }
       
            return redirect()->route('Employee.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $EmployeedetailById = Employee::find($id);
        //dd($EmployeedetailById);
        return view('admin.AdminEmployee.Edetail')
        ->with('EmployeedetailById',$EmployeedetailById);
        
    }

    
    public function edit($id)
    {
        $EmployeeEditData = Employee::find($id);
        $departmentdataEdit = Department::all();
        if($EmployeeEditData){
            return view('admin.AdminEmployee.AddEmployee')
            ->with('EmployeeEditData',$EmployeeEditData)
            ->with('departmentdataEdit', $departmentdataEdit);

        }else{

            request()->session()->flash('error','Employee detail with this id not found.');
            return redirect()->route('Employee.index');

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  
        $this->employee = $this->employee->find($id); 
        
        if (!$this->employee) {
            $request->session()->flash('error','Employee detail not found'); 
            return redirect()->route('Employee.index');
        }
           
        $rules = $this->employee->getRules();
        $request->validate($rules);

        $data = $request->all();
        

        

        if($request->photo){
            $upload_dir = public_path().'/uploads/employeephoto' ;
            if(!File::exists($upload_dir)){
                File::makeDirectory($upload_dir,0777,true,true);
            }
            $file_name = "Employee-".date('Ymdhis').rand(0,999).".".$request->photo->getClientOriginalExtension();
            $success = $request->photo->move($upload_dir, $file_name);
            if($success){
                
                $data['photo'] = $file_name; 
                @unlink($upload_dir.'/'.$this->employee->photo); 
                    
            } else{
                $data['photo'] = null;
            }

        }

         if($request->resumefile){
            $upload_dir = public_path().'/uploads/Resumefile' ;
            if(!File::exists($upload_dir)){
                File::makeDirectory($upload_dir,0777,true,true);
            }
            $file_name = "Employee-".date('Ymdhis').rand(0,999).".".$request->resumefile->getClientOriginalExtension();
            $success = $request->resumefile->move($upload_dir, $file_name);
            if($success){
                
                $data['resumefile'] = $file_name; 
                @unlink($upload_dir.'/'.$this->employee->resumefile); 
                    
            } else{
                $data['resumefile'] = null;
            }

        }

         if($request->joiningletter){
            $upload_dir = public_path().'/uploads/joiningletter' ;
            if(!File::exists($upload_dir)){
                File::makeDirectory($upload_dir,0777,true,true);
            }
            $file_name = "Employee-".date('Ymdhis').rand(0,999).".".$request->joiningletter->getClientOriginalExtension();
            $success = $request->joiningletter->move($upload_dir, $file_name);
            if($success){
                
                $data['joiningletter'] = $file_name; 
                @unlink($upload_dir.'/'.$this->employee->joiningletter); 
                    
            } else{
                $data['joiningletter'] = null;
            }

        }

         if($request->offerletter){
            $upload_dir = public_path().'/uploads/Offerletter' ;
            if(!File::exists($upload_dir)){
                File::makeDirectory($upload_dir,0777,true,true);
            }
            $file_name = "Employee-".date('Ymdhis').rand(0,999).".".$request->offerletter->getClientOriginalExtension();
            $success = $request->offerletter->move($upload_dir, $file_name);
            if($success){
                
                $data['offerletter'] = $file_name; 
                @unlink($upload_dir.'/'.$this->employee->offerletter); 
                    
            } else{
                $data['offerletter'] = null;
            }

        }

         if($request->contractletter){
            $upload_dir = public_path().'/uploads/Contarctletter' ;
            if(!File::exists($upload_dir)){
                File::makeDirectory($upload_dir,0777,true,true);
            }
            $file_name = "Employee-".date('Ymdhis').rand(0,999).".".$request->contractletter->getClientOriginalExtension();
            $success = $request->contractletter->move($upload_dir, $file_name);
            if($success){
                
                $data['contractletter'] = $file_name; 
                @unlink($upload_dir.'/'.$this->employee->contractletter); 
                    
            } else{
                $data['contractletter'] = null;
            }

        }

        $this->employee->fill($data);
        $status = $this->employee->save();
        if($status){
            $request->session()->flash('success','EmployeeDetail updated successfully');
        }else{
             $request->session()->flash('error','EmployeeDetail not updated ');

        }
        return redirect()->route('Employee.index'); 
    }

    
    public function destroy($id)
    {
        
        $employee = Employee::find($id);
        
        if(!$employee){
            request()->session()->flash('error', 'Employee Detail not found.');
            return redirect()->route('Employee.index');
        }

        $employeephoto1 = $employee->photo;
        $employeeresumeletter1 = $employee->resumeletter;
        $employeejoiningletter1 = $employee->joiningletter;
        $employeecontractletter1 = $employee->contractletter;
        $employeeofferletter1 = $employee->offerletter;

        $success = $employee->delete($id);
        if($success){
            if( $employeephoto1 != null && file_exists(public_path().'/uploads/employeephoto/'. $employeephoto1)){
                @unlink(public_path().'/uploads/employeephoto/'. $employeephoto1);
                   
            } 

            if( $employeeresumeletter1 != null && file_exists(public_path().'/uploads/Resumefile/'. $employeeresumeletter1)){
                @unlink(public_path().'/uploads/employeephoto/'. $employeeresumeletter1);
                   
            } 

            if( $employeejoiningletter1 != null && file_exists(public_path().'/uploads/joiningletter/'. $employeejoiningletter1)){
                @unlink(public_path().'/uploads/joiningletter/'. $employeejoiningletter1);
                   
            } 

            if( $employeeofferletter1 != null && file_exists(public_path().'/uploads/offerletter/'. $employeeofferletter1)){
                @unlink(public_path().'/uploads/Offerletter/'. $employeeofferletter1);
                   
            } 

            if( $employeecontractletter1 != null && file_exists(public_path().'/uploads/Contarctletter/'. $employeecontractletter1)){
                @unlink(public_path().'/uploads/employeephoto/'. $employeecontractletter1);
                   
            } 

            request()->session()->flash('success','Employee Detail deleted successfully.');
        }else{
             request()->session()->flash('error',' sorry !Employee Detail not deleted.');
        }
         return redirect()->route('Employee.index');
    }
}
