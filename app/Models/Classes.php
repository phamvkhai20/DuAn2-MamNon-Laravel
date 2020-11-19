<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $fillable = [
        'class_name', 'grade_id', 'school_year_id'
    ];

    public function CountKid()
    {
        return $this->hasMany('App\Models\Kid', 'class_id', 'id');
    }
}

