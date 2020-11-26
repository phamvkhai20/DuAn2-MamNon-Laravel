<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    protected $fillable = [
        'fullname', 'phone', 'email', 'password', 'avatar', 'date_of_birth', 'gender', 'teacher_type_id', 'status'
    ];

    public function getTeacherType()
    {
        return $this->beLongsTo('App\Models\TeacherType', 'teacher_type_id','id');
    }
}

