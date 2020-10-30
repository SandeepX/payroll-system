<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    use HasFactory;

    protected $fillable =['Employeename','intime','outtime','status','date','AttendenceBy'];

    public function getRules(){
        return [
            'Employeename' => 'required|string',
            'intime' => 'sometimes|string',
            'outtime'=>'sometimes|string',
            'status'=>'required|in:absent,present,Onleave',
            'date'=>'required|date',
            'AttendenceBy'=>'required|string',
            
        ];
    }
}
