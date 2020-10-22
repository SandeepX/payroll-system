<?php

namespace App\Http\Controllers;
use App\Models\User; 
use Illuminate\Http\Request;
use Hash;
use File;

class UserController extends Controller
{   
    protected $user = null;
    public function __construct(User $user){
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $user = User::paginate(10); 
         
        return view('admin.Users.userlisting')
            ->with('user',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Users.Adduser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request->all());
        $rules = $this->user->getRules();
        $request->validate($rules);


        $data = $request->all(); 
        $data['password'] = Hash::make($request->password);

        if($request->avatar){
            $upload_dir = public_path().'/uploads/userAvatar' ;
            if(!File::exists($upload_dir)){
                File::makeDirectory($upload_dir,0777,true,true);
            }
            $file_name = "User-".date('Ymdhis').rand(0,999).".".$request->avatar->getClientOriginalExtension();
            $success = $request->avatar->move($upload_dir, $file_name);
            if($success){
                
                $data['avatar'] = $file_name;
            } else{
                $data['avatar'] = null;
            }

        }
        $this->user->fill($data);
        $status = $this->user->save();
        if($status){
            $request->session()->flash('success','User added successfully');
        }else{
             $request->session()->flash('error','User not added');

        }
        return redirect()->route('User.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userdata = User::find($id);

        if($userdata){
            return view('admin.Users.Adduser')
            ->with('userdata',$userdata);   
            

        }else{

            request()->session()->flash('error','user detail with this id not found.');
            return redirect()->route('User.index');

        }
    }


    
    
    public function update(Request $request, $id)
    {
       $user = User::find($id); 
        dd($user);
        
    }




    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if(!$user){
            request()->session()->flash('error', 'User not found.');
            return redirect()->route('User.index');
        }
        $user1 = $user->avatar;


        $success = $user->delete($id);
        if($success){
            if( $user1 != null && file_exists(public_path().'/uploads/userAvatar/'. $user1)){
                @unlink(public_path().'/uploads/userAvatar/'. $user1);
                   
            }


            request()->session()->flash('success','User deleted successfully.');
        }else{
             request()->session()->flash('error',' sorry !User not deleted.');
        }
        return redirect()->route('User.index');
    }
}