<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolYearModel extends Model
{
     protected $table ='school_years';
     protected $fillable =['id','school_year','created_at','updated_at'];

}
