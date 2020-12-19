<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Picnic extends Model
{
    protected $fillable = [
        'name', 'time', 'address', 'price', 'name_parent', 'picnic_avatar', 'description'
    ];
}
