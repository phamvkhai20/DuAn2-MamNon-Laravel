<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    protected $table ='parents';
    protected $fillable = [
        'fullname', 'parent_avatar', 'phone', 'email', 'password', 'parent_status'
    ];

    public function Kids()
    {
        return $this->hasMany('App\Models\Kid', 'parent_id', 'id');
    }
}
