<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companydetail extends Model
{
   use HasFactory;

   protected $fillable =['company_name','phone','email','website_url','fax','address','city','postal_code','country','user_id'];



   public function getRules(){
   	return [
   		'company_name'=>'required|string',
   		'phone'=>'required|string',
   		'email'=>'required|email|max:255',
   		'website_url'=>'required',
   		'fax' =>'string',
   		'address'=>'required|string',
   		'city'=>'required|string',
   		'country'=>'required|string|max:50',
   	];
   }
            
}
