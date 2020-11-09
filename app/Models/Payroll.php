<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    protected $fillable = ['departmentId','employee','date','BasicAllowance','otherAllowance','BasicDeduct','otherDeduct','BasicSalary','total','payment','status','created_by'];



    public function getRules(){
    	return [
    		'departmentId' =>'required|exists:departments,id',
    		'employee' => 'required|string',
    		'date' =>'required|date',
    		'BasicAllowance' =>'required|numeric',
    		'otherAllowance'=>'nullable|numeric',
    		'BasicSalary' =>'nullable|numeric',
    		'BasicDeduct' =>'required|numeric',
    		'otherDeduct' =>'nullable|numeric',
    		'total' =>'required|numeric',
    		'payment' =>'required|in:cash,BankDeposit,check',
    		'status' => 'required|in:paid,unpaid',
    	];
    }

    public function getDepartment(){
        return $this->belongsTo('App\Models\Department','departmentId', 'id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User','created_by', 'id');
    }


}
