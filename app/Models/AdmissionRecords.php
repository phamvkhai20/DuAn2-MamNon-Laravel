<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdmissionRecords extends Model
{

    protected $fillable = [
        'kid_name', 'nickname' ,'address',    'date_of_birth',    'gender',    'grade_id',    'parent_name',    'phone',    'email' , 'status'
    ];
}