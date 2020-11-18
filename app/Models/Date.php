<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    protected $table ='date';
    protected $fillable =['date'];


    public function attendance(){
        return $this-> hasMany(Attendace::class,'date','id');
    }
}
