<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdmissionRecords extends Model
{

    protected $fillable = [
        'name_kid',    'address1',    'address2',    'birthday',    'sex',    'full_name_father',    'number_phone_father',    'job_father',    'work_plance_father',    'full_name_mother',    'number_phone_mother',    'job_mother',    'work_plance_mother',
    ];
}