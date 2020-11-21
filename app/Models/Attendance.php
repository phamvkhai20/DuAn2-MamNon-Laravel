<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table ='attendance';
    protected $fillable =
    ['kid_id',
    'class_id',
    'school_year_id',
    "date",
    "status",
    "note",
    "arrival_time",
    "leave_time",
    "meal"];

    public function kid()
    {
        return $this->belongsTo(Kid::class,'kid_id');
    }
    public function date()
    {
        return $this->belongsTo(Date::class,'date');
    }
}
