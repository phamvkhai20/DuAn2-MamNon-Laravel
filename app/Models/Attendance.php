<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table ='attendance';
    protected $fillable =
    ['kid_id',
    'class_id',
    "date",
    "status",
    "note",
    "arrival_time",
    "leave_time",
    "teacher_id",
    "health",
    "learning",
    "eating",];

    public function kid()
    {
        return $this->belongsTo(Kid::class,'kid_id');
    }
    public function don_ho(){
        return $this-> hasOne(ChildReceiptHistory::class,'attendance','id');
    }
    public function date()
    {
        return $this->belongsTo(Date::class,'date');
    }
    public function class()
    {
        return $this->belongsTo(Classes::class,'class_id');
    }
    public function teacher(){
        return $this-> belongsTo(Teacher::class,'teacher_1','id');
    }
}
