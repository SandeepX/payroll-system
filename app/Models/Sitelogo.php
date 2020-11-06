<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sitelogo extends Model
{
    use HasFactory;

   protected $fillable =['logo','title','user_id'];



  public function getRules(){
   	return [
      	'title'=>'required|string',
   		'logo' =>'sometimes|mimes:jpeg,png,svg,jpg|max:5000'
   		
   		
   		
   	];
  }

}
