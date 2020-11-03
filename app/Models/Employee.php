<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'father_name',
        'dob',
        'gender',
        'phone',
        'reference',
        'referencePhone',
        'localaddress',
        'permanentadress',
        'Nationality',
        'Materialstatus',
        'photo',
        'resumefile',
        'joiningletter',
        'offerletter',
        'contractletter',
        'googledriveurl',
        'department',
        'designation',
        'dateofjoining',
        'dateofleaving',
        'status',
        'basicsalary',
        'allowence',
        'deduction',
        'email',
        'password',
        'Accountholdername',
        'Accountnumber',
        'bankname',
        'branch',
        'bankcode',
        'added_by'
    ];


    public function getRules(){
    	return [
    		'name' => 'required|string',
    		'father_name' => 'required|string',
    		'dob'=>'required|date|before:today',
    		'gender'=>'required|in:Male,Female,other',
    		'phone'=>'required|string|between:8,11',
            'reference'=>'string',
            'referencePhone'=>'string|between:8,11',
    		'permanentadress'=>'required|min:3',
    		'Nationality'=>'required',
    		'Materialstatus'=>'required|in:married,unmarried','Others',
    		'photo'=>'sometimes|mimes:jpeg,png,svg|max:5000',
    		'resumefile'=>'sometimes|mimes:pdf|max:10240',
    		'offerletter'=>'sometimes|mimes:pdf,docx,doc|max:10240',
    		'joiningletter'=>'sometimes|mimes:pdf,docx,doc|max:10240',
    		'contractletter'=>'sometimes|mimes:pdf,docx,doc|max:10240',
    		'googledriveurl'=>'url',
    		'department'=>'required',
    		'designation'=>'sometimes|min:3',
    		'dateofjoining'=>'required|date',
    		'status'=>'required|in:active,inactive',
    		'basicsalary'=>'required',
            'allowence'=>'numeric',
            'deduction'=>'numeric',
    		'email'=>'required|email',
    		'password'=>'required|min:8',
    		'Accountholdername'=>'required|string',
    		'Accountnumber'=>'required|numeric',
    		'bankname'=>'required|string|min:2',
    		'branch'=>'required'

		];


    }

     public function getDepartment(){
        return $this->belongsTo('App\Models\Department','department', 'id');
    }

    // public function leave(){
    //     return $this->hasMany('App\Models\Employeeleave');
    // }



    
}
