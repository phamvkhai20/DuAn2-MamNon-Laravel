<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    protected $table ='classes';
       protected $fillable =['name','grade_id','school_year_id'];


    public function grades()
    {
        return $this->belongsTo(GradeModel::class,'grade_id','id');
    }
    public function school_years()
    {
        return $this->belongsTo(SchoolYearModel::class,'school_year_id','id');
    }

}
