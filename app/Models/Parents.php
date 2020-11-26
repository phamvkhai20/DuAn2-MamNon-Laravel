<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Parents extends Authenticatable
{
    protected $table = 'parents';
    protected $fillable = [
        'parent_name', 'parent_avatar', 'phone', 'email', 'password', 'parent_status'
    ];

    public function Kids()
    {
        return $this->hasMany('App\Models\Kid', 'parent_id', 'id');
    }
}
