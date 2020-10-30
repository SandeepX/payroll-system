<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    use HasFactory;

    protected $fillable = ['date','description','added_by'];


     public function getRules(){
    	return [
    		'date' => 'required|date',
    		
    		'description' => 'required|string|max:500'
    		
    	];
    }
}
