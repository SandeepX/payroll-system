<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $fillable =['leavetype','added_by'];

     public function getRules(){
    	return [
    		'leavetype' => 'required|string'
    		
    		
    		
    	];
    }
}
