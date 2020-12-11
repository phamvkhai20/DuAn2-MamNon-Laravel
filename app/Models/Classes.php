<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $fillable = [
        'class_name', 'grade_id', 'school_year_id', 'status',
    ];

    public function kids()
    {
        return $this->hasMany(Kid::class, 'class_id', 'id');
    }
    public function grades()
    {
        return $this->belongsTo(GradeModel::class, 'grade_id', 'id');
    }
    public function school_years()
    {
        return $this->belongsTo(SchoolYearModel::class, 'school_year_id', 'id');
    }
    public function assignments()
    {
        return $this->hasMany(Assignment::class, 'class_id', 'id');
    }
}