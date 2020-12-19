<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChildReceiptHistory extends Model
{
    protected $table = 'child_receipt_history';
    protected $fillable =
    [
        'kid_id',    'parent_id','class_id',    'attendance',    'name',    'image',    'phone',    'address',    'relationship',    'date',    'confirm'
    ];

    public function  attendance(){
        return $this->belongsTo(Attendance::class,'attendance');
    }
    public function  kid(){
        return $this->belongsTo(Kid::class,'kid_id','id');
    }
}