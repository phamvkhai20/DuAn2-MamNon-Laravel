<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kid extends Model
{
    protected $fillable = [
        'kid_name', 'nickname', 'kid_avatar', 'gender', 'date_of_birth', 'address', 'admission_date', 'description', 'class_id', 'parent_id', 'kid_status'
    ];

    public function getParent()
    {
        return $this->beLongsTo('App\Models\Parents', 'parent_id','id');
    }
    public function getClass()
    {
        return $this->beLongsTo('App\Models\Class', 'class_id','id');
    }
}

