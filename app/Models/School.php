<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class School extends Authenticatable
{
    protected $fillable = [
        'phone', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}

