<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kid extends Model
{
    protected $fillable = [
        'kid_name', 'nickname', 'kid_avatar', 'gender', 'date_of_birth', 'address', 'admission_date', 'description', 'class_id', 'parent_id', 'kid_status'
    ];
    public function attendance()
    {
        return $this->hasMany(Attendance::class, 'kid_id', 'id');
    }
    public function parent()
    {
        return $this->beLongsTo(Parents::class, 'parent_id', 'id');
    }
    public function getClass()
    {
        return $this->beLongsTo(Classes::class, 'class_id', 'id');
    }
}