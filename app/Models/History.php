<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = [
        'class_id', 'kid_id', 'date', 'status'
    ];

    public function getClass()
    {
        return $this->beLongsTo(Classes::class, 'class_id', 'id');
    }
    public function getKid()
    {
        return $this->beLongsTo(Kid::class, 'kid_id', 'id');
    }
}
