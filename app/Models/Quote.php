<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

     protected $fillable = ['author','quote','added_by'];

     public function getRules(){
    	return [
    		'author' => 'required|string',
    		
    		'quote' => 'required|string'
    		
    	];
    }
}
