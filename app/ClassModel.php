<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    protected $table ='classes';
       protected $fillable =['id','name','grade_id','school_year_id','created_at','updated_at'];


    public function grades()
    {
        return $this->belongsTo('App\GradeModel','grade_id','id');
    }
    public function school_years()
    {
        return $this->belongsTo('App\SchoolYearModel','school_year_id','id');
    }

}
