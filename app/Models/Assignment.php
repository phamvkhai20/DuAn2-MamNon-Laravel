<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Assignment extends Model
{
    protected $table = 'assignment';
    protected $fillable = [
        'school_year_id',    'class_id',    'teacher_id'
    ];
    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }
}