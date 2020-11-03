<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Models\Employee;

class Employeeleave extends Model
{
    use HasFactory;

    protected $fillable=['Employee_id','LeaveType','from','to','comment','status'];

    public function getRules(){
    	return [
    		'Employee_id'=>'required',
    		'LeaveType'=>'required|string',
    		'from' =>'required|date',
    		'to' =>'required|date|after_or_equal:from',
    		'comment'=>'required|string|max:300',
    		'status'=>'required|in:pending,cancelled,approved'

    	];


    }

    public function employee(){
    	return $this->belongsTo('App\Models\Employee','Employee_id');
    }

    
}
